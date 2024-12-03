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
        Schema::create('data_servis', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('pelanggan_id');
            $table->integer('teknisi_id');
            $table->integer('jenis_barang_id');
            $table->text('kerusakan');
            $table->string('tipe');
            $table->string('kelengkapan')->nullable();
            $table->string('serial_number')->nullable();
            $table->text('catatan')->nullable();
            $table->string('kasir');
            $table->text('alasan_pembatalan')->nullable();
            $table->enum('status', ['Baru', 'Diproses', 'Selesai', 'Batal', 'Diambil']);
            $table->timestamps();

            $table->foreign('pelanggan_id')->references('id')->on('datapelanggan')->onDelete('cascade');
            $table->foreign('teknisi_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('jenis_barang_id')->references('id')->on('jenisbarang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_servis');
    }
};
