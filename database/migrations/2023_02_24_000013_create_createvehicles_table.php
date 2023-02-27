<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreatevehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('createvehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('vehicle_no')->nullable();
            $table->integer('seats')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
