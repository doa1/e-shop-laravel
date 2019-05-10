<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity');
            $table->double('price')->nullable();
            $table->string('customer_name');
            $table ->string('customer_phone');
            $table->string('customer_email')->nullable();
            $table->string('customer_city')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('customer_address_type')->nullable();
            $table->softDeletes();
            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
