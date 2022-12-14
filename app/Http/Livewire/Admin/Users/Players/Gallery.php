<?php

namespace App\Http\Livewire\Admin\Users\Players;

use App\Models\PlayerGallery;
use Livewire\Component;

class Gallery extends Component
{

    public $player;
    public $videoLink;

    public function mount($player)
    {
        $this->player = $player;
    }

    public function saveImage($key)
    {
        PlayerGallery::create([
            'player_id' => $this->player->id,
            'path' => $key,
            'type' => PlayerGallery::TYPE_IMG,
        ]);
    }
    public function saveVideo()
    {
        PlayerGallery::create([
            'player_id' => $this->player->id,
            'path' => $this->videoLink,
            'type' => PlayerGallery::TYPE_VID,
        ]);
        $this->videoLink = "";
        $this->emit('success', 'Video Added');
    }

    public function delGalleryAsset($id)
    {
        PlayerGallery::find($id)->delete();

        $this->emit('success', 'Media Deleted');
    }

    public function updateAssetOrder($images)
    {
        foreach ($images as $img) {
            PlayerGallery::find($img['value'])->update(['sort_order' => $img['order']]);
        }
    }

    public function render()
    {

        $gallery_images = PlayerGallery::where('type', PlayerGallery::TYPE_IMG)
            ->where('player_id', $this->player->id)
            ->oldest('sort_order')->get();
        $gallery_videos = PlayerGallery::where('type', PlayerGallery::TYPE_VID)
        ->where('player_id', $this->player->id)
        ->oldest('sort_order')->get();

        return view('livewire.admin.users.players.gallery', compact('gallery_images', 'gallery_videos'));
    }
}
