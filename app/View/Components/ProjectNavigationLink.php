<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProjectNavigationLink extends Component
{
    public $path;
    public $name;
    /**
     * Create a new component instance.
     */
    public function __construct($path, $name)
    {
        $this->path = $path;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.project-navigation-link');
    }
}
