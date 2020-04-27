<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Book extends Component
{
    public $img;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($img)
    {
        $this->img = $img;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.book');
    }
}
