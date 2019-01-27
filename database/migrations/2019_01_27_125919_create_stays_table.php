<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stays', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->datetime('check_in_time');
            $table->datetime('check_out_time');
            $table->string('memo');
            $table->unsignedInteger('reservation_id');
            $table->unsignedInteger('guest_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stays');
    }
}
