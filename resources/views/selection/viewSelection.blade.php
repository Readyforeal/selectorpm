<x-app-layout>

    <x-project-header :project="$project" />

    <div class="flex">
        <x-project-navigation :project="$project" />

        <div class="ml-[300px] mt-[134px] w-full">
            <x-page-header pageRoot="Selections" pageName="{{ $selection->title }}"
                path="/project/{{ $project->uid }}/selections" />

            <div class="bg-slate-50 dark:bg-gray-800 p-3">
                <h2 class="text-xl">{{ $selection->name == '' ? 'Selection Needed' : $selection->name }}</h2>
                <p class="text-sm">Item Number: {{ $selection->item_number }}</p>
                <p class="text-sm">Supplier: {{ $selection->supplier }}</p>
                <a class="hover:text-black transition flex mt-2 hover:pl-1 transition-spacing" target="_blank" href="{{ $selection->link }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                    </svg>
                      
                    Selection Link
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
