@section('style')
    <style>
        input[type="time"]::-webkit-calendar-picker-indicator {
            background: none;
            display: none;
        }
    </style>
@endsection
<div class="w-2/3">
    <form wire:submit.prevent="saveStep" id="form" class="h-full flex flex-row gap-5">
        <div class="flex flex-col justify-around py-5">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Naam</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input type="text" name="title" id="title" wire:model="title" class="text-center focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Stap naam">
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <input type="time" name="email" id="email" class="text-center focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com">
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <!-- Heroicon name: solid/mail -->
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </div>
                    <input type="email" name="email" id="email" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com">
                </div>
            </div>

            <label wire:click="newStep" for="submit-form" class="cursor-pointer text-white self-center bg-sidebar-blue hover:bg-sidebar-blue-dark transition flex flex-row gap-8 rounded pl-3 py-2 pr-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Nieuwe stap
            </label>
        </div>
        <div>
            <input type="file" wire:model="image" id="file" name="file" placeholder="Kies hier een bestand">
            <input type="submit" id="submit-form" class="hidden">
        </div>
    </form>
</div>
