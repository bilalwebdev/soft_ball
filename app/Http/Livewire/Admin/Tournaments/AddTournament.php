<?php

namespace App\Http\Livewire\Admin\Tournaments;

use App\Models\Team;
use App\Models\Tournament;
use Livewire\Component;

class AddTournament extends Component
{
    public $title;
    public $begining_date;
    public $ending_date;
    public $location;
    public $teams;
    public $selected_teams = [];

    public function mount()
    {
        $this->teams = Team::all();
    }

    public function addTournament()
    {

        $this->validate(
            [
                'title' => 'required',
                'begining_date' => 'required',
                'ending_date' => 'required',
                'location' => 'required',
            ]
        );
        $tournament = Tournament::create(
            [
                'title' => $this->title,
                'begining_date' => $this->begining_date,
                'ending_date' => $this->ending_date,
                'location' => $this->location,
            ]
        );

        $tournament->teams()->sync($this->selected_teams);

        $this->emit('success', 'Tournament Added Successfully');
        return redirect('all-tournaments');
    }
    public function render()
    {
        return view('livewire.admin.tournaments.add-tournament');
    }
}
