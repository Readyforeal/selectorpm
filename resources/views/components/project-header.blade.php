<div
    class="fixed bg-slate-50 dark:bg-black z-50 top-[65px] w-screen border-b dark:border-zinc-900 leading-tight p-3">
    <a href="/project/{{ $project->uid }}" class="font-semibold text-lg">
        {{ $project->name }}
    </a>
    <p class="text-xs text-gray-400">
        {{ $project->address }}
    </p>
</div>
