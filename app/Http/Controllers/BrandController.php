<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Alert;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = Brand::all();
        return view('brand.index')->with('brands', $brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('brand.create');
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
        //check if the request has file and name the file
        if ($request->hasFile('brandLogo')) {
            # get the file name
            $fileNameWithExt = $request->file('brandLogo')->getClientOriginalName();
            # get only the file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            # get only the ext
            $extension = $request->file('brandLogo')->getClientOriginalExtension();
            # file name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('brandLogo')->storeAs('public/brands_logo', $fileNameToStore);
        } else {
            # placeholder
            # the link is just to be inside src=''
            $fileNameToStore = 'http://placehold.it/700x400';
        }
        $brand = new Brand;
        $brand->brandName = $request->brandName;
        $brand->brandDescription = $request->brandDescription;
        $brand->brandLogo = $fileNameToStore;
        $brand->save();
        Alert::success('Brand has been created!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
        return view('brand.edit')->with('brand', $brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
        $brand->brandName = $request->brandName;
        $brand->brandDescription = $request->brandDescription;
        $brand->brandLogo = $request->brandLogo;
        $brand->save();
        Alert::success('Brand has been created!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
