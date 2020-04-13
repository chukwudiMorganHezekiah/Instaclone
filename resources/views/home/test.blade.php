

@extends('layouts.app')

@section('content')


@foreach($all as $single)
<div class="text-align-center">
<div>{{$single->postname}}<follow postid="{{$single->user_id}}"></follow></div>
</div>
@endforeach


@endsection
