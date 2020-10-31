<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accommodation_id')->contrained();
            $table->foreignId('guest_id')->contrained();
            // $table->foreignId('invoice_id')->constrained();
            $table->unsignedBigInteger('invoice_id');
            // $table->date('check_in');
            // $table->date('check_out');
            $table->integer('adults');
            $table->integer('children');
            $table->integer('babies');
            $table->string('comment')->nullable();
            $table->boolean('online_payment');
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
        Schema::dropIfExists('reservations');
    }
}
