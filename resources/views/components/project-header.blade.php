<div
    class="bg-white fixed top-[65px] w-full dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 text-gray-800 dark:text-gray-200 leading-tight p-3">
    <a href="/project/{{ $project->uid }}" class="font-semibold text-lg">
        {{ $project->name }}
    </a>
    <p class="text-xs text-gray-400">
        {{ $project->address }}
    </p>
</div>
