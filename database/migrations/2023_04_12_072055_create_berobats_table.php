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
        Schema::create('berobats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pasien')->constrained('dokters')->onDelete('cascade');
            $table->foreignId('id_dokter')->constrained('pasiens')->onDelete('cascade');
            $table->string('keluhan');
            $table->string('diagnosa');
            $table->string('obat');
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
        Schema::dropIfExists('berobats');
    }
};
