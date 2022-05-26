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
        Schema::create('lessons_teachers', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('id_teacher');
            $table->unsignedBigInteger('id_lesson');
            $table->foreign('id_teacher')->references('id')
                ->on('teachers')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_lesson')->references('id')
                ->on('lessons')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
