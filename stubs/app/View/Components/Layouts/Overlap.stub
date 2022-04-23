<?php

namespace App\View\Components\Layouts;

use App\View\Components\Traits\UserTheme;
use Illuminate\View\Component;

class Overlap extends Component
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
        return view('layouts.overlap', [
            'theme' => $this->getUserTheme(),
        ]);
    }
}
