@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1>Reservation system</h1>
            <h3>Step 3: Select place</h3>
            <p>
                Free places in sector: <span id="{{$matchId}}:{{$sector->id}}:freeInSector">{{$freeInSector}}</span>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered">
                <tbody>
                @foreach($sector->rRows as $row)
                    <tr>
                        @foreach($row->rPlaces as $place)
                            @php ($booked = $reserved->where('place_id',$place->id)->first())
                            <td id="{{$matchId .':'. $sector->id .':'. $row->id .':'. $place->id}}"
                                @if(isset($booked->status) && $booked->status == \App\Models\Reservation::STATUS_RESERVED)
                                class="green"
                                @elseif(isset($booked->status) && $booked->status == \App\Models\Reservation::STATUS_IN_PROCESS)
                                class="blue"
                                @endif
                            >
                                <a href="{{route('reservation.in_process',[$matchId, $sector->id, $row->id, $place->id])}}">
                                    {{$sector->name . $row->name . $place->name}}
                                </a>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
