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
        Schema::create('weapons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('weapon_type_id')->constrained();
            $table->integer('status')->default('0');
            $table->integer('hp')->default('50');
            $table->integer('power')->default('0');
            $table->integer('ammo')->nullable();
            $table->integer('price')->nullable();
            $table->integer('last_price')->default('1000');
            $table->timestamp('bought_at')->nullable();
            $table->foreignId('ship_type_id')->constrained();
            $table->foreignId('profile_id')->nullable()->constrained();
            $table->foreignId('slot_id')->nullable()->constrained();
            $table->foreignId('cargo_id')->nullable()->constrained();
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
        Schema::dropIfExists('weapons');
    }
};
