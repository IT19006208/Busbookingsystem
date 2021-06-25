<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusScheduleBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_schedule_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bus_seate_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('bus_schedule_id')->index();
            $table->string('seat_number');
            $table->string('price');
            $table->string('status');

            $table->foreign('bus_seate_id')->references('id')->on('bus_seates')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('bus_schedule_id')->references('id')->on('bus_schedules')->onDelete('cascade');
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
        Schema::dropIfExists('bus_schedule_bookings');
    }
}
