<x-app-layout>

    <x-project-header :project="$project" />

    <div class="flex">
        <x-project-navigation :project="$project" />

        <div class="ml-[300px] mt-[134px] w-full">
            <x-page-header pageRoot="Selections" pageName="Edit Selection"
                path="/project/{{ $project->uid }}/selections" />

            <div class="bg-white dark:bg-gray-800 p-3">
                <div class="w-1/2">
                    <form action="/project/{{ $project->uid }}/selection/create" method="POST">
                        @method('patch')
                        @csrf

                        <div class="mt-3 flex justify-end">
                            <x-primary-button>Save Selection</x-primary-button>
                        </div>

                        <div class="mt-3">
                            <x-input-label for="title">Title <span class="text-xs text-red-500">-
                                    Required</span></x-input-label>

                            <x-text-input id="title" class="w-full" name="title" value="{{ $selection->title }}"
                                required />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mt-3">
                            <x-input-label for="needed">Selection Needed</x-input-label>

                            <input type="checkbox" class="text-indigo-800 border-gray-300 dark:border-gray-700 rounded"
                                name="needed" {{ $selection->needed === true ? 'checked' : '' }} />
                            <x-input-error :messages="$errors->get('needed')" class="mt-2" />
                        </div>

                        <p class="mt-3 font-semibold">Organization</p>

                        <div class="flex mt-3 w-full">
                            <div class="mr-2 flex-auto">
                                <x-input-label for="category">Category</x-input-label>

                                <x-select-input id="category" class="w-full" name="category">
                                    @if ($selection->categories()->first())
                                        <option value="{{ $selection->categories()->first() }}">{{ $selection->categories()->first()->name }}</option>
                                    @endif
                                    @foreach ($project->categories as $category)
                                        @if ($selection->categories()->first()->id === $category->id)
                                            @continue
                                        @endif
                                        <option {{ $selection->categories }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </x-select-input>
                                <x-input-error :messages="$errors->get('category')" class="mt-2" />
                            </div>

                            <div class="flex-auto">
                                <x-input-label for="location">Location(s)</x-input-label>

                                <x-select-input id="locations" class="w-full" name="locations[]" multiple>
                                    @foreach ($project->locations as $location)
                                        {{ $location->selections()->first()->id === $selection->id ? 'selected' : '' }}
                                        {{-- <option {{ $location->selections()->first()->id ? 'selected' : '' }} value="{{ $location->id }}">{{ $location->name }}</option> --}}
                                    @endforeach
                                </x-select-input>
                                <x-input-error :messages="$errors->get('locations')" class="mt-2" />
                            </div>
                        </div>

                        <p class="mt-3 font-semibold">Additional Information</p>

                        <div class="mt-3">
                            <x-input-label for="name">Name</x-input-label>

                            <x-text-input id="name" class="w-full" name="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-3">
                            <x-input-label for="item_number">Item / Part / Model Number</x-input-label>

                            <x-text-input id="item_number" class="w-full" name="item_number" />
                            <x-input-error :messages="$errors->get('item_number')" class="mt-2" />
                        </div>

                        <div class="mt-3">
                            <x-input-label for="supplier">Supplier</x-input-label>

                            <x-text-input id="supplier" class="w-full" name="supplier" />
                            <x-input-error :messages="$errors->get('supplier')" class="mt-2" />
                        </div>

                        <div class="mt-3">
                            <x-input-label for="link">Link</x-input-label>

                            <x-text-input id="link" class="w-full" name="link" />
                            <x-input-error :messages="$errors->get('link')" class="mt-2" />
                        </div>

                        <div class="mt-3">
                            <x-input-label for="image">Image</x-input-label>

                            <x-file-input id="image" class="w-full" name="image" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <div class="flex mt-3 w-full">
                            <div class="mr-2 flex-auto">
                                <x-input-label for="quantity">Quantity</x-input-label>

                                <x-number-input id="quantity" class="w-full" name="quantity" />
                                <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                            </div>

                            <div class="flex-auto">
                                <x-input-label for="dimensions">Dimensions</x-input-label>

                                <x-text-input id="dimensions" class="w-full" name="dimensions" />
                                <x-input-error :messages="$errors->get('dimensions')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex mt-3 w-full">
                            <div class="mr-2 flex-auto">
                                <x-input-label for="finish">Finish</x-input-label>

                                <x-text-input id="finish" class="w-full" name="finish" />
                                <x-input-error :messages="$errors->get('finish')" class="mt-2" />
                            </div>

                            <div class="flex-auto">
                                <x-input-label for="color">Color</x-input-label>

                                <x-text-input id="color" class="w-full" name="color" />
                                <x-input-error :messages="$errors->get('color')" class="mt-2" />
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
