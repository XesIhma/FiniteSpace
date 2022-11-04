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
            $table->string('size')->default('300');
            $table->string('image')->default('ships/default.jpg');
            $table->integer('status')->default('0');
            $table->integer('hp')->default('100');
            $table->integer('hp_max')->default('100');
            $table->double('deuter', 10, 3)->default('0');
            $table->double('deuter_max', 10, 3)->default('100');
            $table->integer('power')->default('0');
            $table->integer('power_max')->default('100');
            $table->integer('mass')->default('10000');
            $table->integer('weapon_slots')->default('2');
            $table->integer('engine_slots')->default('2');
            $table->integer('armor_slots')->default('10');
            $table->integer('price')->default('20000');
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
