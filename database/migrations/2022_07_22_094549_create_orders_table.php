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
            $table->unsignedBigInteger('autoservice_id');   
            $table->foreign('autoservice_id')->references('id')->on('autoservices');         
            $table->unsignedBigInteger('mechanic_id');   
            $table->foreign('mechanic_id')->references('id')->on('mechanics');         
            $table->unsignedBigInteger('repair_id');   
            $table->foreign('repair_id')->references('id')->on('repairs');         
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
