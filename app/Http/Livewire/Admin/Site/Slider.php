<?php

namespace App\Http\Livewire\Admin\Site;

use App\Models\Slider as ModelsSlider;
use Livewire\Component;

class Slider extends Component
{

    public $editableId = 0;
    public $line_one;
    public $line_two;

    public function saveImage($key)
    {
        ModelsSlider::create([

            'path' => $key,

        ]);
    }

    public function delGalleryAsset($id)
    {
        ModelsSlider::find($id)->delete();

        $this->emit('success', 'Slide Deleted');
    }

    public function makeEditable($id)
    {
        $slide = ModelsSlider::find($id);

        $this->editableId = $id;
        $this->line_one = $slide->text_one;
        $this->line_two = $slide->text_two;
    }

    public function makeUnEditable()
    {
        $this->editableId = 0;
    }

    public function saveText()
    {
        ModelsSlider::find($this->editableId)->update([
            'text_one' => $this->line_one,
            'text_two' => $this->line_two,
        ]);

        $this->emit('success','Text Saved');
    }

    public function render()
    {

        $slides = ModelsSlider::all();
        return view('livewire.admin.site.slider', compact('slides'));
    }
}
