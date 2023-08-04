<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempatpklsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempatpkls', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jurusan');
            $table->string('kelas');
            $table->string('gender');
            $table->string('instansi');
            $table->enum('nilai',['Belum dinilai', 'Sudah dinilai'])->default('Belum dinilai');
            $table->enum('nilaiinstansi',['Belum dinilai', 'Sudah dinilai'])->default('Belum dinilai');
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
        Schema::dropIfExists('tempatpkl');
    }
}
