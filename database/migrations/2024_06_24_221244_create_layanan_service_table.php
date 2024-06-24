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
        Schema::create('layanan_service', function (Blueprint $table) {
            $table->id();
            $table->string('nama_customer');
            $table->string('no_hp_customer');
            $table->string('alamat_customer');
            $table->unsignedBigInteger('id_jenis_service')->nullable();
            $table->enum('status_service', ['pending', 'in_progress', 'completed'])->default('pending');
            $table->integer('total_bayar_service')->nullable();
            $table->enum('status_bayar', ['belum', 'sudah'])->default('belum');
            $table->integer('bayar')->nullable();
            $table->integer('kembalian')->nullable();
            $table->dateTime('tanggal_penerimaan');
            $table->dateTime('tanggal_selesai')->nullable();
            $table->enum('status', ['aktif','tidak'])->default('aktif');

            $table->foreign('id_jenis_service')->references('id')->on('service');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_service');
    }
};
