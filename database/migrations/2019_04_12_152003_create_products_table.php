<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger( 'category_id' )->unsigned();
            $table->string('title');
            $table ->string('image')->nullable();
            $table->float('original_price');
            $table->float('discount_price');
            $table->tinyInteger('in_stock')->default(1);
            $table->tinyInteger( 'status' )->default( 0 );
            $table->timestamps();
            $table->softDeletes();
       });
        //let's create the fk for categories here
        Schema::table('products',function($table){
            //category_id is a fk referencing the categoy table
            $table->foreign('category_id')->references('id')->on('categories')
                    ->onDelete('cascade')->onUpdate('cascade');//If a category is removed, all of it's products will get removed as well.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
