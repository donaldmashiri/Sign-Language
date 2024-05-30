<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th><i class="bi bi-person-circle"></i> Full Names</th>
                        <td>{{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-envelope"></i> Email</th>
                        <td>{{ Auth::user()->email }}</td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-briefcase"></i> User type</th>
                        <td>{{ Auth::user()->user_type }}</td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-calendar-date"></i> Account Created</th>
                        <td>{{ Auth::user()->created_at }}</td>
                    </tr>
                    @if(Auth::user()->user_type == "student")
                        <tr>
                            <th><i class="bi bi-calendar"></i> Date of Birth</th>
                            <td>{{ Auth::user()->date_of_birth }}</td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-gender-ambiguous"></i> Gender</th>
                            <td>{{ Auth::user()->gender }}</td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-phone"></i> Phone</th>
                            <td>{{ Auth::user()->phone }}</td>
                        </tr>
                    @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
