<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTransportStopsTable extends Migration
{
    public function up()
    {
        Schema::table('transport_stops', function (Blueprint $table) {
            $table->unsignedBigInteger('route_name_id')->nullable();
            $table->foreign('route_name_id', 'route_name_fk_8076265')->references('id')->on('transport_routes');
        });
    }
}
