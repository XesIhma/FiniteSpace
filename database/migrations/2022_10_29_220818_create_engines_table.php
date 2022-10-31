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
        Schema::create('engines', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('class');
            $table->string('description');
            $table->string('size');
            $table->string('image');
            $table->integer('status')->default('0');//0 - offline 1 - online 2 - standby
            $table->integer('hp');
            $table->integer('hp_max');
            $table->double('deuter_usage', 10, 3)->default('0');
            $table->double('deuter_usage_max', 10, 3);
            $table->double('oxygen_usage', 10, 3)->default('0');
            $table->double('oxygen_usage_max', 10, 3);
            $table->integer('power')->default('0');
            $table->integer('power_max');
            $table->integer('mass');
            $table->integer('thrust')->default('0');
            $table->integer('thrust_max');
            $table->string('slot')->default('engine');
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
        Schema::dropIfExists('engines');
    }
};
