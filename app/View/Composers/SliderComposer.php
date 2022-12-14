<?php

namespace App\View\Composers;

use App\Models\Slider;
use Illuminate\View\View;

class SliderComposer
{

    protected $slides;

    public function __construct()
    {
        $this->slides = Slider::all();
    }

    public function compose(View $view)
    {
        $view->with('slides', $this->slides);
    }
}
