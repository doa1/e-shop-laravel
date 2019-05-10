<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*$categories=Category::all();
        $products =array();
        foreach ($categories as $category) {
            # code...
            array_push($products,['category'=>$category->name,'products'=>$category->products]);
        }*/
        //eager loading will do just fine
        $products= Category::with('products')->limit(3)->get();
        return view('index')->with('products',$products);
    }

    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }
}
