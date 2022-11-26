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
        Schema::create('boughts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained();
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('profiles');
            $table->integer('item_id');
            $table->string('category');
            $table->string('name');
            $table->string('image');
            $table->integer('is_taken')->default('0');
            $table->integer('price');
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
        Schema::dropIfExists('boughts');
    }
};
