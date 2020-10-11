<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accommodation_id')->constrained();
            // $table->integer('room_nr');
            $table->string('alias')->nullable();
            $table->integer('max_seats');
            $table->double('area_m2', 4, 1);
            $table->enum('status', ['free','taken','unavailable']);
            $table->double('price_per_m2', 5,2);
            $table->double('price_per_dp', 5,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meeting_rooms');
    }
}
