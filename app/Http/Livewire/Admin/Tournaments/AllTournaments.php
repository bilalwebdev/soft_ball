<?php

namespace App\Http\Livewire\Admin\Tournaments;

use App\Models\Tournament;
use Livewire\Component;
use Livewire\WithPagination;

class AllTournaments extends Component
{
    public $search;
    public $team;
    use WithPagination;

    public function deleteFile(Tournament $id)
    {
        $id->delete();
        return redirect('/all-tournaments');
    }

    public function render()
    {

        if($this->search)
        {

            $search = '%'.$this->search.'%';
            $tournaments = Tournament::where('title', 'LIKE', $search)
            ->latest()->paginate(10);
            $this->resetPage();
        }
        else{
          $tournaments = Tournament::latest()->paginate(10);
        }
        return view('livewire.admin.tournaments.all-tournaments', compact('tournaments'));
    }
}
