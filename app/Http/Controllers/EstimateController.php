<?php

namespace App\Http\Controllers;

use App\Estimate;
use Illuminate\Http\Request;
use Uuid;
use Illuminate\Support\Carbon;
use Auth;
use Alert;

class EstimateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $estimates = Estimate::where('client_id', '=', Auth::user()->company->id)->where('status', '=', 'ready')->get();
        #$estimates = Estimate::all();
        return view('estimate.index')->with('estimates', $estimates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $estimate = new Estimate;
        $estimate->number = $request->number;
        $estimate->uuid = Uuid::generate();
        $estimate->date = Carbon::now();
        $estimate->expiryDate = $request->expiryDate;
        $estimate->status = $request->status;
        $estimate->notes = $request->notes;
        $estimate->terms = $request->terms;
        $estimate->order_id = $request->order_id;
        $estimate->company_id = Auth::user()->company->id;
        $estimate->client_id = $request->client;
        $estimate->user_id = Auth::user()->id;
        $estimate->save();
        for ($i=0; $i < count($request->services); $i++) {
            $service = $request->services[$i];
            $estimate->services()->attach($service,[
                'unitPrice' => $request->unitPrice[$i],
                'total' => $request->unitPrice[$i],

            ]);

        }

        #$estimate->services()->attach($request->input('services'))->withPivot(['unitPrice' => $request->input('unitPrice')]);
        Alert::success('Estimate has been Created!');
        return redirect()->route('admin');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function show(Estimate $estimate)
    {
        //
        return view('estimate.view')->with('estimate', $estimate);
    }

    public function print($id)
    {
        //
        $estimate = Estimate::find($id);
        return view('estimate.print')->with('estimate', $estimate);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function edit(Estimate $estimate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estimate $estimate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estimate $estimate)
    {
        //
    }
}
