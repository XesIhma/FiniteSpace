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
            $table->integer('status')->default('0');
            $table->integer('hp')->default('100');
            $table->double('deuter', 10, 3)->default('0');
            $table->double('deuter_usage_max', 10, 3)->default('0');
            $table->double('oxygen_usage_max', 10, 3)->default('10');
            $table->integer('power')->default('0');
            $table->integer('price')->nullable();
            $table->integer('last_price')->default('1000');;
            $table->timestamp('bought_at')->nullable();
            $table->foreignId('profile_id')->nullable()->constrained();
            $table->foreignId('clan_id')->nullable()->constrained();
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
        Schema::dropIfExists('ships');
    }
};
