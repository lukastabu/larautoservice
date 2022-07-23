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
        Schema::create('mechanics', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->string('photo', 254);
            $table->unsignedDecimal('rating', $precision = 3, $scale = 2);
            $table->unsignedBigInteger('autoservice_id');   
            $table->foreign('autoservice_id')->references('id')->on('autoservices');         
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
        Schema::dropIfExists('mechanics');
    }
};
