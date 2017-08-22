@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1>Reservation system</h1>
            <h3>Step 1: Select match</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @foreach($matches as $match)
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{route('match', [$match->id])}}">{{$match->name}}  - {{$match->date_of_match}}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
