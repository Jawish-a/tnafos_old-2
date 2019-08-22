<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Uuid;
use Alert;
use Auth;
use Mail;
use App\Mail\NewOrderToVendor;
use App\Mail\NewOrderToClient;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $orders = Order::where('company_id', '=', Auth::user()->company->id)->orderBy('date')->get();
        return view('Order.index', [
            'orders' => $orders
        ]);
    }
    public function inbox()
    {
        //
        $inbox = [];
        $services = [];
        $orders = Order::all();
        foreach ($orders as $order) {
            foreach ($order->services as $service) {
                foreach ($service->companies as $vendor) {
                    if ($vendor->id === Auth::user()->company->id) {
                        $inbox[$order->id] = $order;
                        $services[$service->id] = $service;
                    }
                }
            }
        }

        return view('order.inbox', [
            'inbox' => $inbox,
            'services' => $services,
        ]);
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
        $order = new Order;
        $order->uuid = Uuid::generate();
        $order->date = Carbon::now();
        $order->endDate = $request->endDate;
        $order->comments = $request->comments;
        $order->company_id = Auth::user()->company->id;
        $order->save();
        $order->services()->attach($request->orderServices);

        // send email to the client
        Mail::to(Auth::user()->email)->send(new NewOrderToClient($order));

        // send email to the vendor
        foreach ($order->services as $service) {
            foreach ($service->companies as $vendor) {
                Mail::to($vendor->companyEmail)->send(new NewOrderToVendor($order));
                sleep(3); //use usleep(500000) for half a second or less
            }
        }



        Alert::success('Order has been Sent!');
        return redirect()->route('list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        // show the comany orders
        return view('order.view')->with('order', $order);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function inboxShow($id)
    {
        // show the comany recieved orders
        $order = Order::find($id);
        $services = [];
        foreach ($order->services as $service) {
            foreach ($service->companies as $vendor) {
                if ($vendor->id === Auth::user()->company->id) {
                    $services[$service->id] = $service;
                }
            }
        }
        return view('order.inboxView')->with('order', $order)->with('services', $services);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
