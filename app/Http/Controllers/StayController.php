<?php

namespace App\Http\Controllers;

use App\Stay;
use App\Service;
use App\Guest;
use App\Room;
use App\Bill;
use Illuminate\Http\Request;
use DateTime;

class StayController extends Controller
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
        $stays = Stay::all();

        return view('stays.index', compact('stays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        $guests = Guest::all();
        $rooms=Room::where('active', 1)->orderBy('number', 'asc')->get();
        return view('stays.create', compact('services', 'guests', 'rooms'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(request()->all());
        $attrs = request()->validate([
            'check_in_time' => ['date_format:Y-m-d'],
            'memo' => ['string']
        ]);

        $stay = Stay::create($attrs);
        $stay->check_in_time = now();
        $stay->room_id = $request->room;
        $stay->guest_id = $request->guest;
        $stay->save();
        $services = request('services');
        if (isset($services))
        {
            $stay->addServices($services);   
        }

        return redirect('/stays');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stay  $stay
     * @return \Illuminate\Http\Response
     */
    public function show(Stay $stay)
    {
        return view('stays.show', compact('stay'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stay  $stay
     * @return \Illuminate\Http\Response
     */
    public function edit(Stay $stay)
    {
        $services = Service::all();
        $guests = Guest::all();
        $rooms=Room::where('active', 1)->orderBy('number', 'asc')->get();
        return view('stays.edit', compact('stay', 'services', 'guests', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stay  $stay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stay $stay)
    {
        $stay->room_id = $request->room;
        $stay->guest_id = $request->guest;
        $stay->memo = $request->memo;
        $stay->save();
        /*$services = request('services');
        if (isset($services))
        {
            $stay->addServices($services);   
        }*/

        return $this->show($stay);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stay  $stay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stay $stay)
    {
        $bill=Bill::where('stay_id', $stay->id)->get();
        Bill::destroy($bill->id);
        Stay::destroy($stay->id);
        return $this->index();
    }

    public function storeService(Stay $stay)
    {
        $attributes = request()->validate([
            'date' => ['required', 'date'],
            'name' => 'required',
            'price' => ['required', 'integer']
        ]);
        $stay->addService($attributes);
        // Task::create([
        //  'project_id' => $project->id,
        //  'description' => request('description')
        // ]);
        return back();
    }

    public function storeBill(Stay $stay)
    {
        $total = 0;
        // dd($stay->services);
        foreach ($stay->services as $service)
        {
            //dd($service);
            $total += $service->price * $service->pivot->quantity;       
        }

        $datetime1 = new DateTime($stay->reservation->arrival_date);
        $datetime2 = new DateTime($stay->reservation->departure_date);
        $numOfDays = $datetime1->diff($datetime2);

        $total += $stay->room->price * $numOfDays->d;
        $bill = ['amount' => $total];
        $stay->addBill($bill);
        
        return view('bills.show')->with('bill', $stay->bill);
    }

    public function checkOut(Stay $stay)
    {
        $stay->check_out_time = now();
        $stay->save();
        return $this->show($stay);
    }
}
