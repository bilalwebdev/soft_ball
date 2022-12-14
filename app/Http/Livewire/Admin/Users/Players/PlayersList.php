<?php

namespace App\Http\Livewire\Admin\Users\Players;

use App\Models\Team;
use App\Models\TeamUser;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PlayersList extends Component
{

    public $search = '';
    use WithPagination;
    public $team_id;


    public function deleteFile(User $id)
    {

        $id->delete();
    }

    public function mount($id)
    {

        $this->team_id = $id;
    }

    public function render()
    {

        $players = User::where('team_id', $this->team_id)->where('name', 'like', '%' . $this->search . '%')->paginate(10);

        return view('livewire.admin.users.players.players-list', compact('players'));
    }
}
