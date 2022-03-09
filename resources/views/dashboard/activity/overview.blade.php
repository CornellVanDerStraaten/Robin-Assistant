<x-supervisors-layout>
    @include('partials.activity-steps')
    <div class="p-5 grid grid-cols-10 grid-rows-5 gap-2 h-5/6 overflow-scroll">
        <livewire:start-activity-create-upload />
        @for($x = 1; $x < 5; $x++)
            <div class="flex flex-col justify-center align-middle border p-2">
                <p>Naam</p>
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
            </div>
        @endfor
    </div>

</x-supervisors-layout>
