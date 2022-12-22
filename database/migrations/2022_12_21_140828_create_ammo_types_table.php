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
        Schema::create('ammo_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->default('ammo/default.jpg');
            $table->integer('stack_size')->default('100');
            $table->integer('damage')->default('1');
            $table->integer('mass')->default('100'); //stack_mass
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
        Schema::dropIfExists('ammo_types');
    }
};
