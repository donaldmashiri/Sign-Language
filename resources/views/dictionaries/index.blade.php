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
                            <table class="w-full text-sm text-left text-black-500 dark:text-black-400">
                                <thead class="text-xs text-black-700 uppercase bg-gray-50 dark:bg-white-300 dark:text-black-400">
                                <tr>
                                    <th scope="col" class="px-2 py-2">ID  </th>
                                    <th scope="col" class="px-2 py-2">Name</th>
                                    <th scope="col" class="px-2 py-2">Post Count</th>
                                    <th scope="col" class="px-2 py-2"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($dictionaries as $dictionary)
                                    <tr class="bg-white border-b dark:bg-white-400 dark:border-gray-300">
                                        <td class="px-2 py-1">{{$dictionary->id}}</td>
                                        <td class="px-2 py-1">{{$dictionary->name}}</td>
                                        <td class="px-2 py-1">{{$dictionary->text}}</td>
                                    </tr>

                                    @include('layouts.modal')

                                @endforeach
                                </tbody>
                            </table>
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
