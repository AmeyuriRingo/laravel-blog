@extends('layouts.app')

@section('content')
    <main role="main" class="container mt-3">
        <div class="row">
            <div class="col-md-11 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    {{$profile->first_name}} {{$profile->last_name}}'s profile
                </h3>
            </div>
            @if(Auth::user()->id == $profile->user_id)
                <div class="col-md-1">
                    <i class="fas hover-ifect fa-edit" data-toggle="modal" data-target="#createModal"
                       style="cursor: pointer"> Edit</i>
                </div>
            @endif
        </div>
        <!-- /.row -->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Edit your profile data</h5>
                        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="profile-form" data-route="{{ route('edit.profile', $profile->id) }}">
                            @csrf
                            <div class="md-form">
                                <input type="text" name="country" class="form-control" id="country"
                                       @if(isset($profile->country)) value="{{$profile->country}}" @endif>
                                <label for="country" id="country_label">Country</label>
                            </div>

                            <div class="md-form">
                                <input type="text" name="city" class="form-control" id="city"
                                       @if(isset($profile->city)) value="{{$profile->city}}" @endif>
                                <label for="city" id="city_label">City</label>
                            </div>

                            <div class="md-form">
                                <input type="date" name="date_of_birth" class="form-control" id="date_of_birth">
                            </div>

                            <div class="form-group">
                                <label for="about_me">About me</label>
                                <textarea class="form-control" name="about_me" id="about_me"
                                          rows="7">@if(isset($profile->about_me)) {{$profile->about_me}} @endif</textarea>
                            </div>

                            <div class="md-form">
                                <button type="submit" id="edit" name="edit" class="btn btn-primary">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="sendImage" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Update profile image</h5>
                        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="md-form" method="POST" enctype="multipart/form-data"
                              action="{{ route('update.image', $profile->id) }}">
                            @csrf
                            <div class="file-field">
                                <div class="btn btn-primary btn-sm float-left file">
                                    <span>Choose file</span>
                                    <input type="file" id="fileInput" name="image">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" id="filename" type="text"
                                           placeholder="Upload your file">
                                </div>
                            </div>
                            <div class="md-form d-flex justify-content-center align-items-center">
                                <button type="submit" id="update" name="update" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3 d-flex justify-content-center align-items-center">
                @if(isset($profile->image))
                    <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4 d-flex">
                        <img class="img-fluid" src="{{asset('/uploads/'.$profile->image)}}" alt="Profile image">
                        @if(Auth::user()->id == $profile->user_id)
                            <a data-toggle="modal" data-target="#sendImage">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        @endif
                    </div>
                @else
                    <div class="view">
                        <img class="img-fluid"
                             src="https://www.pinclipart.com/picdir/big/393-3937255_oic-provincial-statistics-officer-psa-maguindanao-user-icon.png"
                             alt="Profile image">
                        @if(Auth::user()->id == $profile->user_id)
                            <a data-toggle="modal" data-target="#sendImage">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        @endif
                    </div>
                @endif
            </div>

            <div class="col-sm-9 mt-2">
                <div class="row">
                    <div class="profile-info-name">
                        <p class="text-black-50 d-flex ml-3">Location: </p>
                    </div>
                    <div class="profile-info-value">
                        <h4>
                            @if(isset($profile->country)){{ $profile->country }}
                            @if(isset($profile->city)), {{ $profile->city }}
                            @endif
                            @else Country, City
                            @endif
                        </h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="profile-info-name">
                        <p class="text-black-50 d-flex ml-3">Date of birth: </p>
                    </div>
                    <div class="profile-info-value">
                        <h4>
                            @if(isset($profile->date_of_birth)){{date('d F Y', strtotime($profile->date_of_birth))}}
                            @else dd mm yy
                            @endif
                        </h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="profile-info-name">
                        <p class="text-black-50 d-flex ml-3">Registered: </p>
                    </div>
                    <div class="profile-info-value">
                        <h4>{{date('d F Y', strtotime($profile->created_at))}}</h4>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <!-- /.row -->
        @if(isset($profile->about_me))
            <div class="col-12 mt-2">
                <strong class="text-black-50">About me:</strong>
                <h4 class="">

                    {{ $profile->about_me}}

                </h4>
                <hr>
            </div>
        @else
        @endif
    </main><!-- /.container -->
@endsection
