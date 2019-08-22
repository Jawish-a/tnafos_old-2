<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use App\Product;
use App\Service;
use Session;
use App\Quest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    // search function
    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::search($query)->get();
        $services = Service::search($query)->get();

        return view('search')->with('products', $products)->with('services', $services)->with('query', $query);
    }

    public function details(Product $product)
    {
        return view('details')->with('product', $product);
    }

    public function list()
    {
        if (!Session::has('Quest')) {
            return view('list', ['products' => null , 'services' => null]);
        }
        $oldQuest = Session::get('Quest');
        $quest = new Quest($oldQuest);

        return view('list')->with('products', $quest->products)->with('services', $quest->services);
    }
}
