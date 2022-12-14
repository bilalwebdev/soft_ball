<?php

namespace App\Http\Livewire\Admin\Users\Admin;

use Livewire\Component;

class EditAdmin extends Component
{
    public $title;
    public $name;
    public $email;
    public $admin;
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

    public function mount($admin)
    {
        $this->name = $admin->name;
        $this->email = $admin->email;
        $this->phone = $admin->phone;
        $this->youtube = $admin->youtube;
        $this->instagram = $admin->instagram;
        $this->facebook = $admin->facebook;
        $this->twitter = $admin->twitter;
    }

    public function updateInfo()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'email:filter,rfc,spoof',
        ]);
        $this->admin->update(
            [
                'title' => 'Admin',
                'name' => $this->name,
                'email' => $this->email,
                'image' => 'null',
                'phone' => $this->phone,
                'type' => 'MANAGER',
                'youtube' => $this->youtube,
                'instagram' => $this->instagram,
                'twitter' => $this->twitter,
                'facebook' => $this->instagram,
            ]
        );
        $this->emit('success', 'Profile Updated Successfully');
        return redirect('/admin-list');
    }
    public function updatePassword()
    {

        $this->validate(
            [
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password'
            ]
            );
        $this->admin->update(
            [
                'password' =>  bcrypt($this->password),
            ]
            );
            $this->emit('success', 'Password Updated Successfully');
            return redirect('/admin-list');
    }

    public function render()
    {

        return view('livewire.admin.users.admin.edit-admin');
    }
}
