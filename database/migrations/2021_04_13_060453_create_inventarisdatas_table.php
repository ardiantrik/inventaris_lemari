<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarisdatas', function (Blueprint $table) {
            $table->id('inventaris_id');
            $table->string('nip')->unique();
            $table->string('nama');
            $table->string('golongan');
            $table->string('kabupaten')->nullable();
            $table->string('tempat_tugas')->nullable();
            $table->string('kode_label');
            $table->string('lemari');
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
        Schema::dropIfExists('inventarisdatas');
    }
}
