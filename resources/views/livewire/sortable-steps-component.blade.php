<div class="w-1/3">
    <ul wire:sortable="updateTaskOrder" class="border-2 h-full rounded-2xl overflow-x-hidden">
        @forelse ($steps as $step)
            <li wire:click="selectStep({{ $step->id }})" wire:sortable.item="{{ $step['id'] }}" wire:key="task-{{ $step['id'] }}" class="@if($selectedStepId == $step->id) bg-gray-100 @else bg-white @endif relative cursor-pointer border-b flex flex-row items-center justify-between pr-5">
                @if($step->image_url)
                    <img class="h-full w-[25%] max-h-14 max-w-14" style="margin-bottom: -1px;" src="{{asset($step->image_url)}}">
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-1/4 max-h-32 text-gray-500" style="margin-bottom: -1px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                @endif
                @if($step->title) <h4>{{ $step['title'] }}</h4> @else <p class="text-gray-400">Voorbeeld</p> @endif
                <svg xmlns="http://www.w3.org/2000/svg" wire:sortable.handle class="h-6 w-6 hover:cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </li>
        @empty
            <li  class="bg-white relative cursor-pointer border-b flex flex-row items-center justify-between pr-5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-1/4 max-h-32 text-gray-500" style="margin-bottom: -1px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <p class="text-gray-400">Voorbeeld</p>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </li>
        @endforelse
    </ul>
</div>
