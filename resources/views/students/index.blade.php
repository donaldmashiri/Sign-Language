<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <h5 style="background-color: saddlebrown" class="card-header text-white"> Students</h5>
                                    <table class="w-full table table-striped">

                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="card">
                                    <h5 style="background-color: rosybrown" class="card-header text-white"> Teachers</h5>
                                    <table class="w-full table table-striped">


                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>
</x-app-layout>
