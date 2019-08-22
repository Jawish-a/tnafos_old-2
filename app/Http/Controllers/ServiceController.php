<?php

namespace App\Http\Controllers;

use App\Service;
use App\Quest;
use Illuminate\Http\Request;
use Alert;
use Session;


class ServiceController extends Controller
{
    public function getAddToQuest(Request $request, $id)
    {
        $service = Service::find($id);
        $oldQuest = Session::has('Quest') ? Session::get('Quest') : null;
        $quest = new Quest($oldQuest);
        $quest->addService($service, $service->id);
        $request->session()->put('Quest', $quest);
        Alert::success('List has been updated!');
        return redirect()->back();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::all();
        return view('service.index')->with('services', $services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('service.create');
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
        $service = new Service;
        $service->serviceName = $request->serviceName;
        $service->serviceDescription = $request->serviceDescription;
        $service->category_id = $request->category_id;
        $service->save();
        Alert::success('Service Has been created!');
        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
        return view('service.view')->with('service', $service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
        return view('service.edit')->with('service', $service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
        $service->serviceName = $request->serviceName;
        $service->serviceDescription = $request->serviceDescription;
        $service->category_id = $request->category_id;
        $service->save();
        Alert::success('Service Has been updated!');
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
        $service->delete();
        Alert::warning('service has been deleted!');
        return redirect()->route('service.index');
    }
}
