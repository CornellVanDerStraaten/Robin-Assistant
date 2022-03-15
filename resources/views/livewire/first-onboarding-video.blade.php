<div x-data="{ open: @entangle('open')}">
    <div x-show="open" class="h-full w-full absolute left-0 top-0 z-30 flex justify-center items-center" >
        <div @click.away="open = false" x-show="open" class="rounded-2xl opacity-100 h-5/6 w-5/6 left-0 top-0 z-20 bg-white flex flex-col relative">
            <div class="h-5/6 px-5 py-2">
                <iframe class="h-full w-full rounded-md" src="https://www.youtube.com/embed/KTq0jqkkV_c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="flex flex-row gap-6 justify-center align-middle h-1/6 border-t border-dashed border-gray-400 bg-gray-100 rounded-b-2xl">
                <button @click="open = false" class="text-white self-center bg-gray-500 hover:bg-gray-600 transition flex flex-row gap-8 rounded pl-3 py-2 pr-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Terug
                </button>
                <label wire:click="close" for="submit-form" class="cursor-pointer text-white self-center bg-sidebar-blue hover:bg-sidebar-blue-dark transition flex flex-row gap-8 rounded pl-3 py-2 pr-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Doorgaan
                </label>
            </div>
        </div>
    </div>

    <div x-show="open" class="opacity-75 bg-black h-full w-full absolute left-0 top-0 z-100 flex justify-center items-center" ></div>
</div>


