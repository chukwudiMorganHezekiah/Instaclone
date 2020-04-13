@extends('layouts.app')



@section('content')

<form action="{{ route('storeemail') }}" method="post">


    <div class="form-group">
        <input type="text" class="form-control" placeholder="name" name="name">

        {{$errors->first('name')}}


    </div>
    <div class="form-group">
            <input type="text" class="form-control" placeholder="name" name="email">
            {{$errors->first('email')}}


    </div>
    <div class="form-group">
        <textarea cols="30" rows="3" name="message" class="form-control"></textarea>
        {{$errors->first('message')}}


    </div>
    @csrf
    <div class="form-group">

                <input type="submit" class="form-control btn btn-success" placeholder="name">


    </div>

</form>

@endsection
