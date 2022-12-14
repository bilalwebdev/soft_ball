<?php

namespace App\Http\Livewire\Admin\Users\Players;

use App\Helpers\Helper;
use App\Models\PlayerInfo;
use App\Models\Team;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddPlayer extends Component
{
    use WithFileUploads;

    public $title;
    public $name;
    public $home_town;
    public $email;
    public $user;
    public $phone;
    public $image;
    public $youtube;
    public $facebook;
    public $twitter;
    public $instagram;
    public $password;
    public $high_school;
    public $guest_playing;
    public $confirm_password;
    public $team_id;
    public $all_teams;

    public function mount($id)
    {
        $this->team_id = $id;
        $this->all_teams = Team::all();
    }

    public function formatPhoneNumber()
    {
        $phone = $this->phone;
        $phone = preg_replace('/[^0-9]+/', '', $phone);
        $phone = substr($phone, 0, 10);
        $length = strlen($phone);
        $formatted = "";
        for ($i = 0; $i < $length; $i++) {
            $formatted .= $phone[$i];
            if ($i == 2 || $i == 5) {
                $formatted .= "-";
            }
        }
        $this->phone = $formatted;
    }

    public function updateContent($value)
    {
        $this->description = $value;
    }

    protected $rules = [
        'name' => 'required',
        'home_town' => 'required',
        'email' => 'unique:users|email:filter,rfc,spoof',
        'password' => 'required|min:8',
        'confirm_password' => 'required|same:password',
        'team_id' => 'required|numeric|min:0|not_in:0',
    ];

    public function AddInfo()
    {
        $this->validate();


        $player = User::create([
            'title' => 'Player',
            'name' => $this->name,
            'email' => $this->email,
            'home_town' => $this->home_town,
            'phone' => $this->phone,
            'type' => 'PLAYER',
            'youtube' => $this->youtube,
            'instagram' => $this->instagram,
            'twitter' => $this->twitter,
            'high_school' => $this->high_school,
            'guest_playing' => $this->guest_playing,
            'facebook' => $this->instagram,
            'team_id' => $this->team_id,
            'password' => bcrypt($this->password),
        ]);

        $this->emit('success', 'Player Added Successfully');
        return redirect()->route('admin.edit.player', $player->id);
    }
    public function render()
    {
        return view('livewire.admin.users.players.add-player');
    }
}
