<?php

namespace App\Http\Livewire\Admin\Users\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminList extends Component
{
    public $search;
    use WithPagination;


    public function deleteFile(User $id)
    {

        $id->delete();
        return redirect('/admin-list');
    }

    public function render()
    {
        if($this->search)
        {

            $search = '%'.$this->search.'%';
            $admins = User::where('name', 'LIKE', $search)
            ->where('type', 'MANAGER')
            ->latest()->paginate(10);
            $this->resetPage();
        }
        else{
          $admins = User::where('type', 'MANAGER')->latest()->paginate(10);
        }
        return view(
            'livewire.admin.users.admin.admin-list',['admins' => $admins]
        );

    }
}
