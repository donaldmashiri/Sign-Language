<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="bi bi-briefcase"></i> {{ __('Create Message') }}
            <a href="{{route('messages.index')}}"
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

                    <form method="POST" action="{{ route('dictionaries.store') }}">
                        @csrf
{{--                        <div class="mt-4 p-1">--}}
{{--                            <x-input-label for="letter" :value="__('Input Text')" />--}}
{{--                            <input type="text" name="letter" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">--}}
{{--                            <x-input-error :messages="$errors->get('letter')" class="mt-2" />--}}
{{--                        </div>--}}


                        <div class="mt-4 p-1">
                            <x-input-label for="image" :value="__('Output')" />
                            <div class="flex">
                                <a href=""><img  src="{{asset('images/H.png')}}" width="40" alt=""></a>
                                <a href=""><img  src="{{asset('images/I.png')}}" width="40" alt=""></a>
                                <a href=""><img  src="{{asset('images/E.png')}}" width="40" alt=""></a>
                            </div>

                            <h4>Hie</h4>

                        </div>






                        <div class="mt-4 p-1">
                            <x-input-label for="letter" :value="__('Speech/Audio')" />
                            <input type="file" name="letter" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <x-input-error :messages="$errors->get('letter')" class="mt-2" />
                        </div>

                        <audio src="audio_file.mp3" controls>
                        </audio>

                        <div class="flex items-center justify-end mt-4">

                            <x-primary-button class="ml-4">
                               Send
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
