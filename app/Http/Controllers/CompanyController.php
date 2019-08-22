<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Alert;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies = Company::all();
        return view('company.index')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('company.create');
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
        if ($request->hasFile('companyLogo')) {
            # get the file name
            $fileNameWithExt = $request->file('companyLogo')->getClientOriginalName();
            # get only the file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            # get only the ext
            $extension = $request->file('companyLogo')->getClientOriginalExtension();
            # file name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('companyLogo')->storeAs('public/companies_logos', $fileNameToStore);
        } else {
            # placeholder
            # the link is just to be inside src=''
            $fileNameToStore = 'http://placehold.it/400x400';
        }
        // store the data to the DB
        $company = new Company;
        $company->companyName = $request->companyName;
        $company->companyLogo = $fileNameToStore;
        $company->save();
        $company->products()->attach($request->companyProducts);
        $company->services()->attach($request->companyServices);
        Alert::success('Compnay has been created!');
        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
        return view('company.show')->with('company', $company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
        return view('company.edit')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
        //check if the request has file and name the file
        if ($request->hasFile('companyLogo')) {
            # get the file name
            $fileNameWithExt = $request->file('companyLogo')->getClientOriginalName();
            # get only the file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            # get only the ext
            $extension = $request->file('companyLogo')->getClientOriginalExtension();
            # file name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('companyLogo')->storeAs('public/companies_logos', $fileNameToStore);
        }
        // data to update
        $company->companyName = $request->companyName;
        $company->companyType = $request->companyType;
        $company->companyCR = $request->companyCR;
        $company->companyMainProducts = $request->companyMainProducts;
        $company->companyEstablishmentYear = $request->companyEstablishmentYear;
        $company->companyTotalEmployees = $request->companyTotalEmployees;
        $company->companyBusinessType = $request->companyBusinessType;
        $company->companyBio = $request->companyBio;
        $company->companyTelephone = $request->companyTelephone;
        $company->companyFax = $request->companyFax;
        $company->companyEmail = $request->companyEmail;
        $company->companyWebsite = $request->companyWebsite;
        $company->companyPObox = $request->companyPObox;
        $company->companyCountry = $request->companyCountry;
        $company->companyCity = $request->companyCity;
        $company->companyAddress = $request->companyAddress;
        $company->companyLocation = $request->companyLocation;
        $company->products()->attach($request->companyProducts);
        $company->services()->attach($request->companyServices);

        if ($request->hasFile('companyLogo')){
            $company->companyLogo = $fileNameToStore;
        }
        $company->save();
        Alert::success('Compnay has been updated!');
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
