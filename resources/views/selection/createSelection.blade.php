<x-app-layout>

    <x-project-header :project="$project" />

    <div class="flex">
        <x-project-navigation :project="$project" />

        <div class="ml-[300px] mt-[134px] w-full">
            <x-page-header pageRoot="Selections" pageName="Create Selection" path="/project/{{ $project->uid }}/selections"/>
    
            <div class="bg-white dark:bg-gray-800 p-3">
                <div class="w-1/2">
                <form action="/project/{{ $project->uid }}/selection/create" method="POST">
                    @csrf
    
                    <div>
                        <x-input-label for="title">Title</x-input-label>
    
                        <x-text-input id="title" class="w-full" name="title" required />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
    
                    <div class="mt-3">
                        <x-input-label for="needed">Selection Needed</x-input-label>
                        <x-check-input name="needed" />
                        <x-input-error :messages="$errors->get('needed')" class="mt-2" />
                    </div>
    
                    <p class="mt-3">Additional Information</p>
    
                    <div class="mt-3">
                        <x-input-label for="name">Name</x-input-label>
    
                        <x-text-input id="name" class="w-full" name="name" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
    
                    <div class="mt-3">
                        <x-input-label for="item_number">Item # | Part # | Model #</x-input-label>
    
                        <x-text-input id="item_number" class="w-full" name="item_number" required />
                        <x-input-error :messages="$errors->get('item_number')" class="mt-2" />
                    </div>
    
                    <div class="mt-3">
                        <x-input-label for="supplier">Supplier</x-input-label>
    
                        <x-text-input id="supplier" class="w-full" name="supplier" required />
                        <x-input-error :messages="$errors->get('supplier')" class="mt-2" />
                    </div>
    
                    <div class="mt-3">
                        <x-input-label for="link">Link</x-input-label>
    
                        <x-text-input id="link" class="w-full" name="link" required />
                        <x-input-error :messages="$errors->get('link')" class="mt-2" />
                    </div>
    
                    <div class="mt-3">
                        <x-input-label for="image">Image</x-input-label>
    
                        <x-file-input id="image" class="w-full" name="image" required />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>
    
                    <div class="flex mt-3 w-full">
                        <div class="mr-2 flex-auto">
                            <x-input-label for="quantity">Quantity</x-input-label>
        
                            <x-number-input id="quantity" class="w-full" name="quantity" required />
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                        </div>
        
                        <div class="flex-auto">
                            <x-input-label for="dimensions">Dimensions</x-input-label>
        
                            <x-text-input id="dimensions" class="w-full" name="dimensions" required />
                            <x-input-error :messages="$errors->get('dimensions')" class="mt-2" />
                        </div>
                    </div>
    
                    <div class="flex mt-3 w-full">
                        <div class="mr-2 flex-auto">
                            <x-input-label for="finish">Finish</x-input-label>
        
                            <x-text-input id="finish" class="w-full" name="finish" required />
                            <x-input-error :messages="$errors->get('finish')" class="mt-2" />
                        </div>
        
                        <div class="flex-auto">
                            <x-input-label for="color">Color</x-input-label>
        
                            <x-text-input id="color" class="w-full" name="color" required />
                            <x-input-error :messages="$errors->get('color')" class="mt-2" />
                        </div>
                    </div>
    
                </form>
            </div>
            </div>
        </div>
    </div>

</x-app-layout>
