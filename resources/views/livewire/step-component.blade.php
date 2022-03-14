<div class="h-5/6">
    <div class="h-5/6 flex flex-row p-5 relative">
        <livewire:sortable-steps-component :activity="$activity" />
        <livewire:crud-step-component :activity="$activity"/>
    </div>
    <div class="flex flex-col gap-3 justify-center align-middle h-1/6 border-t border-gray-400">
        <div class="flex flex-row gap-6 justify-center align-middle">
            <a href="{{ route('activity.index') }}" class="text-white self-center bg-gray-500 hover:bg-gray-600 transition flex flex-row gap-8 rounded pl-3 py-2 pr-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Terug
            </a>
            <label wire:click="checkSteps" class="cursor-pointer text-white self-center bg-sidebar-blue hover:bg-sidebar-blue-dark transition flex flex-row gap-8 rounded pl-3 py-2 pr-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Doorgaan
            </label>
        </div>
        @error('steps') <span class="text-center error text-red-600 shadow-none">{{ $message }}</span> @enderror
    </div>
</div>
