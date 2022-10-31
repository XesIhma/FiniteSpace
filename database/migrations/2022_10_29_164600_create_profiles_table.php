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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->integer('lvl')->default('1');
            $table->integer('exp')->default('0');
            $table->integer('money')->default('100');
            $table->integer('strength')->default('10');
            $table->integer('agility')->default('10');
            $table->integer('speed')->default('10');
            $table->integer('endurance')->default('10');
            $table->integer('mechanics')->default('10');
            $table->integer('building')->default('10');
            $table->integer('informatics')->default('10');
            $table->integer('navigation')->default('10');
            //$table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('profiles');
    }
};
