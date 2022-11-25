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
            $table->string('name');
            $table->string('class');
            $table->string('description');
            $table->string('size')->default('5');
            $table->string('image')->default('armors/default.jpg');
            $table->integer('status')->default('1');
            $table->integer('hp')->default('100');
            $table->integer('hp_max')->default('100');
            $table->integer('resistance')->default('50');
            $table->integer('mass')->default('30');
            $table->string('slot')->default('armor');
            $table->integer('price')->default('0');
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
        Schema::dropIfExists('armors');
    }
};
