<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/project/create" method="POST">
                        @csrf

                        <div>
                            <x-input-label for="name">Name</x-input-label>

                            <x-text-input 
                                id="name" 
                                class="w-full"
                                name="name"
                                required
                            />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-2">
                            <x-input-label for="address">Address</x-input-label>

                            <x-text-input 
                                id="address" 
                                class="w-full"
                                name="address"
                                required
                            />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>

                        <div class="mt-3">
                            <x-primary-button>Create</x-primary-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
