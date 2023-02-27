<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVehicleAssignsTable extends Migration
{
    public function up()
    {
        Schema::table('vehicle_assigns', function (Blueprint $table) {
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->foreign('driver_id', 'driver_fk_8076192')->references('id')->on('create_drivers');
            $table->unsignedBigInteger('route_id')->nullable();
            $table->foreign('route_id', 'route_fk_8076193')->references('id')->on('transport_routes');
            $table->unsignedBigInteger('vehicle_name_id')->nullable();
            $table->foreign('vehicle_name_id', 'vehicle_name_fk_8082429')->references('id')->on('createvehicles');
        });
    }
}
