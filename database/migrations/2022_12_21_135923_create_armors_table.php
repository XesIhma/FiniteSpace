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
            $table->foreignId('armor_type_id')->constrained();
            $table->integer('status')->default('20');
            $table->integer('hp')->default('100');
            $table->integer('mass')->default('30');
            $table->integer('price')->nullable();
            $table->integer('last_price')->default('100');
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
        Schema::dropIfExists('armors');
    }
};
