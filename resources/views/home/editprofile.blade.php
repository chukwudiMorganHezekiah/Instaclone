@extends('layouts.app')


@section('content')


<div class="container card p-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Profile') }}</div>

                    <div class="card-body">
                            @foreach($profile as $profiles)

                            <form method="POST" action="{{ route('editprofile') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Username</label>

                                    <div class="col-md-6">
                                        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $profiles->user->username ?? old('username') }}" required autofocus>

                                        @if ($errors->has('username'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">Stage Name</label>

                                        <div class="col-md-6">
                                            <input id="stagename" type="text" class="form-control{{ $errors->has('stagename') ? ' is-invalid' : '' }}" name="stagename" value="{{ $profiles->stagename ?? old('stagename') }}" required autofocus>

                                            @if ($errors->has('stagename'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('stagename') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>




                                <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">About You</label>

                                        <div class="col-md-6">
                                            <input id="aboutyou" type="text" class="form-control{{ $errors->has('aboutyou') ? ' is-invalid' : '' }}" name="aboutyou" value="{{ $profiles->abouuser ?? old('aboutyou') }}" required autofocus>

                                            @if ($errors->has('aboutyou'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('aboutyou') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>


                                <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">Profile Link</label>

                                        <div class="col-md-6">
                                            <input id="profilelink" type="text" class="form-control{{ $errors->has('profilelink') ? ' is-invalid' : '' }}" name="profilelink" value="{{ $profiles->profilelink	 ?? old('profilelink') }}" required autofocus>

                                            @if ($errors->has('profilelink'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('profilelink') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>



                                <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">Profile image</label>

                                        <div class="col-md-6">
                                            <input id="profileimage" type="file" class="form-control{{ $errors->has('profileimage') ? ' is-invalid' : '' }}" name="profileimage"  >

                                            @if ($errors->has('profileimage'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('profileimage') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>




                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                           Edit
                                        </button>


                                </div>
                            </form>






                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
