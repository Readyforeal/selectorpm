<x-app-layout>
    <div class="flex">
        <x-project-navigation :project="$project" />

        <div class="ml-[300px] mt-[65px] w-full">
            <x-page-header pageRoot="Selections" pageName="{{ $selection->title }}"
                path="/project/{{ $project->uid }}/selections" />

            <div class="bg-slate-50 dark:bg-gray-800 flex">
                <div class="flex-1 w-2/3">
                    <div class="w-full flex justify-between border-b p-3">
                        <x-primary-button>
                            <i class="fa fa-check mr-2"></i>
                            Approve
                        </x-primary-button>
                        
                        <x-secondary-button
                            onclick="window.location='/project/{{ $project->uid }}/selection/{{ $selection->id }}/edit'">
                            <i class="fa fa-pen-to-square mr-2"></i>
                            Edit
                        </x-secondary-button>
                    </div>

                    <div class="p-3">
                        <h2 class="text-xl">{{ $selection->name == '' ? 'Selection Needed' : $selection->name }}
                        </h2>
                        <p class="text-sm">Item Number: {{ $selection->item_number }}</p>
                        <p class="text-sm">Supplier: {{ $selection->supplier }}</p>
                        <x-secondary-button class="mt-3" onclick="window.location='{{ $selection->link }}'">
                            <i class="fa fa-link mr-2"></i>
                            Visit Site
                        </x-secondary-button>
                    </div>
                </div>

                <div class="border-l w-[400px] p-3">
                    <div class="mb-6">
                        <p class="font-semibold">
                            <i class="fa fa-fw fa-tags mr-1"></i>
                            Categories
                        </p>
                        @foreach ($selection->categories as $category)
                            <p class="text-xs">
                                {{ $category->name }}
                            </p>
                        @endforeach
                    </div>

                    <div>
                        <p class="font-semibold">
                            <i class="fa fa-fw fa-location-dot mr-1"></i>
                            Locations
                        </p>
                        @foreach ($selection->locations as $location)
                            <p class="text-xs">{{ $location->name }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
