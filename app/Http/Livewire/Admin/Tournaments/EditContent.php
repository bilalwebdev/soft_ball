<?php

namespace App\Http\Livewire\Admin\Tournaments;

use Livewire\Component;

class EditContent extends Component
{

    public $tournament;

    protected $rules = [
        'tournament.content' => 'required',
    ];

    public function mount($tournament)
    {
        $this->tournament = $tournament;
    }

    public function updateContent($value)
    {
        $this->tournament->content = $value;
    }

    public function saveContent()
    {
        $this->tournament->update();
        $this->emit('success', 'Content Updated');
    }

    public function render()
    {
        return view('livewire.admin.tournaments.edit-content');
    }
}
