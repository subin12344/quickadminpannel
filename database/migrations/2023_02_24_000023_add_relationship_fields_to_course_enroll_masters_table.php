<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCourseEnrollMastersTable extends Migration
{
    public function up()
    {
        Schema::table('course_enroll_masters', function (Blueprint $table) {
            $table->unsignedBigInteger('degreetype_id')->nullable();
            $table->foreign('degreetype_id', 'degreetype_fk_8075694')->references('id')->on('tools_degree_types');
            $table->unsignedBigInteger('academic_id')->nullable();
            $table->foreign('academic_id', 'academic_fk_8075695')->references('id')->on('academic_years');
            $table->unsignedBigInteger('batch_id')->nullable();
            $table->foreign('batch_id', 'batch_fk_8075699')->references('id')->on('batches');
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id', 'course_fk_8075700')->references('id')->on('tools_courses');
            $table->unsignedBigInteger('section_id')->nullable();
            $table->foreign('section_id', 'section_fk_8075701')->references('id')->on('tools_section_ids');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id', 'department_fk_8076957')->references('id')->on('tools_departments');
        });
    }
}
