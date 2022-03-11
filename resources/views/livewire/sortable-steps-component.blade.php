<div class="w-1/3">
    <ul wire:sortable="updateTaskOrder" class="border-2 h-full rounded-2xl overflow-x-hidden overflow-y-scroll">
        @forelse ($steps as $step)
            <li wire:sortable.item="{{ $step['id'] }}" wire:key="task-{{ $step['id'] }}" class="bg-white relative cursor-pointer border-b flex flex-row items-center justify-between pr-5">
                <img class="h-full w-1/3 max-h-32" style="margin-bottom: -1px;" src="https://images.unsplash.com/photo-1453728013993-6d66e9c9123a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dmlld3xlbnwwfHwwfHw%3D&w=1000&q=80">
                <h4>{{ $step['title'] }}</h4>
                <svg xmlns="http://www.w3.org/2000/svg" wire:sortable.handle class="h-6 w-6 hover:cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </li>
        @empty
            <li>
                test
            </li>
        @endforelse
    </ul>
</div>
