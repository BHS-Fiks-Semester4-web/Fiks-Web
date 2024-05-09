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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jenis_barang');
            $table->string('nama_barang');
            $table->integer('stok_barang');
            $table->integer('harga_beli_barang');
            $table->integer('harga_sebelum_diskon_barang');
            $table->integer('harga_setelah_diskon_barang');
            $table->date('exp_diskon_barang');
            $table->string('garansi_barang');
            $table->string('deskripsi_barang');
            $table->string('foto_barang');
            $table->foreign('id_jenis_barang')->references('id')->on('jenis_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
