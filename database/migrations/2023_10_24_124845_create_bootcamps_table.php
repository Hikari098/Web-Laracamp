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
        Schema::create('bootcamps', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kategori_id');
            $table->integer('mentor_id');
            $table->string('nama');
            $table->string('slug');
            $table->string('harga');
            $table->text('deskripsi');
            $table->string('thumbnail');
            $table->string('kuota')->nullable();
            $table->string('status')->default(1);
            // Status
            // 1 = Tersedia
            // 2 = Penuh/ Tidak Tersedia
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bootcamps');
    }
};
