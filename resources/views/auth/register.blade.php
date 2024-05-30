@include('layouts.welcomeNav')

<!-- Header Start -->

<!-- Facilities Start -->
<div class="container-fluid pt-5">
    <div class="container pb-3">
        <div class="row">
            <h5 class="card-header">Teacher Registration</h5>
            <div class="card-body">
                @include('layouts.partials')
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="hidden" value="teacher" name="user_type">
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Role')" />
                        <select name="user_type" class="form-group form-control mb-3" id="user_type" disabled>
                            <option value="teacher">Teacher</option>
                        </select>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                      type="password"
                                      name="password"
                                      required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                      type="password"
                                      name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-primary-button class="ms-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Facilities Start -->


<!-- Footer Start -->
<div
    class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5"
>
    <div
        class="container-fluid pt-5"
        style="border-top: 1px solid rgba(23, 162, 184, 0.2) ;"
    >
        <p class="m-0 text-center text-white">
            &copy;
            <a class="text-primary font-weight-bold" href="#">Designed by Augustine Madongonda</a>.
            For the purpose to fulfil my Dissertations at Midlands State University

        </p>
    </div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-primary p-3 back-to-top"
><i class="fa fa-angle-double-up"></i
    ></a>

</body>
</html>
