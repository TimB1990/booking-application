<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservableAssetReservableCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservable_asset_reservable_category', function (Blueprint $table) {
            $table->integer('reservable_asset_id')->unsigned()->index();
            $table->foreign('reservable_categories_id')->references('id')->on('reservable_categories')->onDelete('cascade');
            $table->integer('reservable_asset_id')->unsigned()->index();
            $table->foreign('reservable_asset_id')->references('id')->on('roles')->onDelete('cascade');
            $table->primary(['reservable_asset_id', 'reservable_category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservable_asset_reservable_category');
    }
}
