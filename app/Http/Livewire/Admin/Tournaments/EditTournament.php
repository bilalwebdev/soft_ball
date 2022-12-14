<?php

namespace App\Http\Livewire\Admin\Tournaments;

use App\Models\Game;
use App\Models\Team;
use Livewire\Component;

class EditTournament extends Component
{

    public $tournament;

    public $title_game;
    public $our_score;
    public $opponent_score;
    public $opponent_name;
    public $tournament_id;
    public $team_id;
    public $date;
    public $time;

    public $search;

    public $all_teams;

    public $selected_teams = [];
    public $selected_teams_id = [];

    protected $rules = [
        'tournament.title' => 'string|required',
        'tournament.begining_date' => 'string|required',
        'tournament.ending_date' => 'string|required',
        'tournament.location' => 'string|required',
        'selected_teams_id' => 'nullable',

    ];

    public function mount($tournament)
    {
        $this->tournament = $tournament;
        $this->all_teams = Team::all();
        $this->selected_teams = $tournament->teams;
        $this->selected_teams_id = $tournament->teams->pluck('id');

    }

    public function updateTournament()
    {
        $this->validate(
            [
                'tournament.title' => 'required',
                'tournament.begining_date' => 'required',
                'tournament.ending_date' => 'required',
                'tournament.location' => 'required',
            ]
        );

        $this->tournament->update();
        $this->tournament->teams()->sync($this->selected_teams_id);

        $this->emit('success', 'Tournament Updated Successfully');
        //  return redirect('all-tournaments');
    }

    public function addGame()
    {
        $this->validate(
            [

                'opponent_name' => 'required',
                'date' => 'required',
                'time' => 'required',
                'team_id' => 'required',
            ]
        );

        ray($this->date);
        ray($this->tournament);

        if ($this->date >= $this->tournament->begining_date && $this->date <= $this->tournament->ending_date) {
            Game::create(
                [
                    //  'title' => $this->title_game,
                    //   'our_score' => $this->our_score,
                    //  'opponent_score' => $this->opponent_score,
                    'opponent_name' => $this->opponent_name,
                    'date' => $this->date,
                    'time' => $this->time,
                    'team_id' => $this->team_id,
                    'tournament_id' => $this->tournament->id,
                ]
            );
            $this->emit('success', 'Game Added Successfully');
            $this->reset('date', 'time', 'team_id', 'opponent_name');
        } else {
            $this->addError('game_date', 'The date is invalid.');
        }

        // return redirect('all-tournaments');
    }

    public function deleteFile(Game $id)
    {
        $id->delete();
        // return redirect('/all-tournaments');
    }

    public function render()
    {

        if ($this->search) {

            $search = '%' . $this->search . '%';
            $games = Game::where('opponent_name', 'LIKE', $search)
                ->where('tournament_id', $this->tournament->id)
                ->groupBy('team_id')->latest()->paginate(10);
            //   $this->resetPage();
        } else {
            // config()->set('database.connections.mysql.strict', false);
            $all_team_games = Game::where('tournament_id', $this->tournament->id)->get()->groupBy('team_id');

        }

        return view('livewire.admin.tournaments.edit-tournament', compact('all_team_games'));
    }
}
