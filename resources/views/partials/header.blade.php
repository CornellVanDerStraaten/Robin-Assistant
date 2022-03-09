<div class="flex flex-row h-1/6">
    <div class=" border-r-2 border-gray-300 w-1/5 inline-block flex justify-center align-middle">
        <img src="{{ asset('img/RobinLogo.svg') }}" class="my-5 w-2/4">
    </div>
    <div class="inline-block border-gray-300 w-4/5 inline-block shadow-md flex flex-row">
        <div class="w-1/3 flex flex-row justify-center h-full">
            <p class="self-center text-2xl">{{ "${dateArray['day']} " . \App\Enums\MonthEnum::tryFrom($dateArray['month'])->name . ", "}}</p>
            <p class="self-center text-2xl text-gray-400 ml-2">{{ " ${dateArray['year']} "}}</p>
        </div>
        <div class="text-white w-1/3 flex flex-row justify-center h-full">
            @if(Route::is('activity.*'))
                <a href="{{ route('dashboard') }}" class="self-center bg-gray-500 hover:bg-gray-600 transition flex flex-row gap-8 rounded pl-3 py-2 pr-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Terug naar home
                </a>
            @else
                <a href="{{ route('activity.overview') }}" class="self-center bg-button-green hover:bg-button-green-dark transition flex flex-row gap-8 rounded pl-3 py-2 pr-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Activiteit toevoegen
                </a>
            @endif
        </div>
        <div class="flex flex-row justify-center w-1/3 h-full">
            <p class="self-center">Welkom {{ auth()->user()->name }}</p>
        </div>
    </div>
</div>
