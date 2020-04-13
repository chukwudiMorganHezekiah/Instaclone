

@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">

      <home user="{{auth()->user()->id}}"></home>

     <div class="col-lg-2 card" style="max-height: 550px;">
@if(count($users) >0)
        @foreach($users as $user)

        @if(auth()->user()->isOnline())

        <div class="d-flex mt-3">
            <div class="">
            <img src="storage/profile_images/{{$user->profile->profileimage}}" class="rounded-circle" style="width:20px;heigth:7px;">

            </div>
           <div class="ml-2">
                {{$user->username}}
           </div>
           <div class="ml-1 rounded-circle" style="background-color:green;width:7px;heigth:30px;">

           </div>
        </div>

        @endif

        @endforeach

        @else
        <p>You are not following anyone,yet</p>
@endif

          </div>
</div>

</div>

@endsection
