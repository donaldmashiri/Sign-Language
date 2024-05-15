<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="bi bi-briefcase"></i> {{ __('Messages') }}
            <a href="{{route('messages.create')}}"
               class="py-2 px-4 text-white text-sm float-right font-semibold rounded-lg border border-grey-200 bg-blue-700">
                <i class="bi bi-plus"></i>Message
            </a>
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @include('layouts.partials')

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">


                            <div class="row">
                                    <div class="col-md-4">
                                        <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="{{ asset('images/A.png') }}" alt="">
                                            <div class="flex flex-col justify-between p-4 leading-normal">
                                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">A</h5>
                                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                                            </div>
                                        </a>
                                    </div>
                            </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    </div>
    </div>
    </div>

</x-app-layout>
