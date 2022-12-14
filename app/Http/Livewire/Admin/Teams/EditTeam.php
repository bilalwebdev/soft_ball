<?php

namespace App\Http\Livewire\Admin\Teams;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditTeam extends Component
{

    use WithFileUploads;
    public $title;
    public $description;
    public $image;
    public $team;
    public $youtube;
    public $facebook;
    public $twitter;
    public $instagram;
    public $manager = [];
    public $selected_managers = [];

    public function mount($team)
    {
        $this->team = $team;
        $this->title = $team->title;
        $this->description = $team->description;
        $this->facebook = $team->facebook;
        $this->instagram = $team->instagram;
        $this->twitter = $team->twitter;
        $this->youtube = $team->youtube;
        $this->selected_managers = $team->managers->pluck('id')->toArray();
        ray($team->managers->pluck('id')->toArray());
    }

    public function UpdateTeam()
    {
        $this->validate([
            'title' => 'required',
        ]);

        $this->team->update([
            'title' => $this->title,
            'image' => $this->image,
            'description' => $this->description,
            'youtube' => $this->youtube,
            'instagram' => $this->instagram,
            'twitter' => $this->twitter,
            'facebook' => $this->instagram

        ]);


        DB::table('team_user')->where('team_id', $this->team->id)->delete();
        $this->team->managers()->attach($this->selected_managers);
        $this->emit('success', 'Team Updated Successfully');
        return redirect('/all-teams');
    }

    public function saveImage($imgKey)
    {

        $this->team->update([
            'image' => $imgKey,
        ]);

        $this->emit('success', 'Photo Uploaded!');
    }

    public function render()
    {
        $managers = User::where('type', 'MANAGER')->get();
        return view('livewire.admin.teams.edit-team', ['managers' => $managers]);
    }
}
