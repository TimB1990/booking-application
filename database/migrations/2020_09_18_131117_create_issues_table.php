<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->morph('issueable');
            $table->string('subject');
            $table->string('description');
            $table->date('issued_at');
            $table->string('handled_by');
            $table->string('assigned_to_department');
            $table->date('in_progress_at');
            $table->string('in_progress_by');
            $table->enum('current_status', ['pending', 'in-progress ', 'fixed','to-review', 'idle']);
            $table-date('handled_at');
            $table->string('handled_by');
            $table->unique(['issuable_type', 'issuable_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issues');
    }
}
