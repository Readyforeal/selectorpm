<?php

namespace App\View\Components;

use App\Models\Project;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProjectHeader extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $projectName,
        public string $projectAddress,
        public string $projectUid,
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.project-header');
    }
}
