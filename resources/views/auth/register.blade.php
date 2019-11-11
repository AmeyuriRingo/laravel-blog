@extends('layouts.app')

@section('content')
<div class="container my-5 py-5 z-depth-1 col-md-7">
    <!--Section: Content-->
    <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">
        <!--Grid row-->
        <div class="row d-flex justify-content-center">
            <!--Grid column-->
            <div class="col-md-11">
                <!-- Default form register -->
                <form class="text-center" method="POST" action="{{ route('register') }}">
                    @csrf
                    <p class="h4 mb-4">Register</p>
                    <div class="form-row mb-4">
                        <div class="col">
                            <!-- First name -->
                            <input type="text" id="first-name" name="first-name" class="form-control @error('first-name') is-invalid @enderror" placeholder="First name"  value="{{ old('first-name') }}" required autocomplete="first-name" autofocus>

                            @error('first-name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="col">
                            <!-- Last name -->
                            <input type="text" id="last-name" name="last-name" class="form-control @error('last-name') is-invalid @enderror" placeholder="Last name"  value="{{ old('last-name') }}" required autocomplete="last-name" autofocus>

                            @error('last-name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <!-- E-mail -->
                    <input type="email" id="email" name="email" class="form-control mb-4 @error('email') is-invalid @enderror" placeholder="E-mail">

                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <!-- Password -->
                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                           aria-describedby="defaultRegisterFormPasswordHelpBlock" required autocomplete="new-password">

                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        At least 6 characters
                    </small>

                    <input type="password" id="confirm-password" name="password_confirmation" class="form-control" placeholder="Confirm password"
                           aria-describedby="defaultRegisterFormPasswordHelpBlock" required autocomplete="new-password">

                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <!-- Register button -->
                    <button class="btn btn-info my-4 btn-block" type="submit">Register</button>
                </form>
                <!-- Default form register -->
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </section>
    <!--Section: Content-->
</div>
@endsection
