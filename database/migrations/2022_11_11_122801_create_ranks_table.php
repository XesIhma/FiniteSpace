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
        Schema::create('ranks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clan_id')->constrained();
            $table->string('name');
            $table->integer('accept_applications')->default('0');
            $table->integer('send_invitations')->default('0');
            $table->integer('remove_users')->default('0');
            $table->integer('change_rank')->default('0');
            $table->integer('modify_text')->default('0');
            $table->integer('forum_moderator')->default('0');
            $table->integer('base_expansion')->default('0');
            $table->integer('fleet_construction')->default('0');
            $table->integer('refueling')->default('1');
            $table->integer('repair')->default('1');
            $table->integer('using_factories')->default('1');
            $table->integer('talker')->default('1');
            $table->integer('default_rank')->default('0');
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
        Schema::dropIfExists('ranks');
    }
};
