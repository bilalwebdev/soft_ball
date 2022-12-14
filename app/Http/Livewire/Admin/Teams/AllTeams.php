<?php

namespace App\Http\Livewire\Admin\Teams;

use Illuminate\Support\Facades\DB;
use App\Models\Team;
use App\Models\TeamUser;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class AllTeams extends Component
{
    public $search;
    public $team;
    public $selected_teams = [];

    use WithPagination;

    public function deleteFile(Team $id)
    {
        $id->delete();
        return redirect('/all-teams');
    }

    public function render()
    {

            $manager = Auth::user();
            if($manager->type == 'MANAGER')
            {
                $teams = TeamUser::where('user_id', $manager->id)->paginate(10);
              //  dd($teams);
                foreach($teams as $team)
                {
                   $this->selected_teams[] = Team::where('id' , $team->team_id)->where('title', 'like', '%' . $this->search . '%')->get();
                }

                $manager_teams = $this->selected_teams;

               return view('livewire.admin.teams.all-teams', compact('teams', 'manager_teams'));
            }
            else
            {
                $teams = Team::latest()->where('title', 'like', '%' . $this->search . '%')->paginate(10);
                return view('livewire.admin.teams.all-teams', compact('teams'));
            }


    }
}
