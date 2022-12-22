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
        Schema::table('weapon_types', function (Blueprint $table) {
            $table->foreignId('ammo_type_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weapon_types', function (Blueprint $table) {
            $table->dropForeign(['ammo_type_id']);
            $table->dropColumn('ammo_type_id');
        });
    }
};
