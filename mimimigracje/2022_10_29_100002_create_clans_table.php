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
        Schema::create('clans', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('tag')->unique();
            $table->foreignId('user_id')->constrained();
            $table->string('inner_text')->nullable();
            $table->string('outer_text')->nullable();
            $table->integer('members_limit')->default('6');
            $table->integer('money')->default('0');
            $table->integer('apply')->default('0');
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
        Schema::dropIfExists('clans');
    }
};
