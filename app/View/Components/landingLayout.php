<?php

namespace App\View\Components;

use Illuminate\View\Component;

class landingLayout extends Component
{
    public $title;
    public function __construct($title = null)
    {
        $this->title = $title ?? 'Jokikuy20';
    }

    public function render()
    {
        return view('theme.landing.main');
    }
}