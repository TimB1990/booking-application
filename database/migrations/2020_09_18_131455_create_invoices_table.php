<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_id')->contrained();
            // $table->integer('invoice_no');
            $table->date('invoice_date')->nullable();
            $table->date('due_date')->nullable();
            $table->double('subtotal',8,2);
            $table->double('tax_9', 8,2);
            $table->double('tax_21',8,2);
            $table->double('late_fees', 8,2);
            $table->double('total',8,2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
