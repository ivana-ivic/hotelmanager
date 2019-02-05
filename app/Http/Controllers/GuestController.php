<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Stay;
use App\Bill;
use Illuminate\Http\Request;
use Session;

class GuestController extends Controller
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
        $guests = Guest::paginate(6);

        return view('guests.index', compact('guests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($stay = null)
    {
        return view('guests.create', compact('stay'));  
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
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'country' => ['required', 'string'],
            'date_of_birth' => ['required', 'date_format:Y-m-d'],
            'identification_doc' => ['required', 'string']
        ]);
        $stay = -1;
        if (request()->has('stay'))
        {
            $stay = request()->stay;
        }
        Guest::create($attrs);

        Session::flash('success', 'Gost ' .$request->first_name. ' ' .$request->last_name. ' je uspešno kreiran!');
        if ($stay > 0)
        {
            return redirect('/stays/$stay/edit');
        }
        elseif ($stay == 0) 
        {
            return redirect('/stays/create');
        }
        else
        {
            return redirect('/guests');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
    {
        return view('guests.show', compact('guest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(Guest $guest)
    {
        return view('guests.edit', compact('guest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guest $guest)
    {
        $guest->first_name = $request->first_name;
        $guest->last_name = $request->last_name;
        $guest->date_of_birth = $request->date_of_birth;
        $guest->country = $request->country;
        $guest->identification_doc = $request->identification_doc;
        $guest->save();

        Session::flash('success', 'Gost ' .$guest->first_name. ' ' .$guest->last_name. ' je uspešno izmenjen!');
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)
    {
        Session::flash('success', 'Gost ' .$guest->first_name. ' ' .$guest->last_name. ' je uspešno obrisan!');
        $stays=Stay::where('guest_id', $guest->id)->get();
        foreach($stays as $stay)
        {
            $bills=Bill::where('stay_id', $stay->id)->get();
            foreach($bills as $bill)
            {
                Bill::destroy($bill->id);
            }
            Stay::destroy($stay->id);
        }
        Guest::destroy($guest->id);
        return redirect()->route('guests.index');
    }
}
