<?php

namespace App\Http\Livewire\Admin\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfile extends Component
{
    use WithFileUploads;

    public $title;
    public $name;
    public $email;
    public $user;
    public $phone;
    public $image;
    public $youtube;
    public $facebook;
    public $twitter;
    public $instagram;

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

    public function mount()
    {
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->image = $this->user->image;
        $this->youtube = $this->user->youtube;
        $this->facebook = $this->user->facebook;
        $this->instagram = $this->user->instagram;
        $this->twitter = $this->user->twitter;
        $this->youtube = $this->user->youtube;
        $this->phone = $this->user->phone;
    }
    public function updateInfo()
    {
        $this->validate(
            [
                'name' => 'required',
                'email' => 'email:filter,rfc,spoof'
            ]
        );
        $this->user->update([
            'title' => 'Super Admin',
            'name' => $this->name,
            'email' => $this->email,
            ///    'image' => $this->image,
            'phone' => $this->phone,
            'type' => 'superadmin',
            'youtube' => $this->youtube,
            'instagram' => $this->instagram,
            'twitter' => $this->twitter,
            'facebook' => $this->instagram
        ]);
        $this->emit('success', 'Profile Updated Successfully');
    }
    public function render()
    {
        return view('livewire.admin.profile.edit-profile');
    }
}
