<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_parent', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('parent_id');
            $table->foreign('student_id')->on('students')->references('id')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('parent_id')->on('parents')->references('id')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
};
