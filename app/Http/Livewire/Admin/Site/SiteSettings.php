<?php

namespace App\Http\Livewire\Admin\Site;

use App\Models\SiteSetting;
use Livewire\Component;

class SiteSettings extends Component
{
    public $youtube;
    public $facebook;
    public $twitter;
    public $instagram;

    public function mount()
    {
        $this->site = SiteSetting::first();
        $this->instagram = $this->site->instagram ?? '';
        $this->twitter = $this->site->twitter ?? '';
        $this->facebook = $this->site->facebook ?? '';
        $this->youtube = $this->site->youtube ?? '';
    }
    public function updateInfo()
    {
        if ($this->site == NULL) {
            SiteSetting::create([
                'youtube' => $this->youtube,
                'instagram' => $this->instagram,
                'twitter' => $this->twitter,
                'facebook' => $this->facebook
            ]);
            $this->emit('success', 'Site Settings Added');
        } else {
            $this->site->update([
                'youtube' => $this->youtube,
                'instagram' => $this->instagram,
                'twitter' => $this->twitter,
                'facebook' => $this->facebook
            ]);
            $this->emit('success', 'Site Settings Updated');
        }
    }
    public function render()
    {
        return view('livewire.admin.site.site-settings');
    }
}
