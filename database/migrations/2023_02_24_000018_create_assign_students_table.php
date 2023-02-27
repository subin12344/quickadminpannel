<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('assign_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fromdate');
            $table->date('todate');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
