<x-app-layout>

    <x-project-header :project="$project" />

    <div class="flex">
        <x-project-navigation :project="$project" />

        <div class="ml-[300px] mt-[134px] w-full">
            <x-page-header pageRoot="Selections" pageName="" path="" />

            <div>
                @foreach ($project->selections as $selection)
                    <a class="block p-4 border-b dark:border-zinc-900 hover:bg-slate-100 dark:hover:bg-zinc-900 transition" href="/project/{{ $project->uid }}/selection/{{ $selection->id }}">
                        <p class="font-semibold">{{ $selection->title }}</p>
                        <p class="text-sm">{{ $selection->name == '' ? 'Selection Needed' : $selection->name }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
