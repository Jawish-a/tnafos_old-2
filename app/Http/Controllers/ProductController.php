<?php

namespace App\Http\Controllers;

use App\Product;
use App\Quest;
use Illuminate\Http\Request;
use Alert;
use Session;

class ProductController extends Controller
{
    public function getAddToQuest(Request $request, $id)
    {
        $product = Product::find($id);
        $oldQuest = Session::has('Quest') ? Session::get('Quest') : null;
        $quest = new Quest($oldQuest);
        $quest->addProduct($product, $product->id);
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
        $products = Product::all();
        return view('product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('product.create');
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
        if ($request->hasFile('productImage')) {
            # get the file name
            $fileNameWithExt = $request->file('productImage')->getClientOriginalName();
            # get only the file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            # get only the ext
            $extension = $request->file('productImage')->getClientOriginalExtension();
            # file name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('productImage')->storeAs('public/product_images', $fileNameToStore);
        } else {
            # placeholder
            # the link is just to be inside src=''
            $fileNameToStore = 'http://placehold.it/700x400';
        }
        // store the data to the DB
        $product = new Product;
        $product->productName = $request->productName;
        $product->productDescription = $request->productDescription;
        $product->productImage = $fileNameToStore;
        $product->save();
        Alert::success('Product has been Updated!');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('product.view')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('product.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        //check if the request has file and name the file
        if ($request->hasFile('productImage')) {
            # get the file name
            $fileNameWithExt = $request->file('productImage')->getClientOriginalName();
            # get only the file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            # get only the ext
            $extension = $request->file('productImage')->getClientOriginalExtension();
            # file name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('productImage')->storeAs('public/product_images', $fileNameToStore);
        }
        $product = $product;
        $product->productName = $request->productName;
        $product->productDescription = $request->productDescription;
        if ($request->hasFile('productImage')) {
            $product->productImage = $fileNameToStore;

        }

        $product->save();
        Alert::success('Product has been Updated!');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        Alert::warning('product has been deleted!');
        return redirect()->route('product.index');
    }
}
