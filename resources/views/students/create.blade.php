@include('layouts.welcomeNav')

<!-- Header Start -->

<!-- Facilities Start -->
<div class="container-fluid pt-5">
    <div class="container pb-3">
      <div class="row">
          <h5 class="card-header">Student Registration</h5>
          <div class="card-body">
              @include('layouts.partials')
              <form method="POST" action="{{ route('students.store') }}">
                  @csrf
                  <input type="hidden" value="student" name="user_type">

                  <div class="row mb-3">
                      <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                      <div class="col-md-6">
                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                          @error('name')
                          <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                      </div>
                  </div>

                  <div class="row mb-3">
                      <label for="date_of_birth" class="col-md-4 col-form-label text-md-end">{{ __('Date Of Birth') }}</label>
                      <div class="col-md-6">
                          <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" required autofocus>
                          @error('date_of_birth')
                          <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                      </div>
                  </div>

                  <div class="row mb-3">
                      <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                      <div class="col-md-6">
                          <select name="gender" class="form-control" id="gender">
                              <option value="">Select Gender</option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                          </select>
                          @error('gender')
                          <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                      </div>
                  </div>

                  <div class="row mb-3">
                      <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                      <div class="col-md-6">
                          <input id="address" type="text" class="form-control" name="address" required autofocus>
                          @error('address')
                          <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                      </div>
                  </div>

                  <div class="row mb-3">
                      <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>
                      <div class="col-md-6">
                          <input id="phone" type="number" class="form-control" name="phone" required autofocus>
                          @error('phone')
                          <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                      </div>
                  </div>

                  <div class="row mb-3">
                      <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                      <div class="col-md-6">
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                          @error('email')
                          <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                      </div>
                  </div>

                  <div class="row mb-3">
                      <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                      <div class="col-md-6">
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                          @error('password')
                          <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                      </div>
                  </div>

                  <div class="row mb-3">
                      <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                      <div class="col-md-6">
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      </div>
                  </div>

                  <div class="row mb-0">
                      <div class="col-md-6 offset-md-4">
                          <button type="submit" class="btn btn-primary">
                              {{ __('Submit') }}
                          </button>
                      </div>
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
