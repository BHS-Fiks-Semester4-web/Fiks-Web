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
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->id();
            // $table->string('nama_barang');
            // $table->integer('stok_barang');
            // $table->integer('harga_beli_barang');
            // $table->integer('harga_sebelum_diskon_barang');
            // $table->integer('harga_setelah_diskon_barang')->nullable();
            // $table->string('deskripsi_barang');
            // $table->binary('foto_barang')->nullable();
            // $table->enum('status', ['aktif','tidak'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluaran');
    }
};
