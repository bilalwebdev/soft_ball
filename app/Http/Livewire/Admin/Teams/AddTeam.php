<?php

namespace App\Http\Livewire\Admin\Teams;

use App\Models\Team;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddTeam extends Component
{

    public $title;


    public function AddTeam()
    {
        $this->validate(
            [
                'title' => 'required',
            ]
        );
      $team =   Team::create(
            [
                'title' => $this->title,

            ]
        );
        $this->emit('success', 'Team Added Successfully');
        return redirect()->route('admin.edit.team',$team->slug);
    }
    public function render()
    {
        return view('livewire.admin.teams.add-team');
    }
}
