<?php

namespace App\View\Components;

use Illuminate\View\Component;

class officeLayout extends Component
{
    public $title;
    public function __construct($title = null)
    {
        $this->title = $title ?? 'Jokikuy20';
    }

    public function render()
    {
        return view('theme.office.index');
    }
}