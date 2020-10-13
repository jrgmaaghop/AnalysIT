<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefDiscriminationIndexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_discrimination_index', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->float('from');
            $table->float('to');
            $table->string('interpretation', 80);
            $table->string('action', 25);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ref_discrimination_index');
    }
}
