<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255);
            $table->string('nim', 10);
            $table->string('angkatan', 4);
            $table->string('prodi', 255);
            $table->string('fakultas', 255);
            $table->string('semester', 2);
            $table->string('ipk', 4);
            $table->string('total_sks', 3);
            $table->string('masa_studi', 255);
            $table->string('hp_ortu', 14);
            $table->string('hp_mahasiswa', 14);
            $table->string('email', 255);
            $table->string('status', 255);
            $table->string('evaluasi', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
}
