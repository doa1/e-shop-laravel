<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [ 'Hand Bags', 'Shoes', 'Clothes', 'Jewellery', 'Beauty Items' ];
        foreach ($categories as $category) {
            # fetch the category by name first
            $category = DB::table('categories')->where('name','=',trim(strtolower($category)))->get();
            $category_id =$category[0]->id;
            $actual_price =rand(15.5,100.5);
            $discount_factor = (10/100) * $actual_price;//10% of actual price
            $discount_price =$actual_price - $discount_factor;

            DB::table('products')->insert([
                'title' =>'Product for '.$category[0]->name,
                'image' =>'/home/ochieng/WorkSpace/PHP/commerce/golmarket/public/images/1.jpg',
                'category_id'=>$category_id,
                'original_price'=>$actual_price,
                'discount_price'=>$discount_price,
                'in_stock'       => 1,
                'status'=>1,
                'created_at'=>Carbon::now()
            ]);
        }
    }
}
