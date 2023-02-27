<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolsSectionIdsTable extends Migration
{
    public function up()
    {
        Schema::create('tools_section_ids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('name');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
