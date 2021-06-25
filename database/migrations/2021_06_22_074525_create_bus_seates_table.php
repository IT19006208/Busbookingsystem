<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusSeatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_seates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bus_id')->index();
            $table->string('seat_number');
            $table->string('price');

            $table->foreign('bus_id')->references('id')->on('bus')->onDelete('cascade');
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
        Schema::dropIfExists('bus_seates');
    }
}
