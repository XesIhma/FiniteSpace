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
        Schema::create('slot_types', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // kontaktówka, wyrzutnia, generator
            $table->string('type'); //weapon, engine, etc
            $table->integer('numer')->default('1');
            $table->integer('max_power')->default('1000');
            $table->integer('max_hydraulic')->default('10');
            $table->integer('max_hydroogen')->default('100');
            $table->integer('max_deuter')->default('100');
            $table->integer('max_oxygen')->default('100');
            $table->foreignId('ship_type_id')->constrained();
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
        Schema::dropIfExists('slot_types');
    }
};
