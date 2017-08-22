@extends('layout')

@section('content')
    @if(isset($errors) && (count($errors) > 0))
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1>Reservation system</h1>
            <h3>Step 4: fill the details</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label for="first_name">Password:</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" value="{{old('first_name')}}">
                </div>
                <div class="form-group">
                    <label for="last_name">Password:</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" value="{{old('last_name')}}">
                </div>
                <button type="submit" class="btn btn-default">Save</button>
            </form>
        </div>
    </div>
@endsection
