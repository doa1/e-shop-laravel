<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Freshbitsweb\Laratables\Laratables;
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
        $orders=Product::with('orders')->get();
        //echo($orders);
        return view('admin.orders')->with('orders',$orders);
    }
    public function getOrders()
    {
        //return the datatable resource
        $orders=Product::with('orders')->get();
        //echo(Laratables::recordsOf($orders));
        return response()->json($orders);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('checkout');
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
        $data=$request->get('data');
        //print_r($data);
        $product_ids=[];//will store ids of product ordered
        $quantity_ordered=0;
        $total_amount=0;
        $products=$data['items'];//['items'];
        foreach ($products as $product) {
            $total_amount +=(int)$product['amount'];
            $quantity_ordered +=(int)$product['quantity'];
            array_push($product_ids,$product['item_id']);

        }
        $order =new Order;
        $order->customer_name=$data['customer_name'];
        $order->customer_phone=$data['number'];
        $order->customer_address=$data['address'];
        $order->customer_city=$data['city'];
        $order->customer_address_type=$data['home_address'];
        $order->quantity=$quantity_ordered;
        $order->price=$total_amount;
        $order->save();
        //associate this order with the products related to them
        //$related_products=Product::find($product_ids);
        //I had to rename the pivot table from product_order into order_product:: thanks to tinker for the stackTrace
        $order->products()->attach($product_ids);
        return response()->json(['message'=>'Orders successfully placed....']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
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
