<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SupervisorsLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('layouts.supervisors', [
            'dateArray' => now()->toArray(),
        ]);
    }
}
