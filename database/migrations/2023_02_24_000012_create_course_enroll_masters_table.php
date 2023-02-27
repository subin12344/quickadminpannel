<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseEnrollMastersTable extends Migration
{
    public function up()
    {
        Schema::create('course_enroll_masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('status_at');
            $table->integer('deletes')->nullable();
            $table->string('enroll_number');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
