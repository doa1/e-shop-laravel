<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Product;
use App\Order;
use App\Category;
use Auth;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //some quick stats
        $categories =Category::all();//categories have been made global thro' the serviceProvidr class
        $products =Product::count();
        $orders=Order::count();
        if (!Auth::user()) {
            #take to index page
            return Redirect::action('AdminController@loginForm');
        }
        return view('admin.index')->with(['products'=>$products,'orders'=>$orders]);
    }
    //show login form
    public function loginForm()
    {
        # code...
        return view('admin.auth.login');
    }
    //perform Login method
    public function performLogin(Request $request)
    {
        
        $this->validate($request,['email'=>'required|email','password'=>'required']);
        $data  = array('email' =>$request->get('email'),'password'=>$request->get('password'));
        //attempt login
        if (Auth::attempt($data)) {
            # code...
            return redirect('/panel');
        }
        else {
            return back()->withErrors(['errors'=>'Incorrect Login credentials.Please retry']);
        }
    }
    public function  doLogout(){
        Auth::logout();
        return redirect('/');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
