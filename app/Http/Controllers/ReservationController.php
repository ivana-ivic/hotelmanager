<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Room;
use App\Stay;
use App\Guest;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

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
        $reservations = Reservation::orderBy('arrival_date', 'desc')->paginate(6);
        return view('reservations.index')->with('reservations', $reservations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms=Room::where('active', 1)->orderBy('number', 'asc')->get();
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

        Session::flash('success', 'Rezervacija ' .$reservation->id. ' je uspešno kreirana!');
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
        //$reservation = Reservation::find($reservation->id);
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
        $rooms=Room::where('active', 1)->orderBy('number', 'asc')->get();
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

        Session::flash('success', 'Rezervacija ' .$reservation->id. ' je uspešno izmenjena!');
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
        Session::flash('success', 'Rezervacija ' .$reservation->id. ' je uspešno obrisana!');
        Reservation::destroy($reservation->id);
        return redirect()->route('reservations.index');
    }

    public function storeStay(Reservation $reservation)
    {
        $stay = Stay::create([
            'memo' => $reservation->description,
            'room_id' => $reservation->room->id,
            'check_in_time' => now()
        ]);
        $reservation->stay()->save($stay);
        $services = Service::all();
        $guests = Guest::all();
        $rooms=Room::where('active', 1)->orderBy('number', 'asc')->get();
        return view('stays.edit', compact('stay', 'services', 'guests', 'rooms'));
    }
}
