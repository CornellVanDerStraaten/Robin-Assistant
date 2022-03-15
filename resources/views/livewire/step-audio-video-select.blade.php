<div x-data="{ aidSelectOpen: @entangle('aidSelectOpen')}">
    <label for="help" class="block text-sm font-medium text-gray-700">Hulpmiddelen</label>
    <div class="mt-1 relative rounded-md shadow-sm">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
        </div>
        <input wire:click="openAidSelect(true)" type="text" readonly name="help" id="help" class="hover:cursor-pointer text-center block w-full sm:text-sm border-gray-300 rounded-md" value="@if($step->image_url || $selectedAudioId || $audio) Audio fragment @else Uit @endif">
    </div>

    <div x-show="aidSelectOpen" class="h-full w-full absolute left-0 top-0 z-30 flex justify-center items-center" >
        <div @click.away="aidSelectOpen = false" x-show="aidSelectOpen" class="rounded-2xl opacity-100 h-5/6 w-5/6 left-0 top-0 z-20 bg-white flex flex-col relative">
            <div class="h-5/6 flex flex-col">
                <div class="p-5 grid grid-cols-10 gap-2 overflow-scroll">
                    <div class="rounded border-2 border-gray-400 border-dashed mr-5 col-span-4 row-span-2 flex flex-col align-middle justify-center">
                        <p class="text-lg text-center">Audio niet aanwezig? Voeg eigen audio toe</p>

                        <span class="flex flex-row text-gray-500 text-sm text-center justify-center my-4">
                            <p class="text-sidebar-blue hover:text-sidebar-blue-dark hover:cursor-pointer mr-1">Upload </p>
                            hier uw eigen audio
                        </span>

                        <button class="text-white self-center bg-button-green hover:bg-button-green-dark transition flex flex-row gap-8 rounded pl-3 py-2 pr-10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Audio toevoegen
                        </button>
                    </div>
                    @foreach($existingAudios as $audio)
                        <div wire:click="selectAudio({{ $audio }})" class="@if($selectedAudioId == $audio->id) bg-green-100 @endif cursor-pointer z-10 text-center flex flex-col justify-center align-middle border border-gray-700 p-2 w-25 h-25">
                            <p class="text-sm">{{ $audio->title }}</p>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 m-3 self-center" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    @endforeach
                    @for($x = 1; $x < 15; $x++)
                        <div class="z-10 text-center flex flex-col justify-center align-middle border border-gray-700 p-2 w-25 h-25">
                            <p class="text-sm">Audio</p>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 m-3 self-center" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    @endfor
                </div>
            </div>
            <input type="file" wire:model="audio" id="file" name="file" class="opacity-0 text-transparent h-5/6 w-full absolute bg-transparent left-0 top-0 focus:outline-none" placeholder="Kies hier een bestand">
            <div class="flex flex-row gap-6 justify-center align-middle h-1/6 border-t border-dashed border-gray-400 bg-gray-100 rounded-b-2xl">
                <button @click="aidSelectOpen = false" class="text-white self-center bg-gray-500 hover:bg-gray-600 transition flex flex-row gap-8 rounded pl-3 py-2 pr-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Terug
                </button>
                <label wire:click="saveSelectedAudio" for="submit-form" class="cursor-pointer text-white self-center bg-sidebar-blue hover:bg-sidebar-blue-dark transition flex flex-row gap-8 rounded pl-3 py-2 pr-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Doorgaan
                </label>
            </div>
        </div>
    </div>

    <div x-show="aidSelectOpen" class="opacity-75 bg-black h-full w-full absolute left-0 top-0 z-100 flex justify-center items-center" ></div>
</div>

