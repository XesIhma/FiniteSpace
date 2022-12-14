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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->default('materials/ore_default.jpg');
            $table->integer('count')->default('1');
            $table->integer('stack_size')->default('100');
            $table->integer('mass')->default('100'); //stack_mass
            $table->integer('price')->nullable();
            $table->integer('last_price')->default('10');
            $table->foreignId('cargo_id')->constrained();
            $table->foreignId('profile_id')->nullable()->constrained();
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
        Schema::dropIfExists('materials');
    }
};
