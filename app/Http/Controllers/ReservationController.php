<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index')->with('reservations', $reservations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ovde treba da se nadju sve trenutno slobodne sobe, a ne sve sobe (mada moze i posle da se proverava da li je soba slobodna u odabranom periodu)
        $rooms=Room::all();
        return view('reservations.create')->with('rooms', $rooms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservation = new Reservation;
        $reservation->created_at = now();
        $reservation->updated_at = now();
        $reservation->status = 'V';
        $reservation->date = today();
        $reservation->description = $request->description;
        $reservation->arrival_date = $request->arrival_date;
        $reservation->departure_date = $request->departure_date;
        $reservation->valid_until = $request->valid_until;
        $reservation->room_id = $request->room;

        $user_id = Auth::id();
        $reservation->user_id = $user_id;

        $reservation->save();

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        $reservation = Reservation::find($reservation->id);
        return view('reservations.show')->with('reservation', $reservation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        $rooms=Room::all();
        return view('reservations.edit', ['reservation' => $reservation, 'rooms' => $rooms]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $reservation->updated_at = now();
        $reservation->status = $request->status;
        $reservation->description = $request->description;
        $reservation->arrival_date = $request->arrival_date;
        $reservation->departure_date = $request->departure_date;
        $reservation->valid_until = $request->valid_until;
        $reservation->room_id = $request->room;

        $user_id = Auth::id();
        $reservation->user_id = $user_id;

        $reservation->save();

        return $this->show($reservation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        Reservation::destroy($reservation->id);
        return $this->index();
    }
}
