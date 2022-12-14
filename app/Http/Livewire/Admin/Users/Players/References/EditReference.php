<?php

namespace App\Http\Livewire\Admin\Users\Players\References;

use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class EditReference extends Component
{
    public $reference;

    public function mount($reference)
    {
        $this->reference = $reference;
    }

    protected $rules = ['reference.title' => 'required'];

    public function updateReference()
    {
        $this->validate();
        $this->reference->update();
        $this->emit('success', 'Reference Updated Successfully');
        return Redirect::back();
    }


    public function render()
    {
        return view('livewire.admin.users.players.references.edit-reference');
    }
}
