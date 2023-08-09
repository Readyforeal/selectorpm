<x-app-layout>

    <x-project-header :project="$project"/>
    <x-project-navigation :project="$project"/>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/project/{{ $project->uid }}/edit" method="POST">
                        @method('patch')
                        @csrf

                        <div>
                            <x-input-label for="name">Name</x-input-label>

                            <x-text-input id="name" class="w-full" name="name" value="{{ $project->name }}"
                                required />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-2">
                            <x-input-label for="address">Address</x-input-label>

                            <x-text-input id="address" class="w-full" name="address" value="{{ $project->address }}"
                                required />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>

                        <div class="mt-3">
                            <x-primary-button>Save Changes</x-primary-button>
                        </div>

                    </form>

                    <hr class="mt-3">

                    <div class="mt-3">

                        <p class="font-semibold text-red-500">Danger Zone</p>

                        <x-danger-button x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-project-deletion')" class="mt-3">
                            {{ __('Delete Project') }}
                        </x-danger-button>

                        <x-modal name="confirm-project-deletion" focusable>
                            <form action="/project/{{ $project->uid }}/delete" method="POST" class="p-6 text-center">
                                @csrf
                                @method('delete')

                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Are you sure you want to delete this project?') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Once this project is deleted, all of its resources and data will be permanently deleted.') }}
                                </p>

                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>

                                    <x-danger-button class="ml-3">
                                        {{ __('Delete Project') }}
                                    </x-danger-button>
                                </div>
                            </form>
                        </x-modal>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
