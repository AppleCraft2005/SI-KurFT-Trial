<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_role_map', function (Blueprint $table) {
            $table->bigIncrements('id_user_role');
            $table->integer('id_role');
            $table->integer('id_user');

            $table->foreign('id_role')->references('id_role')->on('role');
            $table->foreign('id_user')->references('id_user')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_role_map');
    }
};
