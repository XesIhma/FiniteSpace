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
            $table->string('name');
            $table->string('class');
            $table->string('description');
            $table->string('size')->default('10');
            $table->string('image')->default('weapons/default.jpg');
            $table->integer('status')->default('0');
            $table->integer('hp')->default('50');
            $table->integer('hp_max')->default('50');
            $table->double('deuter_usage', 10, 3)->default('0');
            $table->double('deuter_usage_max', 10, 3)->default('0');
            $table->integer('power')->default('0');
            $table->integer('power_max')->default('150');
            $table->integer('mass')->default('120');
            $table->integer('damage')->default('150');
            $table->string('ammo_type')->nullable();
            $table->integer('ammo')->nullable();
            $table->integer('ammo_max')->nullable();
            $table->string('slot')->default('weapon');
            $table->integer('price')->default('100');
            $table->integer('last_price')->nullable();
            $table->timestamp('bought_at')->nullable();
            $table->foreignId('profile_id')->nullable()->constrained();
            $table->foreignId('ship_id')->nullable()->constrained();
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
