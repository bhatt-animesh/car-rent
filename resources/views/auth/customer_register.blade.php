@extends('theme.app')

@section('content')
<!-- Sign up form -->
<div class="container h-100">
  <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-lg-12 col-xl-11">
      <div class="card text-black" style="border-radius: 25px;">
        <div class="card-body p-md-5">
          <div class="row justify-content-center">
            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
              <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Customer Sign Up</p>
              @error('name')
                <div class="alert alert-danger"><strong>{{ $message }}</strong></div>
              @enderror
              @error('email')
                <div class="alert alert-danger"><strong>{{ $message }}</strong></div>
              @enderror
              @error('password')
                <div class="alert alert-danger"><strong>{{ $message }}</strong></div>
              @enderror
              <form class="mx-1 mx-md-4" method="POST" action="{{URL::to('register') }}">
                  @csrf
                  <input type="hidden" id="role_id" name="role_id" value="2">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" id="name" name="name"  value="{{ old('name') }}"  required/>
                      <label class="form-label" for="name">Your Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required/>
                      <label class="form-label" for="form3Example3c">Your Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" class="form-control" id="password" name="password" required/>
                      <label class="form-label" for="form3Example4c">Password</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required/>
                      <label class="form-label" for="form3Example4cd">Repeat your password</label>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Register</button>
                  </div>

              </form>
            </div>
            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
              <img src="{{ asset('images/car.png') }}" class="img-fluid" alt="car">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
