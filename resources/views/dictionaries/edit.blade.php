<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="bi bi-briefcase"></i> {{ __('Update Dictionary') }}
            <a href="{{route('dictionaries.index')}}"
               class="py-2 px-4 text-white text-sm float-right font-semibold rounded-lg border border-grey-200 bg-blue-700">
                <i class="bi bi-plus"></i>Back
            </a>
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @include('layouts.partials')

                    <form action="{{ route('dictionaries.update', $dictionary->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mt-4 p-1">
                            <x-input-label for="image" :value="__('Change Image')" />
                            <img class="object-cover w-full rounded-t-lg md:h-auto md:w-12 md:rounded-none md:rounded-s-lg" src="{{ Storage::url($dictionary->image) }}" width="40" alt="">
                            <input type="file" name="image" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <div class="mt-4 p-1">
                            <x-input-label for="letter" :value="__('Letter')" />
                            <input type="text" value="{{$dictionary->letter}}" name="letter" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <x-input-error :messages="$errors->get('letter')" class="mt-2" />
                        </div>
                        <div class="mt-4 p-1">
                            <x-input-label for="description" :value="__('Description')" />
                            <input type="text" value="{{$dictionary->description}}" name="description" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-primary-button class="ml-4">
                                Update
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
