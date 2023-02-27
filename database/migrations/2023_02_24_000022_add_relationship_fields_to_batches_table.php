<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBatchesTable extends Migration
{
    public function up()
    {
        Schema::table('batches', function (Blueprint $table) {
            $table->unsignedBigInteger('syllabus_year_id')->nullable();
            $table->foreign('syllabus_year_id', 'syllabus_year_fk_8075683')->references('id')->on('toolssyllabus_years');
            $table->unsignedBigInteger('academic_year_id')->nullable();
            $table->foreign('academic_year_id', 'academic_year_fk_8075687')->references('id')->on('academic_years');
        });
    }
}
