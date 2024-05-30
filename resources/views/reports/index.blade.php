<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reports') }}
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
                                    <h5 style="background-color: saddlebrown" class="card-header text-white"> Users Reports</h5>
                                    <table class="w-full table table-striped">
                                        <thead>
                                        <tr class="bg-gray-100">
                                            <th class="py-3 px-4 text-left">Description</th>
                                            <th class="py-3 px-4 text-left">Count</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="border-t text-sm">
                                            <td class="py-3 px-4"><i class="bi bi-people text-info"></i> Users Total</td>
                                            <td class="py-3 px-4">{{$usersCount}}</td>
                                        </tr>
                                        <tr class="border-t text-sm">
                                            <td class="py-3 px-4"><i class="bi bi-mortarboard text-danger"></i> Teachers</td>
                                            <td class="py-3 px-4">{{ $usersTCount }}</td>
                                        </tr>
                                        <tr class="border-t text-sm">
                                            <td class="py-3 px-4"><i class="bi bi-mortarboard-fill text-warning"></i> Students</td>
                                            <td class="py-3 px-4">{{ $usersSCount }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="card">
                                    <h5 style="background-color: rosybrown" class="card-header text-white"> Dictionaries</h5>
                                    <table class="w-full table table-striped">
                                        <thead>
                                        <tr class="bg-gray-100">
                                            <th class="py-3 px-4 text-left">Description</th>
                                            <th class="py-3 px-4 text-left">Count</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="border-t text-sm">
                                            <td class="py-3 px-4"><i class="bi bi-graph-up text-primary"></i> Usage</td>
                                            <td class="py-3 px-4">60%</td>
                                        </tr>
                                        <tr class="border-t text-sm">
                                            <td class="py-3 px-4"><i class="bi bi-graph-down text-danger"></i> Not Used</td>
                                            <td class="py-3 px-4">40%</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="card">
                                    <h5 style="background-color: sandybrown" class="card-header text-white"> Functionalities</h5>
                                    <table class="w-full table table-striped">
                                        <thead>
                                        <tr class="bg-gray-100">
                                            <th class="py-3 px-4 text-left">Description</th>
                                            <th class="py-3 px-4 text-left">Count</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="border-t text-sm">
                                            <td class="py-3 px-4"><i class="bi bi-chat-dots text-primary"></i> Messages</td>
                                            <td class="py-3 px-4">{{ $messages }}</td>
                                        </tr>
                                        <tr class="border-t text-sm">
                                            <td class="py-3 px-4"><i class="bi bi-megaphone text-danger"></i> Speech</td>
                                            <td class="py-3 px-4">{{ $speeches }}</td>
                                        </tr>
                                        </tbody>
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
