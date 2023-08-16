<x-app-layout>

    @php
        $linkedCategories = $selection->categories()->get();
        $linkedLocations = $selection->locations()->get();
    @endphp

    <div class="flex">
        <x-project-navigation :project="$project" />

        <div class="ml-[300px] mt-[65px] w-full">
            <x-page-header pageRoot="Selections" pageName="Edit Selection"
                path="/project/{{ $project->uid }}/selections" />

            <div class="bg-slate-50 dark:bg-gray-800 p-3">
                <div class=" mx-auto w-1/2">
                    <form action="/project/{{ $project->uid }}/selection/{{ $selection->id }}/edit" method="POST">
                        @method('patch')
                        @csrf

                        <div class="mt-3 flex justify-between">
                            <x-secondary-button
                                onclick="window.location='/project/{{ $project->uid }}/selection/{{ $selection->id }}'">
                                <i class="fa fa-arrow-left mr-2"></i>
                                Cancel
                            </x-secondary-button>
                            <x-primary-button>
                                Save
                                <i class="fa fa-check ml-2"></i>
                            </x-primary-button>
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
                                name="needed" {{ $selection->needed === 1 ? 'checked' : '' }} />
                            <x-input-error :messages="$errors->get('needed')" class="mt-2" />
                        </div>

                        <p class="mt-6 font-semibold">Organization</p>

                        <p class="text-xs">[Ctrl + Click] to select multiple</p>

                        <div class="flex mt-3 w-full">
                            <div class="mr-2 flex-auto">
                                <x-input-label for="category">Category</x-input-label>

                                <x-select-input id="category" class="w-full" name="categories[]" multiple>
                                    @foreach ($project->categories as $category)
                                        <option @if ($selection->categories->contains($category)) selected @endif
                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </x-select-input>
                                <x-input-error :messages="$errors->get('categories')" class="mt-2" />
                            </div>

                            <div class="flex-auto">
                                <x-input-label for="location">Location(s)</x-input-label>

                                <x-select-input id="locations" class="w-full" name="locations[]" multiple>
                                    @foreach ($project->locations as $location)
                                        <option @if ($selection->locations->contains($location)) selected @endif
                                            value="{{ $location->id }}">{{ $location->name }}</option>
                                    @endforeach
                                </x-select-input>
                                <x-input-error :messages="$errors->get('locations')" class="mt-2" />
                            </div>
                        </div>

                        <p class="mt-6 font-semibold">Additional Information</p>

                        <div class="mt-3">
                            <x-input-label for="name">Name</x-input-label>

                            <x-text-input id="name" class="w-full" name="name"
                                value="{{ $selection->name }}" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-3">
                            <x-input-label for="item_number">Item / Part / Model Number</x-input-label>

                            <x-text-input id="item_number" class="w-full" name="item_number"
                                value="{{ $selection->item_number }}" />
                            <x-input-error :messages="$errors->get('item_number')" class="mt-2" />
                        </div>

                        <div class="mt-3">
                            <x-input-label for="supplier">Supplier</x-input-label>

                            <x-text-input id="supplier" class="w-full" name="supplier"
                                value="{{ $selection->supplier }}" />
                            <x-input-error :messages="$errors->get('supplier')" class="mt-2" />
                        </div>

                        <div class="mt-3">
                            <x-input-label for="link">Link</x-input-label>

                            <x-text-input id="link" class="w-full" name="link"
                                value="{{ $selection->link }}" />
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

                                <x-number-input id="quantity" class="w-full" name="quantity"
                                    value="{{ $selection->quantity }}" />
                                <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                            </div>

                            <div class="flex-auto">
                                <x-input-label for="dimensions">Dimensions</x-input-label>

                                <x-text-input id="dimensions" class="w-full" name="dimensions"
                                    value="{{ $selection->dimensions }}" />
                                <x-input-error :messages="$errors->get('dimensions')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex mt-3 w-full">
                            <div class="mr-2 flex-auto">
                                <x-input-label for="finish">Finish</x-input-label>

                                <x-text-input id="finish" class="w-full" name="finish"
                                    value="{{ $selection->finish }}" />
                                <x-input-error :messages="$errors->get('finish')" class="mt-2" />
                            </div>

                            <div class="flex-auto">
                                <x-input-label for="color">Color</x-input-label>

                                <x-text-input id="color" class="w-full" name="color"
                                    value="{{ $selection->color }}" />
                                <x-input-error :messages="$errors->get('color')" class="mt-2" />
                            </div>
                        </div>

                    </form>

                    <hr class="my-3">

                    <p class="font-semibold text-red-500">Danger Zone</p>

                    <x-danger-button x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-selection-deletion')" class="mt-3">
                        <i class="fa fa-trash mr-2"></i>
                        {{ __('Delete') }}
                    </x-danger-button>

                    <x-modal name="confirm-selection-deletion" focusable>
                        <form action="/project/{{ $project->uid }}/selection/{{ $selection->id }}/delete"
                            method="POST" class="p-6 text-center">
                            @csrf
                            @method('delete')

                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Are you sure you want to delete this selection?') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Once this selection is deleted, all of its data will be permanently deleted.') }}
                            </p>

                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('No, Cancel') }}
                                </x-secondary-button>

                                <x-danger-button class="ml-3">
                                    <i class="fa fa-trash mr-2"></i>
                                    {{ __('Yes, Delete') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
