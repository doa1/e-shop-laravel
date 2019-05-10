<?php

use Illuminate\Database\Seeder;
use app\Category;
use Carbon\Carbon;
class CategoryTableSeeder extends Seeder
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
            # code...
            DB::table('categories')->insert(
                [
                    'name'=>trim(strtolower($category)),
                    'status'=>1,
                    'created_at'=>Carbon::now()
                ]
                );
        }
    }
}
