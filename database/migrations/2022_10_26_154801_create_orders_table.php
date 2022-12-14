<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('name');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->string('amount');
            $table->string('transaction_id');
            $table->string('currency');
            $table->string('phone_number');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('postalcode');
            $table->tinyInteger('status')->default('0');
            $table->string('msg')->nullable();
            $table->string('traking_num');
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
};
