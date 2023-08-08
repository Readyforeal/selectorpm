<div class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 text-gray-800 dark:text-gray-200 leading-tight p-6">
    <a href="/project/{{ $projectUid }}" class="font-semibold text-xl">
        {{ $projectName }}
    </a>
    <p>
        {{ $projectAddress }}
    </p>
    <a class="text-xs" href="/project/{{ $projectUid }}/edit">Edit</a>
</div>