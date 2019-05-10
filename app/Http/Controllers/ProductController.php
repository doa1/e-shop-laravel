<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    //show the form for adding products
    public function add_products()
    {   //want to add products to cat
        $categories=Category::all();
        $data =array();
        $data[0]='-----------';
        foreach ($categories as $category) {
           $data[$category->id]=$category->name;
        }
        return view('forms.add_products')->with('cats',$data);
    }

    /**
     * Show the form for creating a new product
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data =Input::all();
        $categoryId=$data['category'];
        $name=$data['title'];
        $quantity =$data['quantity'];
        $discount_price=$data['price'];
        $original_price =(int)$discount_price+(10/100 *(int)$discount_price);
        if($categoryId=='0'){
            $validator['error']="You did not select a category";
            return Redirect::to('/add_product')->withErrors($validator)->withInput();
        }

        $rules =array('image'=>'required','image'=>'image|mimes:jpg,png,gif,jpeg,svg|max:2048');
        $validator =Validator::make($data,$rules);
        if($validator->fails()){
            return Redirect::to('/add_product')->withErrors($validator)->withInput();
        }
        $image=$data['image'];
        $imageName=$image->getClientOriginalName();
        $image->move(public_path().'/uploads/',$imageName);
        //save the file to db n local storage
        //dd($data);
        $product =new Product;
        $product->category_id=$categoryId;
        $product->title=$name;
        $product->quantity=$quantity;
        $product->original_price=$original_price;
        $product->discount_price=$discount_price;
        $product->in_stock=1;
        $product->status=1;
        $product->created_at=Carbon::now();
        $product->image=$imageName;
        $product->save();
        return Redirect::to('/add_product')->with('message',$name.' saved successfuly!');

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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $id)
    {
        //show single product
        $single=Product::where('id','=',$id->id)->get();
        //dd($single);
        return view('product_details',compact('product'))->with('product',$single);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //show the product edit form

        $product=Product::where('id','=',$product->id)->get();
        //get the product categories for the form
        $categories=Category::all();
        $data =array();
        foreach ($categories as $category) {
           $data[$category->id]=$category->name;
        };
        //dd($data);
        return view('forms.edit_product')->with(['product'=>$product,'cats'=>$data]);
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
       $item = Product::findOrFail($product->id);

        $discount_price=$request['price'];
        $original_price =(int)$discount_price+(10/100 *(int)$discount_price);
        $data =Input::all();
        $rules =array('image'=>'image|mimes:jpg,png,gif,jpeg,svg|max:2048');
        $validator =Validator::make($data,$rules);
        if($validator->fails()){
            return Redirect::to('/edit_product/'.$product->id)->withErrors($validator)->withInput();
        }
        $image=$request['image'];
        $imageName=$image->getClientOriginalName();
        $image->move(public_path().'/uploads/',$imageName);

        $item->title=$request['title'];
        $item->quantity=$request['quantity'];
        $item->original_price=$original_price;
        $item->discount_price=$discount_price;
        $item->image=$imageName;
        $item->save();

        return Redirect::to('/product/'.$item->id)->with('message',$item->title.' updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product=Product::findOrFail($product->id);
        $product->delete();
        return Redirect::to('/');
    }
    public function deleteProduct(Product $product)
    {
        # code...
        $product=Product::findOrFail($product->id);
        $product->delete();
        return Redirect::to('/');
    }
}
