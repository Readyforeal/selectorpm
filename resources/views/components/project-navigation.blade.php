<div class="w-[300px] fixed top-[65px] bg-white bottom-0 border-r dark:border-zinc-900">
    
    <x-project-header :project="$project" />

    <p class="p-3 text-sm font-semibold">Navigation</p>
    <x-project-navigation-link path="/project/{{ $project->uid }}">
        <i class="fa fa-fw fa-house mr-2"></i>
        Home
    </x-project-navigation-link>
    <x-project-navigation-link path="/project/{{ $project->uid }}/selections">
        <i class="fa fa-fw fa-circle-check mr-2"></i>
        Selections
    </x-project-navigation-link>
    <x-project-navigation-link path="/project/{{ $project->uid }}/estimating">
        <i class="fa fa-fw fa-file-invoice mr-2"></i>
        Estimating
    </x-project-navigation-link>
    <p class="mt-3 p-3 text-sm font-semibold border-t dark:border-zinc-900">Administration</p>
    <x-project-navigation-link path="/project/{{ $project->uid }}/users">
        <i class="fa fa-fw fa-users mr-2"></i>
        User Management
    </x-project-navigation-link>
    <x-project-navigation-link path="/project/{{ $project->uid }}/settings">
        <i class="fa fa-fw fa-gear mr-2"></i>
        Project Settings
    </x-project-navigation-link>
</div>
