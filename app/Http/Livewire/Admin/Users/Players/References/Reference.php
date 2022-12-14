<?php

namespace App\Http\Livewire\Admin\Users\Players\References;

use App\Models\PlayerReference;
use Livewire\Component;

class Reference extends Component
{
    public $title;
    public $search;
    public $player_id;


    protected $rules = ['title' => 'required'];

    public function mount($player)
    {
        $this->player_id = $player->id;
    }

    public function deleteFile(PlayerReference $id)
    {
        $id->delete();
        return redirect('player/reference/' . $this->player_id);
    }

    public function addReference()
    {
        $this->validate();
        PlayerReference::create([
            'title' => $this->title,
            'player_id' => $this->player_id
        ]);
        $this->emit('success', 'Reference Added Successfully');
    }
    public function render()
    {
        $allReferences = PlayerReference::latest()->where('title', 'like', '%' . $this->search . '%')->where('player_id', $this->player_id)->paginate(10);
        return view('livewire.admin.users.players.references.reference', compact('allReferences'));
    }
}
