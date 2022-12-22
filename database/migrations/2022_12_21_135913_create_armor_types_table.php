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
        Schema::create('armor_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('UAN');
            $table->string('description');
            $table->string('image')->default('armors/default.jpg');
            $table->double('size_x', 10, 3)->default('10');
            $table->double('size_y', 10, 3)->default('10');
            $table->double('size_z', 10, 3)->default('30');
            $table->integer('stack_size')->default('5');
            $table->integer('hp_max')->default('100');
            $table->integer('mass')->default('100');
            $table->integer('resistance')->default('50');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('armor_types');
    }
};
