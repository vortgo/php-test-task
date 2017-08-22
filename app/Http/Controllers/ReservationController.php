<?php

namespace App\Http\Controllers;

use App\Events\PreReservation;
use App\Events\ReservationPlace;
use App\Http\Requests\ReservationRequest;
use App\Models\Match;
use App\Models\Place;
use App\Models\Reservation;
use App\Models\Sector;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * Main page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $matches = Match::where('date_of_match', '>', Carbon::now())->get();
        return view('index', compact('matches'));
    }

    /**
     * Selected match select sector page
     *
     * @param $matchId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function match($matchId)
    {
        $sectors = \Cache::remember('sectors', 60, function() {
            return Sector::all();
        });
        $freeInMatch = Place::count() - Reservation::whereMatchId($matchId)->count();
        return view('match', compact('sectors', 'matchId', 'freeInMatch'));
    }

    /**
     * Selected sector - select place page
     *
     * @param $matchId
     * @param Sector $sector
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sector($matchId, Sector $sector)
    {
        $sector->load('rRows.rPlaces');
        $reserved = \Cache::remember("reserverd:$matchId:{$sector->id}", 60, function() use($matchId, $sector){
            return Reservation::whereMatchId($matchId)->whereSectorId($sector->id)->get();
        });
        $freeInSector= Place::count() - Reservation::whereMatchId($matchId)->whereSectorId($sector->id)->count();
        return view('sector', compact('matchId', 'sector','reserved','freeInSector'));
    }

    /**
     * Prereservation handle
     *
     * @param $matchId
     * @param $sector
     * @param $row
     * @param $place
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function reservation($matchId, $sector, $row, $place)
    {
        $existReservation = Reservation::whereMatchId($matchId)->wherePlaceId($place)->first();
        if($existReservation){
            flash('Reservation was not carried out')->error();
            return redirect(route('main'));
        }

        $preReservation = Reservation::create([
            'match_id'  => $matchId,
            'sector_id' => $sector,
            'row_id'       => $row,
            'place_id'     => $place,
            'status'    => Reservation::STATUS_IN_PROCESS
        ]);

        \Cache::forget("reserverd:$matchId:$sector");
        event(new PreReservation($preReservation->getCodeOfPlace(), $preReservation->match_id, $preReservation->sector_id));
        return redirect(route('reservation.detail',[$preReservation->id]));
    }

    /**
     * Show form for completing reservation
     *
     * @param Reservation $reservation
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function detailForm(Reservation $reservation)
    {
        if(!$reservation){
            flash('Reservation was not carried out')->error();
            return redirect(route('main'));
        }
        return view('detailForm', compact('reservation'));
    }

    /**
     * Final reservation
     *
     * @param Reservation $reservation
     * @param ReservationRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function finalReservation(Reservation $reservation, ReservationRequest $request)
    {
        if(!$reservation){
            flash('The time of reservation is out!')->error();
            return redirect(route('main'));
        }
        $reservation->fill($request->all());
        $reservation->status = Reservation::STATUS_RESERVED;
        $reservation->save();
        event(new ReservationPlace($reservation->getCodeOfPlace(), $reservation->match_id, $reservation->sector_id));
        flash('Your place was successfully reserved!')->success();
        return redirect(route('main'));
    }
}
