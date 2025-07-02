<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ReportSection extends Component
{
    public $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('components.report-section');
    }
}
