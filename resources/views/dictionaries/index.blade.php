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

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                    @if($dictionaries->count() > 0)
                            <div class="row">
                            @foreach ($dictionaries as $dictionary)
                                    <div class="col-md-4">
                                        <a href="{{route('dictionaries.edit', $dictionary->id)}}" class="flex  m-2 flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <img class="object-cover w-full rounded-t-lg md:h-auto md:w-12 md:rounded-none md:rounded-s-lg" src="{{ Storage::url($dictionary->image) }}" width="40" alt="">
                                            <div class="flex flex-col justify-between p-4 leading-normal">
                                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$dictionary->letter}}</h5>
                                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$dictionary->description}}</p>
                                            </div>
                                        </a>
                                    </div>
                            @endforeach
                            </div>


{{--                            <table class="w-full text-sm text-left text-black-500 dark:text-black-400">--}}
{{--                                <thead class="text-xs text-black-700 uppercase bg-gray-50 dark:bg-white-300 dark:text-black-400">--}}
{{--                                <tr>--}}
{{--                                    <th scope="col" class="px-2 py-2">ID </th>--}}
{{--                                    <th scope="col" class="px-2 py-2">Letter</th>--}}
{{--                                    <th scope="col" class="px-2 py-2">Image</th>--}}
{{--                                    <th scope="col" class="px-2 py-2">Updated On</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach ($dictionaries as $dictionary)--}}
{{--                                    <tr class="bg-white border-b dark:bg-white-400 dark:border-gray-300">--}}
{{--                                        <td class="px-2 py-1">{{$dictionary->id}}</td>--}}
{{--                                        <td class="px-2 py-1">{{$dictionary->letter}}</td>--}}
{{--                                        <td class="px-2 py-1">--}}
{{--                                            <img src="{{ asset($dictionary->image_path) }}" width="70" alt="" srcset="">--}}
{{--                                        </td>--}}
{{--                                        <td class="px-2 py-1">{{$dictionary->updated_at}}</td>--}}
{{--                                    </tr>--}}


{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
                        @else
                            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-300 dark:text-gray-250" role="alert">
                                <span class="font-medium">No Dictionaries Added!</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

    </div>
    </div>
    </div>

</x-app-layout>
