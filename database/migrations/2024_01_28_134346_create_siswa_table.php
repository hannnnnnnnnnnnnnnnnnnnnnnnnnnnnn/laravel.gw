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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jurusan_id')->unsigned();
            $table->string('nama', 100);
            $table->integer('nis');
            $table->string('jenis_kelamin');
            $table->timestamps();
        });

        // relasi antara tabel id_jurusan dan id di
        Schema::table('siswa', function (Blueprint $table){
            $table->foreign('jurusan_id')->references('id')->on('jurusan')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};
