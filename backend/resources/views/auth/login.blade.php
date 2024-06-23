@extends('layouts.app')
@section('content')
    <!-- Sign In Start -->
    {{-- <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">

                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.html" class="">
                            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                        </a>
                        <h3>Sign Inn</h3>
                    </div>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Email address</label>
                            <input type="email" id="floatingInput" placeholder="name@example.com"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="form-floating mb-4">
                            <label for="floatingPassword">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password" id="floatingPassword"
                                placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label"for="remember">{{ __('Remember Me') }}</label>
                            </div>
                            <a href="">Forgot Password</a>
                        </div>
                        
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        <p class="text-center mb-0">Don't have an Account? <a href="">Sign Up</a></p>
                    </form>
                </div>


            </div>
        </div>
    </div> --}}
    <!-- Sign In End -->

     <!-- Sign In Start -->
     <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center bg-white" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.html" class="">
                            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                        </a>
                        <h3>Sign In</h3>
                    </div>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="floatingInput" value="{{old('email')}}" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <a href="">Forgot Password</a>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        <p class="text-center mb-0">Don't have an Account? <a href="{{route('register')}}">Sign Up</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
