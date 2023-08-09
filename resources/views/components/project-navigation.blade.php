<div
    class="w-[300px] fixed top-[134px] bottom-0 bg-white dark:bg-gray-800 border-r border-gray-100 dark:border-gray-700 text-gray-800 dark:text-gray-200 leading-tight">
    <p class="p-3 text-sm">Navigation</p>
    <x-project-navigation-link path="/project/{{ $project->uid }}" name="Home" />
    <x-project-navigation-link path="/project/{{ $project->uid }}/selections" name="Selections" />
    <x-project-navigation-link path="/project/{{ $project->uid }}/estimating" name="Estimating" />
    <p class="p-3 text-sm border-t">Administration</p>
    <x-project-navigation-link path="/project/{{ $project->uid }}/users" name="User Management" />
    <x-project-navigation-link path="/project/{{ $project->uid }}/settings" name="Project Settings" />
</div>
