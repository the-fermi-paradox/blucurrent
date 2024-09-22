<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Headcell extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $col,
                                public string $cmp,
                                public string $order)
    {}

    public function sortOrder() : string {
        return ($this->col == $this->cmp && $this->order == 'asc') ? 'desc' : 'asc';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.headcell');
    }
}
