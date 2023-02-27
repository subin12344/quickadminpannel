<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchesTable extends Migration
{
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('from');
            $table->integer('to');
            $table->date('admission_date');
            $table->date('date_leaving')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
