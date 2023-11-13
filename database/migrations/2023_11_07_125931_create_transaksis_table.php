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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('peserta_id');
            $table->integer('bootcamp_id');
            $table->string('kode_transaksi')->nullable();
            $table->string('nama');
            $table->string('email');
            $table->string('pekerjaan');
            $table->string('rekening');
            $table->string('expired');
            $table->string('cvc');
            $table->string('status')->default(2);
            // Status transaksi
            // 1 = Transaksi Sukses
            // 2 = Menunggu Pembayaran
            // 3 = Transaksi Gagal
            $table->string('total_harga')->nullable();
            $table->string('kode_unik')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
