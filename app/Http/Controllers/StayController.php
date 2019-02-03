<?php

namespace App\Http\Controllers;

use App\Stay;
use App\Service;
use App\Guest;
use App\Room;
use App\Bill;
use Illuminate\Http\Request;
use DateTime;
use Session;

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
        $stays = Stay::orderBy('check_in_time', 'desc')->paginate(6);

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
        $attrs = request()->validate([
            'check_in_time' => ['date_format:Y-m-d'],
            'memo' => ['string']
        ]);

        $stay = Stay::create($attrs);
        $stay->check_in_time = now();
        $stay->room_id = $request->room;
        $stay->guest_id = $request->guest;
        $stay->save();
        $services_list = request('services-list');
        if (isset($services_list))
        {
            $services = json_decode($services_list, true);
            $stay->addServices($services);   
        }

        Session::flash('success', 'Boravak ' .$stay->id. ' je uspešno kreiran!');
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
        //dd($request);
        $stay->room_id = $request->room;
        $stay->guest_id = $request->guest;
        $stay->memo = $request->memo;
        $stay->save();
        $services_list = request('services-list');
        if (isset($services_list))
        {
            $services = json_decode($services_list, true);
            $stay->updateServices($services);   
        }

        Session::flash('success', 'Boravak ' .$stay->id. ' je uspešno izmenjen!');
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
        Session::flash('success', 'Boravak ' .$stay->id. ' je uspešno obrisan!');
        $bill=Bill::where('stay_id', $stay->id)->get();
        if ($bill->isNotEmpty())
        {
            Bill::destroy($bill->id);
        }
        Stay::destroy($stay->id);
        return redirect()->route('stays.index');
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
        Session::flash('success', 'Usluga "' .$request->name. '" je uspešno dodata boravku ' .$stay->id. '!');
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

        // $datetime1 = new DateTime($stay->reservation->arrival_date);
        // $datetime2 = new DateTime($stay->reservation->departure_date);
        $datetime1 = new DateTime($stay->check_in_time);
        $datetime2 = new DateTime($stay->check_out_time);
        $numOfDays = $datetime1->diff($datetime2);

        $total += $stay->room->price * $numOfDays->d;
        $bill = ['amount' => $total];
        $stay->addBill($bill);
        
        Session::flash('success', 'Kreiran je račun za boravak ' .$stay->id. '!');
        return view('bills.show')->with('bill', $stay->bill);
    }

    public function checkOut(Stay $stay)
    {
        $stay->check_out_time = now();
        $stay->save();
        Session::flash('success', 'Gost je uspešno odjavljen!');
        return $this->show($stay);
    }
}
