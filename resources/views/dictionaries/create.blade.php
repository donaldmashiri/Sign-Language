<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="bi bi-briefcase"></i> {{ __('Dictionaries') }}
            <a href="{{route('dictionaries.create')}}"
               class="py-2 px-4 text-white text-sm float-right font-semibold rounded-lg border border-grey-200 bg-blue-700">
                <i class="bi bi-plus"></i>Add Dictionaries
            </a>
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @include('layouts.partials')

                    <form method="POST" action="{{ route('dictionaries.store') }}">
                        @csrf

                        <div class="mt-4 p-1">
                            <x-input-label for="image" :value="__('Image')" />
                            <input type="file" name="image" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="text_description" :value="__('Text Description')" />
                            <input id="text_description" type="hidden" name="text_description">
                            <trix-editor input="text_description"></trix-editor>
                            <x-input-error :messages="$errors->get('text_description')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-primary-button class="ml-4">
                               Add
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    </div>
    </div>
    </div>

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

</x-app-layout>
