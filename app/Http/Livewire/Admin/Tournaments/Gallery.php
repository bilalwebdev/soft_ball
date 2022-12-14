<?php

namespace App\Http\Livewire\Admin\Tournaments;

use App\Models\TournamentGallery;
use Livewire\Component;

class Gallery extends Component
{
    public $tournament;
    public $videoLink;

    public function mount($tournament)
    {
        $this->tournament = $tournament;
    }

    public function saveImage($key)
    {
        TournamentGallery::create([
            'tournament_id' => $this->tournament->id,
            'path' => $key,
            'type' => TournamentGallery::TYPE_IMG,
        ]);
    }
    public function saveVideo()
    {
        TournamentGallery::create([
            'tournament_id' => $this->tournament->id,
            'path' => $this->videoLink,
            'type' => TournamentGallery::TYPE_VID,
        ]);
        $this->videoLink = "";
    }

    public function delGalleryAsset($id)
    {
        TournamentGallery::find($id)->delete();

        $this->emit('success', 'Media Deleted');
    }
    public function render()
    {
        $gallery = TournamentGallery::where('tournament_id', $this->tournament->id)->get();
        return view('livewire.admin.tournaments.gallery',compact('gallery'));
    }
}
