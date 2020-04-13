@extends('layouts.app')


@section('content')


<div class="container card p-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create New Post') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('addnewpost') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Post Name</label>

                                <div class="col-md-6">
                                    <input id="postname" type="text" class="form-control{{ $errors->has('postname') ? ' is-invalid' : '' }}" name="postname" value="{{ old('postname') }}" required autofocus>

                                    @if ($errors->has('postname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('postname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Post Description</label>

                                    <div class="col-md-6">
                                        <input id="postdescription" type="text" class="form-control{{ $errors->has('postdescription') ? ' is-invalid' : '' }}" name="postdescription" value="{{ old('postdescription') }}" required autofocus>

                                        @if ($errors->has('postdescription'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('postdescription') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>



                            <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Post image</label>

                                    <div class="col-md-6">
                                        <input id="postimage" type="file" class="form-control{{ $errors->has('postimage') ? ' is-invalid' : '' }}" name="postimage"  required autofocus>

                                        @if ($errors->has('postimage'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('postimage') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>




                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                       Create
                                    </button>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
