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
            $table->string('name');
            $table->string('type');
            $table->string('UAN');
            $table->string('description');
            $table->string('size')->default('20');
            $table->string('image')->default('engines/default.jpg');
            $table->integer('stack_size')->default('5');
            $table->integer('status')->default('0');//0 - offline 1 - online 2 - standby
            $table->integer('hp')->default('100');
            $table->integer('hp_max')->default('100');
            $table->double('deuter_usage', 10, 3)->default('0');
            $table->double('deuter_usage_max', 10, 3)->default('50');
            $table->double('oxygen_usage', 10, 3)->default('0');
            $table->double('oxygen_usage_max', 10, 3)->default('150');
            $table->integer('power')->default('0');
            $table->integer('power_max')->default('100');
            $table->integer('mass')->default('500');
            $table->integer('thrust')->default('0');
            $table->integer('thrust_max')->default('1000');
            $table->string('slot')->default('engine');
            $table->integer('price')->nullable();
            $table->integer('last_price')->default('100');;
            $table->timestamp('bought_at')->nullable();
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
        Schema::dropIfExists('engines');
    }
};
