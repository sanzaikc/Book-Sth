<?php

namespace App\View\Components;

use Illuminate\View\Component;

class threadCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $threads;

    public function __construct($threads)
    {
        $this->threads = $threads;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.thread-card');
    }
}
