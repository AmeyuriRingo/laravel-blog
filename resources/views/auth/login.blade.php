@extends('layouts.app')

@section('content')
    <div class="container my-5 py-5 z-depth-1 col-md-6">
        <!--Section: Content-->
        <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">
            <!--Grid row-->
            <div class="row d-flex justify-content-center">
                <!--Grid column-->
                <div class="col-md-12">
                    <!-- Default form login -->
                    <form class="text-center" method="POST" action="{{ route('login') }}">
                        @csrf
                        <p class="h4 mb-4">Login</p>
                        <!-- Email -->
                        <input type="email" id="email" name="email"
                               class="form-control mb-4 @error('email') is-invalid @enderror" placeholder="E-mail"
                               value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    <!-- Password -->
                        <input type="password" id="password" name="password"
                               class="form-control mb-4 @error('password') is-invalid @enderror" placeholder="Password"
                               required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="d-flex justify-content-around">
                            <div>
                                <!-- Remember me -->
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="custom-control-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div>
                                <!-- Forgot password -->
                                <a href="{{ route('password.request') }}">Forgot password?</a>
                            </div>
                        </div>
                        <!-- Sign in button -->
                        <button class="btn btn-info btn-block my-4" type="submit">{{ __('Login') }}</button>
                        <!-- Register -->
                        <p>Not a member?
                            <a href="/register">Register</a>
                        </p>
                    </form>
                    <!-- Default form login -->
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </section>
        <!--Section: Content-->
    </div>
@endsection
