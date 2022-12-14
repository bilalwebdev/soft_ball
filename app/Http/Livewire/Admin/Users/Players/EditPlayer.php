<?php

namespace App\Http\Livewire\Admin\Users\Players;

use App\Models\PlayerInfo;
use App\Models\PlayerSecondaryPositionInfo;
use App\Models\Team;
use Livewire\Component;

class EditPlayer extends Component
{

    public $title;
    public $name;
    public $email;
    public $player;
    public $phone;
    public $image;
    public $youtube;
    public $facebook;
    public $twitter;
    public $instagram;
    public $password;
    public $confirm_password;
    public $high_school;
    public $guest_playing;
    public $team_id;
    public $school_name;
    public $class_of;
    public $gpa;
    public $weighted_gpa;
    public $sat;
    public $act;
    public $exit_velo;
    public $overhand_velo;
    public $inf_pop_time;
    public $catcher_pop_time;
    public $home_to_1st;
    public $pitching_velo;
    public $jersey_no;
    public $height;
    public $video;
    public $bats;
    public $throws;
    public $primary_position;
    public $school_site_link;
    public $positions = [];
    public $positionsCount = 0;
    public $all_teams;

    // public $playerInfoInputs = [];
    // public $playerInfoInputsCount = 0;

    public $playerSchoolInfoInputs = [];
    public $playerSchoolInfoInputsCount = 0;

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
    public function mount($player)
    {
        $this->player = $player;
        $this->name = $player->name;
        $this->home_town = $player->home_town;
        $this->email = $player->email;
        $this->video = $player->video;
        $this->phone = $player->phone;
        $this->youtube = $player->youtube;
        $this->instagram = $player->instagram;
        $this->facebook = $player->facebook;
        $this->twitter = $player->twitter;
        $this->school_site_link = $player->school_site_link;
        $this->high_school = $player->high_school;
        $this->guest_playing = $player->guest_playing;
        $this->team_id = $player->team_id;
        $this->school_name = $player->school_name;
        $this->class_of = $player->class_of;
        $this->gpa = $player->gpa;
        $this->weighted_gpa = $player->weighted_gpa;
        $this->sat = $player->sat;
        $this->act = $player->act;
        $this->jersey_no = $player->jersey_no;
        $this->height = $player->height;
        $this->bats = $player->bats;
        $this->throws = $player->throws;
        $this->exit_velo = $player->exit_velo;
        $this->overhand_velo = $player->overhand_velo;
        $this->inf_pop_time = $player->inf_pop_time;
        $this->catcher_pop_time = $player->catcher_pop_time;
        $this->home_to_1st = $player->home_to_1st;
        $this->pitching_velo = $player->pitching_velo;
        $this->primary_position = $player->primary_position;
        $this->all_teams = Team::all();
        $this->positions = PlayerSecondaryPositionInfo::where('player_id', $this->player->id)->get()->toArray();


        // $this->playerInfoInputs = PlayerInfo::where('player_id', $this->player->id)->where('type', PlayerInfo::TYPE_PLAYER_INFO)->get()->toArray();
        // //  dd($this->playerInfoInputs);
        // $this->playerSchoolInfoInputs = $this->positions;
    }

    protected $rules = [
        'name' => 'required',
        'home_town' => 'required',
        'email' => 'email:filter,rfc,spoof',
        'team_id' => 'required|numeric|min:0|not_in:0',
        'school_name' => 'required',
        'class_of' => 'required',
        'gpa' => 'required',
        'jersey_no' => 'required',
        'height' => 'required',
        'bats' => 'required',
        'throws' => 'required',
        'primary_position' => 'required',
    ];

    public function updateInfo()
    {
        $this->validate();

        $this->player->update(
            [
                'title' => 'Player',
                'name' => $this->name,
                'home_town' => $this->home_town,
                'email' => $this->email,
                'phone' => $this->phone,
                'type' => 'PLAYER',
                'youtube' => $this->youtube,
                'instagram' => $this->instagram,
                'twitter' => $this->twitter,
                'facebook' => $this->facebook,
                'high_school' => $this->high_school,
                'team_id' => $this->team_id,
                'guest_playing' => $this->guest_playing,
                'school_name' => $this->school_name,
                'class_of' => $this->class_of,
                'gpa' => $this->gpa,
                'weighted_gpa' => $this->weighted_gpa,
                'sat' => $this->sat,
                'act' => $this->act,
                'jersey_no' => $this->jersey_no,
                'height' => $this->height,
                'bats' => $this->bats,
                'throws' => $this->throws,
                'exit_velo' => $this->exit_velo,
                'overhand_velo' => $this->overhand_velo,
                'inf_pop_time' => $this->inf_pop_time,
                'catcher_pop_time' => $this->catcher_pop_time,
                'home_to_1st' => $this->home_to_1st,
                'pitching_velo' => $this->pitching_velo,
                'school_site_link' => $this->school_site_link,
                'video' => $this->video,
                'primary_position' => $this->primary_position,
            ]
        );



        PlayerSecondaryPositionInfo::where('player_id', $this->player->id)->delete();

        foreach ($this->positions as $info) {
            PlayerSecondaryPositionInfo::create([
                'player_id' => $this->player->id,
                'name' => $info['name'] ?? 'P',
            ]);
        }


        $this->emit('success', 'Profile Updated Successfully');
        //   return redirect('/players-list');
    }


    public function addPlayerSceondaryPositionField()
    {
        $i = $this->positionsCount + 1;
        ///////////   dd($i);
        $this->positionsCount = $i;
        array_push($this->positions, $i);
    }

    public function removePlayerSceondaryPositionField($i)
    {
        unset($this->positions[$i]);
    }


    // public function savePlayerInfoFields()
    // {

    //     PlayerInfo::where('player_id', $this->player->id)->where('type', PlayerInfo::TYPE_PLAYER_INFO)->delete();

    //     foreach ($this->playerInfoInputs as $info) {
    //         PlayerInfo::create([
    //             'player_id' => $this->player->id,
    //             'name' => $info['name'],
    //             'value' => $info['value'],
    //             'type' => PlayerInfo::TYPE_PLAYER_INFO,
    //         ]);
    //     }
    //     $this->emit('success', 'Player Info Updated.');
    // }

    // public function addPlayerSchoolinfoField()
    // {
    //     $i = $this->playerSchoolInfoInputsCount + 1;
    //     $this->playerSchoolInfoInputsCount = $i;
    //     array_push($this->playerSchoolInfoInputs, $i);
    // }

    // public function removePlayerSchoolinfoField($i)
    // {
    //     unset($this->playerSchoolInfoInputs[$i]);
    // }

    // public function savePlayerSchoolInfoFields()
    // {

    //     PlayerInfo::where('player_id', $this->player->id)->where('type', PlayerInfo::TYPE_SCHOOL_INFO)->delete();

    //     foreach ($this->playerSchoolInfoInputs as $info) {
    //         PlayerInfo::create([
    //             'player_id' => $this->player->id,
    //             'name' => $info['name'],
    //             'value' => $info['value'],
    //             'type' => PlayerInfo::TYPE_SCHOOL_INFO,
    //         ]);
    //     }
    //     $this->emit('success', 'Player School Info Updated.');
    // }

    public function saveImage($imgKey)
    {

        $this->player->update([
            'image' => $imgKey,
        ]);

        $this->emit('success', 'Photo Uploaded!');
    }

    public function render()
    {
        return view('livewire.admin.users.players.edit-player');
    }
}
