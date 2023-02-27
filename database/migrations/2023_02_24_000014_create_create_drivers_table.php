<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreateDriversTable extends Migration
{
    public function up()
    {
        Schema::create('create_drivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('licence_no');
            $table->date('expirydate')->nullable();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
