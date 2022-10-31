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
        Schema::create('ships', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('class');
            $table->string('description');
            $table->string('size');
            $table->string('image');
            $table->integer('status')->default('0');
            $table->integer('hp');
            $table->integer('hp_max');
            $table->double('deuter', 10, 3)->default('0');
            $table->double('deuter_max', 10, 3);
            $table->integer('power')->default('0');
            $table->integer('power_max');
            $table->integer('mass');
            $table->integer('weapon_slots');
            $table->integer('engine_slots');
            $table->integer('armor_slots');
            $table->integer('price')->default('0');
            $table->integer('last_price')->nullable();
            $table->timestamp('bought_at')->nullable();
            //$table->foreignId('profile_id')->constrained();
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
        Schema::dropIfExists('ships');
    }
};
