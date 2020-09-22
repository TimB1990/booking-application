<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serviceables', function (Blueprint $table) {
            $table->bigIncrements('service_id')->constrained()->onDelete('cascade');
            $table->morphs('serviceable');
        });
    }

    public function down()
    {
        Schema::dropIfExists('serviceables');
    }
}
