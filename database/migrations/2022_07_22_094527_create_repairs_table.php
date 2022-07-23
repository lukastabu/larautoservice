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
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->string('repair', 30);
            $table->unsignedDecimal('price', $precision = 8, $scale = 2);
            $table->unsignedTinyInteger('duration');
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
        Schema::dropIfExists('repairs');
    }
};
