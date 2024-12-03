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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('pelanggan_id');
            $table->integer('dataservis_id');
            $table->integer('barang_jasa_id');
            $table->integer('qty')->nullable()->default(1);
            $table->timestamps();

            $table->foreign('pelanggan_id')->references('id')->on('datapelanggan')->onDelete('cascade');
            $table->foreign('dataservis_id')->references('id')->on('data_servis')->onDelete('cascade');
            $table->foreign('barang_jasa_id')->references('id')->on('barangdanjasa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
