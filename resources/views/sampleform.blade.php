

@extends ("layouts.app")

@section('content')


<form action="/testformsubmit" method="post" class="form-horizontal">


    <div class="form-group">
        @csrf

        <input type="text" class="form-control" name="name" value="{{ old('name') }}">

       {{$errors->first('name')}}


    </div>

    <div class="form-group">

    <input type="text" class="form-control" name="email" value="{{ old('email') }}">

    {{$errors->first('email')}}
        </div>
        <div class="form-group">

                <input type="submit" class="btn btn-primary">


        </div>

</form>

@endsection
