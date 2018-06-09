<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackerVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracker_vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tracker_id');
            $table->unsignedInteger('vehicle_id');
            $table->dateTime('install')->nullable();
            $table->dateTime('uninstall')->nullable();
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
        Schema::dropIfExists('tracker_vehicles');
    }
}
