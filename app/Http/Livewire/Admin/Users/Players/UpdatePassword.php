<?php

namespace App\Http\Livewire\Admin\Users\Players;

use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class UpdatePassword extends Component
{
    public $player;
    public $password;
    public $confirm_password;

    public function mount($player){
        $this->player = $player;
    }
    public function updatePassword()
    {
        $this->validate([
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        $this->player->update([
            'password' => bcrypt($this->password),
        ]);

        $this->emit('success', 'Password Updated Succesfully');

        return redirect('players-list');

    }


    public function render()
    {
        return view('livewire.admin.users.players.update-password');
    }
}
