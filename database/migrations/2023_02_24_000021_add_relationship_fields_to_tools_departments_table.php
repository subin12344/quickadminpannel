<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToToolsDepartmentsTable extends Migration
{
    public function up()
    {
        Schema::table('tools_departments', function (Blueprint $table) {
            $table->unsignedBigInteger('degreetype_id')->nullable();
            $table->foreign('degreetype_id', 'degreetype_fk_8075910')->references('id')->on('tools_degree_types');
        });
    }
}
