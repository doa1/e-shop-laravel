<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Gate;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        //we want to make product/categories available for every view
       view()->composer('*',function ( $view)
       {
        $categories =Category::all();
        $view->with('categories',$categories);
       });
       //Alternitvely we could use the View facade to share category data with all the views
       //as View::share('key','value');
       //time to set global permissions
    }
}
