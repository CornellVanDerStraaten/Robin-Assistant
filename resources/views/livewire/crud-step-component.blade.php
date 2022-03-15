@section('style')
    <style>
        input[type="time"]::-webkit-calendar-picker-indicator {
            background: none;
            display: none;
        }
    </style>
@endsection
<div class="w-full">
    <form id="form" wire:submit.prevent="newStep" class="h-full w-full flex flex-row">
        <div class="w-1/3 flex flex-col justify-around px-5">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Naam</label>
                <div class="mt-1 mb-1 relative rounded-md shadow-sm">
                    <input type="text" name="title" id="title" wire:model="title" class="text-center focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Stap naam">
                </div>
                @error('title') <span class="error text-red-600 shadow-none">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Secondes</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <input wire:model="duration" type="text" name="duration" id="email" class="text-center focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="5">
                </div>
                @error('duration') <span class="error text-red-600">{{ $message }}</span> @enderror
            </div>

            <livewire:step-audio-video-select :step="$step"/>

            <label for="submit-form" class="cursor-pointer text-white self-center bg-sidebar-blue hover:bg-sidebar-blue-dark transition flex flex-row gap-8 rounded pl-3 py-2 pr-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Nieuwe stap
            </label>
        </div>

        <div class="rounded-2xl opacity-100 w-2/3 left-0 top-0 z-20 bg-white relative inline-block">
            <div class="h-full flex flex-col justify-between items-center">
                @if($step->image_url && $image == null)
                    <img src="{{ asset($step->image_url) }}" class="h-5/6 w-full rounded-2xl mb-4">
                @else
                    @if($image && !$errors->has('image'))
                        <img src="{{ $image->temporaryUrl() }}" class="h-5/6 w-full rounded-2xl mb-4">
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5/6 w-full text-gray-400 border-dashed border border-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    @endif
                @endif

                <label for="file" class="flex flex-row"><p class="mr-1.5 text-sidebar-blue">Sleep</p> hier een afbeelding of <p class="mx-1.5 text-sidebar-blue hover:text-sidebar-blue-dark">kies</p> een bestand</label>
                @error('image') <span class="error text-red-600">{{ $message }}</span> @enderror
            </div>
            <form wire:submit.prevent="save" id="form">
                <input type="file" wire:model="image" id="file" name="file" class="opacity-0 text-transparent h-full w-full absolute bg-transparent left-0 top-0 focus:outline-none" placeholder="Kies hier een bestand">
                <input type="submit" id="submit-form" class="hidden">
            </form>
        </div>

    </form>
</div>
