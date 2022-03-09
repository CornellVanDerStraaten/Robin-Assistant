<nav aria-label="Progress" class="px-10 py-5 border-b-2 h-1/6">
    <ol role="list" class="space-y-4 md:flex md:space-y-0 md:space-x-8">
        <li class="md:flex-1">
            <!-- Completed Step -->
            <a href="#" class="group pl-4 py-2 flex flex-col border-l-4 @if(in_array($step, [1, 2, 3, 4])) border-sidebar-blue hover:border-sidebar-blue-dark @else  border-gray-200 hover:border-gray-300 @endif md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                <span class="text-xs @if(in_array($step, [1, 2, 3, 4])) text-sidebar-blue @else text-gray-500 @endif font-semibold tracking-wide uppercase group-hover:text-indigo-800">Stap 1</span>
                <span class="text-sm font-medium">Kies activiteit</span>
            </a>
        </li>

        <li class="md:flex-1">
            <!-- Current Step -->
            <a href="#" class="pl-4 py-2 flex flex-col border-l-4 @if(in_array($step, [2, 3, 4])) border-sidebar-blue hover:border-sidebar-blue-dark @else  border-gray-200 hover:border-gray-300 @endif md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4" aria-current="step">
                <span class="text-xs @if(in_array($step, [2, 3, 4])) text-sidebar-blue @else text-gray-500 @endif  font-semibold tracking-wide uppercase">Stap 2</span>
                <span class="text-sm font-medium">Bewerken</span>
            </a>
        </li>

        <li class="md:flex-1">
            <!-- Upcoming Step -->
            <a href="#" class="group pl-4 py-2 flex flex-col border-l-4 @if(in_array($step, [3, 4])) border-sidebar-blue hover:border-sidebar-blue-dark @else  border-gray-200 hover:border-gray-300 @endif md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                <span class="text-xs @if(in_array($step, [3, 4])) text-sidebar-blue @else text-gray-500 @endif  font-semibold tracking-wide uppercase group-hover:text-gray-700">Stap 3</span>
                <span class="text-sm font-medium">Toewijzen</span>
            </a>
        </li>

        <li class="md:flex-1">
            <!-- Upcoming Step -->
            <a href="#" class="group pl-4 py-2 flex flex-col border-l-4 @if(in_array($step, [4])) border-sidebar-blue hover:border-sidebar-blue-dark @else  border-gray-200 hover:border-gray-300 @endif md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                <span class="text-xs @if(in_array($step, [4])) text-sidebar-blue @else text-gray-500 @endif  font-semibold tracking-wide uppercase group-hover:text-gray-700">Stap 3</span>
                <span class="text-sm font-medium">Voltooien</span>
            </a>
        </li>
    </ol>
</nav>

