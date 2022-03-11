<div x-data="{ open: @entangle('show')}" class="rounded border-2 border-gray-400 border-dashed mr-5 col-span-6 row-span-3 flex flex-col align-middle justify-center">
    <p class="text-lg text-center">Taak niet aanwezig? Creër eigen taak</p>

    <span class="flex flex-row text-gray-500 text-sm text-center justify-center my-4">
        <p @click="open = true" class="text-sidebar-blue hover:text-sidebar-blue-dark hover:cursor-pointer mr-1">Upload </p>
        hier uw eigen taak afbeelding
    </span>

    <button @click="open = true" class="text-white self-center bg-button-green hover:bg-button-green-dark transition flex flex-row gap-8 rounded pl-3 py-2 pr-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
        Afbeelding toevoegen
    </button>

    <div x-show="open" class="h-full w-full absolute left-0 top-0 z-20 flex justify-center items-center" >
        <div @click.away="open = false" class="rounded-2xl opacity-100 h-5/6 w-5/6 left-0 top-0 z-20 bg-white flex flex-col relative">
            <div class="h-5/6 flex flex-col justify-center items-center">
                @if($image && !$errors->has('image'))
                    <img src="{{ $image->temporaryUrl() }}" class="h-36 w-auto p-3 border-2 border-gray-300 rounded border-dashed mb-4">
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-36 w-36 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                @endif
                <label for="file" class="flex flex-row"><p class="mr-1.5 text-sidebar-blue">Sleep</p> hier een afbeelding of <p class="mx-1.5 text-sidebar-blue hover:text-sidebar-blue-dark">kies</p> een bestand</label>
                @error('image') <span class="error text-red-600">{{ $message }}</span> @enderror
            </div>
            <form wire:submit.prevent="save" id="form">
                <input type="file" wire:model="image" id="file" name="file" class="opacity-0 text-transparent h-5/6 w-full absolute bg-transparent left-0 top-0 focus:outline-none" placeholder="Kies hier een bestand">
                <input type="submit" id="submit-form" class="hidden">
            </form>
            <div class="flex flex-row gap-6 justify-center align-middle h-1/6 border-t border-dashed border-gray-400 bg-gray-100 rounded-b-2xl">
                <button @click="open = false" class="text-white self-center bg-gray-500 hover:bg-gray-600 transition flex flex-row gap-8 rounded pl-3 py-2 pr-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Terug
                </button>
                <label wire:click="save" for="submit-form" class="cursor-pointer text-white self-center bg-sidebar-blue hover:bg-sidebar-blue-dark transition flex flex-row gap-8 rounded pl-3 py-2 pr-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Doorgaan
                </label>
            </div>
        </div>
    </div>

    <div x-show="open" class="opacity-75 bg-black h-full w-full absolute left-0 top-0 z-10 flex justify-center items-center" ></div>

</div>


