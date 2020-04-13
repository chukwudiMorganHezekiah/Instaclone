@extends('layouts.app')

@section('content')


<profilefirstpage user="{{ auth()->user()->id}}"></profilefirstpage>

@endsection
