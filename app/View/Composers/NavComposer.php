<?php

namespace App\View\Composers;

use App\Models\Team;
use Illuminate\View\View;

class NavComposer
{

    protected $teams;

    public function __construct()
    {
        $this->teams = Team::all();
    }

    public function compose(View $view)
    {
        $view->with('teams', $this->teams);
    }
}
