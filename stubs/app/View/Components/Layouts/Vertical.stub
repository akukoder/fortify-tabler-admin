<?php

namespace App\View\Components\Layouts;

use App\View\Components\Traits\UserTheme;
use Illuminate\View\Component;

class Vertical extends Component
{
    use UserTheme;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.vertical', [
            'theme' => $this->getUserTheme(),
        ]);
    }
}
