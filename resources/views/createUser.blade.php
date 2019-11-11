@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div
                        class="card-header">@if(isset($user)) {{ __('Edit user') }} @else {{ __('Add user') }} @endif</div>

                    <div class="card-body">
                        @if(isset($user))
                            <form method="POST" id="edit-form" data-route="{{ route('edit.user', $user->id) }}">
                                @csrf
                        @else
                            <form method="POST" id="create-form" data-route="{{ route('create.user') }}">
                                @csrf
                        @endif
                            @csrf
                            <div class="form-group row">
                                <label for="first_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('First name') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name"
                                           @if(isset($user)) value="{{ $user->first_name }}"
                                           @else value="{{ old('first_name') }}" @endif required
                                           autocomplete="first_name" autofocus>

                                    <span id="first_name_error" class="invalid-feedback" role="alert"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name"
                                           @if(isset($user)) value="{{ $user->last_name }}"
                                           @else value="{{ old('last_name') }}" @endif required autocomplete="last_name"
                                           autofocus>

                                    <span id="last_name_error" class="invalid-feedback" role="alert"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           @if(isset($user)) value="{{ $user->email }}" @else value="{{ old('email') }}"
                                           @endif required autocomplete="email" autofocus>

                                    <span id="email_error" class="invalid-feedback" role="alert"></span>
                                </div>
                            </div>
                            @if(!isset($user))
                                <div class="form-group row">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password"
                                               required autocomplete="current-password">

                                        <span id="password_error" class="invalid-feedback" role="alert"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            @endif
                            <div class="form-group row">
                                <label for="rank" class="col-md-4 col-form-label text-md-right">{{ __('Rank') }}</label>

                                <div class="col-md-6">
                                    <input id="rank" class="form-control" name="rank"
                                           @if(isset($user)) value="{{ $user->rank }}" @else value="{{ old('rank') }}"
                                           @endif required autocomplete="email" autofocus>

                                    <span id="rank_error" class="invalid-feedback" role="alert"></span>
                                </div>
                            </div>
                            @if(isset($user))
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" id="edit" name="edit" class="btn btn-primary">
                                            {{ __('Edit user') }}
                                        </button>
                                    </div>
                                </div>
                            @else
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" id="create" name="create" class="btn btn-primary">
                                            {{ __('Add user') }}
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
