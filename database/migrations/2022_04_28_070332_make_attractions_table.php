<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
          Schema::create('attractions', function (Blueprint $table) {
            $table->id();
            $table->String('name')->nullable();
            $table->integer('height');
            $table->integer('capacity');
            $table->string('image');
            $table->string('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attractions');
    }
};
