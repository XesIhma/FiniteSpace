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
        Schema::create('ship_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('UAN'); //xx planet yyy producent zz class aaa unique number ex. 01-004-03-00277
            $table->string('description');
            $table->string('image')->default('ships/default.jpg');
            $table->double('size_x', 10, 3)->default('10');
            $table->double('size_y', 10, 3)->default('10');
            $table->double('size_z', 10, 3)->default('30');
            $table->integer('stack_size')->default('1');
            $table->integer('hp_max')->default('1000');
            $table->double('deuter_max', 10, 3)->default('100');
            $table->double('deuter_usage', 10, 3)->default('0');//max
            $table->double('oxygen_usage', 10, 3)->default('0');//max
            $table->double('power_max', 10, 3)->default('5000');
            $table->integer('mass')->default('10000');
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
        Schema::dropIfExists('ship_types');
    }
};
