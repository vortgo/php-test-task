@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1>Reservation system</h1>
            <h3>Step 2: Select sector</h3>
            <p>
                Total free places: <span id="{{$matchId}}:freeTotal">{{$freeInMatch}}</span>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @foreach($sectors as $sector)
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{route('sector', [$matchId,$sector->id])}}">Sector - {{$sector->name}}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
