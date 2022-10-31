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
        Schema::create('armors', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('class');
            $table->string('description');
            $table->string('size');
            $table->string('image');
            $table->integer('status')->default('1');
            $table->integer('hp');
            $table->integer('hp_max');
            $table->integer('resistance');
            $table->integer('mass');
            $table->string('slot')->default('armor');
            $table->integer('price')->default('0');
            $table->integer('last_price')->nullable();
            $table->timestamp('bought_at')->nullable();
            //$table->foreignId('profile_id')->constrained();
            //$table->foreignId('ship_id')->constrained();
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
        Schema::dropIfExists('armors');
    }
};
