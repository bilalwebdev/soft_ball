<?php

namespace App\Http\Livewire\Admin\Games;

use Livewire\Component;
use App\Models\Game;
use App\Models\Team;

class EditGame extends Component
{

    public $our_score;
    public $opponent_score;
    public $opponent_name;
    public $tournament_id;
    public $date;
    public $time;
    public $game;
    public $team_id;
  //  public $selected_team;


    public function mount($game)
    {
        $this->our_score = $game->our_score;
        $this->opponent_score = $game->opponent_score;
        $this->opponent_name = $game->opponent_name;
        $this->date = $game->date;
        $this->time = $game->time;
        $this->team_id = $game->team_id;
    }
    public function updateGame()
    {
        $this->validate(
            [
                'our_score' => 'required',
                'opponent_score' => 'required',
                'opponent_name' => 'required',
                'date' => 'required',
                'time' => 'required',
                'team_id' => 'required',
            ]
            );
        $this->game->update(
              [
                'our_score' => $this->our_score,
                'opponent_score' => $this->opponent_score,
                'opponent_name' => $this->opponent_name,
                'date' => $this->date,
                'time' => $this->time,
                'team_id' => $this->team_id,
              ]
            );

            $this->emit('success', 'Game Updated Successfully');
        //   return redirect('all-tournaments');
    }

    public function render()
    {
        $teams = Team::all();
        $selected_team = Team::where('id', $this->game->team_id)->first();
       // dd($selected_team);
        return view('livewire.admin.games.edit-game', compact('teams', 'selected_team'));
    }
}
