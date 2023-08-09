<x-app-layout>
    
    <x-project-header :project="$project"/>
    <x-project-navigation :project="$project"/>

    <div class="absolute left-[330px] right-0 mr-4">
        <h2 class="text-3xl mb-3">Selections</h2>

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-3">
            <a href="/project/{{ $project->uid }}/selection/create">Create Selection +</a>
        </div>
    </div>
</x-app-layout>
