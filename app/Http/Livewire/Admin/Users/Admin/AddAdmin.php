<?php

namespace App\Http\Livewire\Admin\Users\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddAdmin extends Component
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
    public $password;
    public $confirm_password;

    public function formatPhoneNumber(){
        $phone = $this->phone;
        $phone = preg_replace('/[^0-9]+/', '', $phone);
        $phone = substr($phone, 0, 10);
        $length = strlen($phone);
        $formatted = "";
        for ($i = 0; $i < $length; $i++) {
            $formatted .= $phone[$i];
            if($i == 2 || $i == 5){
                $formatted .= "-";
            }
        }
        $this->phone = $formatted;
    }

    public function AddInfo()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'unique:users|email:filter,rfc,spoof',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);
        User::create([
            'title' => 'Manager',
            'name' => $this->name,
            'email' => $this->email,
            'image' => 'null',
            'phone' => $this->phone,
            'type' => 'MANAGER',
            'youtube' => $this->youtube,
            'instagram' => $this->instagram,
            'twitter' => $this->twitter,
            'facebook' => $this->instagram,
            'password' =>  bcrypt($this->password)
        ]);
        $this->emit('success', 'Admin Added Successfully');
        return redirect('/admin-list');

    }
    public function render()
    {
        return view('livewire.admin.users.admin.add-admin');
    }
}
