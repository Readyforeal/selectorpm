<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PageHeader extends Component
{
    public string $pageRoot;
    public string $pageName;
    public string $path;
    /**
     * Create a new component instance.
     */
    public function __construct($pageRoot, $pageName, $path)
    {
        $this->pageRoot = $pageRoot;
        $this->pageName = $pageName;
        $this->path = $path;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.page-header');
    }
}
