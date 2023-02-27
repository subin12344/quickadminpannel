<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAssignStudentsTable extends Migration
{
    public function up()
    {
        Schema::table('assign_students', function (Blueprint $table) {
            $table->unsignedBigInteger('name_id')->nullable();
            $table->foreign('name_id', 'name_fk_8076340')->references('id')->on('users');
            $table->unsignedBigInteger('master_id')->nullable();
            $table->foreign('master_id', 'master_fk_8076341')->references('id')->on('course_enroll_masters');
            $table->unsignedBigInteger('route_id')->nullable();
            $table->foreign('route_id', 'route_fk_8076342')->references('id')->on('transport_routes');
            $table->unsignedBigInteger('vehicle_name_id')->nullable();
            $table->foreign('vehicle_name_id', 'vehicle_name_fk_8076343')->references('id')->on('createvehicles');
            $table->unsignedBigInteger('stop_name_id')->nullable();
            $table->foreign('stop_name_id', 'stop_name_fk_8076344')->references('id')->on('transport_stops');
            $table->unsignedBigInteger('amount_id')->nullable();
            $table->foreign('amount_id', 'amount_fk_8082436')->references('id')->on('transport_stops');
        });
    }
}
