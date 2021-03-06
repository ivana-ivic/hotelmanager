<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Session;

class BillController extends Controller
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
        $bills = Bill::orderBy('created_at', 'desc')->paginate(6);
        return view('bills.index', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return back();
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
            'stay_id' => ['required'],
            'amount' => ['required']
        ]);

        Bill::create($attrs);

        Session::flash('success', 'Račun za boravak ' .$request->stay_id. ' je uspešno kreiran!');
        return redirect('/bills');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        return view('bills.show', compact('bill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        Bill::destroy($bill->id);
        Session::flash('success', 'Račun ' .$bill->id. ' je uspešno obrisan!');
        return redirect()->route('bills.index');
    }



    public function email(Bill $bill)
    {
        $guestmail = $bill->stay->guest->email;
        $subject = 'Hotel bill';
        Mail::to($guestmail)->send(new SendMail($bill, $subject));

        Session::flash('success', 'Račun ' .$bill->id. ' je uspešno poslat na '.$guestmail.'!');
        return $this->show($bill);
    }
}
