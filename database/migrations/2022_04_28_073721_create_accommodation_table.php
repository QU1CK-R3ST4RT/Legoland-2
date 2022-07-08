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
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();
            $table->boolean('taken');
            $table->String('name');
            $table->unsignedBigInteger('room_type');
            $table->unsignedBigInteger('user_id');
            $table->string('image');
            $table->string('description');
            $table->timestamps();

            $table->foreign('room_type')->references('id')->on('room_types');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accommodation');
    }
};
