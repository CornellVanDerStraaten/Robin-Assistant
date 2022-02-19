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

                    <form method="POST" action="{{ route('patients.store') }}" class="space-y-2">
                        @csrf
                        <div class="space-y-8 divide-y divide-gray-200">
                            <div class="pt-2">
                                <div>
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">Create patient</h3>
                                    <p class="mt-1 text-sm text-gray-500">Tell us about the patient</p>
                                </div>
                                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                                        <div class="mt-1">
                                            <input type="text" name="name" id="name"
                                                   autocomplete="given-name"
                                                   class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="date_of_birth" class="block text-sm font-medium text-gray-700"> Date of birth </label>
                                        <div class="mt-1">
                                            <input type="date" name="date_of_birth" id="date_of_birth"
                                                   autocomplete="date_of_birth"
                                                   class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
                                        <div class="mt-1">
                                            <select id="language" name="language" autocomplete="language-name"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md uppercase">
                                                @foreach(\App\Enums\LanguageEnum::cases() as $case)
                                                    <option value="{{ $case->value }}" @if($case->value == old('language')) selected @endif>{{ $case->value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                                        <div class="mt-1">
                                            <select id="gender" name="gender" autocomplete="gender"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md capitalize">
                                                @foreach(\App\Enums\GenderEnum::cases() as $case)
                                                    <option value="{{ $case->value }}" @if($case->value == old('gender')) selected @endif>{{ $case->value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="relation" class="block text-sm font-medium text-gray-700">Relation</label>
                                        <div class="mt-1">
                                            <select id="relation" name="relation"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md capitalize">
                                                @foreach(\App\Enums\RelationEnum::cases() as $case)
                                                    <option value="{{ $case->value }}" @if($case->value == old('relation')) selected @endif>{{ $case->value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="color" class="block text-sm font-medium text-gray-700"> Color </label>
                                        <div class="mt-1">
                                            <input type="color" name="color" id="color"
                                                   class="shadow-sm w-full h-10 rounded focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>

                                </div>
                                <div class="mt-4">
                                    <x-jet-validation-errors/>
                                </div>
                            </div>
                            <div class="pt-5 pb-3">
                                <div class="flex justify-end">
                                    <a href="{{ route('patients.index') }}"
                                            class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Cancel
                                    </a>
                                    <button type="submit"
                                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
