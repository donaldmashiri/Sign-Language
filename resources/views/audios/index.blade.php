<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="bi bi-briefcase"></i> {{ __('Speech To Text') }}
{{--            <a href="{{route('messages.create')}}"--}}
{{--               class="py-2 px-4 text-white text-sm float-right font-semibold rounded-lg border border-grey-200 bg-blue-700">--}}
{{--                <i class="bi bi-plus"></i>Add Speech to Text--}}
{{--            </a>--}}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @include('layouts.partials')

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        @if($users->count()>0)
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-2 py-1">#</th>
                                    <th scope="col" class="px-2 py-1">Names</th>
                                    <th scope="col" class="px-2 py-1">Email</th>
                                    <th scope="col" class="px-2 py-1">User Type</th>
                                    <th scope="col" class="px-2 py-1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-2 py-1">{{$user->id}}</td>
                                        <td class="px-2 py-1">{{$user->name}}</td>
                                        <td class="px-2 py-1">{{$user->email}}</td>
                                        <td class="px-2 py-1">{{$user->user_type}}</td>
                                        <td class="px-2 py-1">
                                            <a href="{{route('audios.show', $user->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Send audio</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        @else
                            <h4 class="p-2 font-semibold text-xl text-white text-center bg-red-600 leading-tight">You Users Available</h4>
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
