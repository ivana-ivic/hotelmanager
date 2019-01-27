<?php

namespace App\Http\Controllers;

use App\Stay;
use Illuminate\Http\Request;

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
        return view('stays.create');    
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
            'check_in_time' => ['required', 'date_format:Y-m-d'],
            'description' => ['string|nullable']
        ]);

        Stay::create($attrs);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stay  $stay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stay $stay)
    {
        //
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
}
