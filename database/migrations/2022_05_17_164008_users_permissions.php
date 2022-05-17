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
        Schema::create('users_permissions', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('permission_id')->on('permissions')->references('id')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_permissions');
    }
};
