<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="my-2 mx-4">
                    <div class="flex flex-row justify-between mb-2">
                        <h3 class="text-xl leading-6 font-medium text-gray-900 my-5">{{ $patient->name }}</h3>
                        <div class="flex flex-row justify-end">
                            <a href="{{ route('patients.edit', $patient->id) }}" class="my-auto h-10 inline-flex items-center px-3 py-1 border border-transparent text-md font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Edit</a>
                            <form action="{{route('patients.destroy', $patient->id)}}" method="POST" class="my-auto">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="my-auto h-10 ml-3 inline-flex items-center px-3 py-1 border border-transparent text-md font-medium rounded shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Delete</button>
                            </form>
                        </div>
                    </div>
                    <div class="space-y-6 sm:space-y-5 mb-4">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label class="block text-md font-medium text-gray-700 sm:mt-px"> Gender </label>
                            <p class="my-auto max-w-lg block w-full  focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-md border-gray-300 rounded-md capitalize">{{ $patient->gender->value }}</p>
                        </div>
                    </div>

                    <div class="space-y-6 sm:space-y-5 mb-4">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label class="block text-md font-medium text-gray-700 sm:mt-px"> Date of birth </label>
                            <p class="my-auto max-w-lg block w-full  focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-md border-gray-300 rounded-md capitalize">{{ $patient->date_of_birth->format('d-m-Y') }}</p>
                        </div>
                    </div>

                    <div class="space-y-6 sm:space-y-5 mb-4">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label class="block text-md font-medium text-gray-700 sm:mt-px"> Language </label>
                            <p class="my-auto max-w-lg block w-full  focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-md border-gray-300 rounded-md uppercase">{{ $patient->language->value }}</p>
                        </div>
                    </div>

                    <div class="space-y-6 sm:space-y-5 mb-4">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label class="block text-md font-medium text-gray-700 sm:mt-px"> Relation </label>
                            <p class="my-auto max-w-lg block w-full  focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-md border-gray-300 rounded-md capitalize">{{ $patient->relation->value }}</p>
                        </div>
                    </div>

                    <div class="space-y-6 sm:space-y-5 mb-4">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label class="block text-md font-medium text-gray-700 sm:mt-px"> Color </label>
                            <div class="flex flex-row">
                                <p class="my-auto max-w-lg block mr-5 focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-md border-gray-300 rounded-md uppercase">{{ $patient->color }}</p>
                                <span class="w-10 h-10 rounded-full" style="background-color: {{ $patient->color }};"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="mt-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="my-2 mx-4">
                        <div class="flex flex-row justify-between mb-2">
                            <h3 class="text-xl leading-6 font-medium text-gray-900 my-5">Supervisors</h3>
                            <div class="flex flex-row justify-end">
                                <a href="{{ route('patients.patient-users.create', $patient->id) }}" class="my-auto h-10 inline-flex items-center px-3 py-1 border border-transparent text-md font-medium rounded shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add</a>
                            </div>
                        </div>

                        @foreach($supervisors as $supervisor)
                            <div class="space-y-6 sm:space-y-5 mb-4">
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label class="block text-md font-medium text-gray-700 sm:mt-px"> {{ $supervisor->name }} </label>
                                    <p class="my-auto max-w-lg block w-full  focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-md border-gray-300 rounded-md">{{ $supervisor->email }}</p>
                                    <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="flex flex-row-reverse my-auto">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="my-auto h-10 ml-3 inline-flex items-center px-3 py-1 border border-transparent text-md font-medium rounded shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Remove</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
    </div>


</x-app-layout>

