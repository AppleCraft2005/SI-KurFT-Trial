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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->bigIncrements('id_penilaian');
            // $table->unsignedBigInteger('id_rps_detail')->nullable();
            $table->unsignedBigInteger('id_rps');
            $table->string('jenis_penilaian');
            $table->decimal('bobot');

            $table->foreign('id_rps')->references('id_rps')->on('rps')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};
