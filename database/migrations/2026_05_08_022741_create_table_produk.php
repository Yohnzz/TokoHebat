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
        Schema::create('table_produk', function (Blueprint $table) {
            $table->uuid('id_produk')->primary();
            $table->uuid('id_kategori_produk');
            $table->string('nama_produk');
            $table->string('deskripsi');
            $table->double('harga');
            $table->integer('stok');
            $table->string('foto_url');
            $table->enum('status', ['tersedia', 'habis'])->default('tersedia');
            $table->timestamps();

            $table->foreign('id_kategori_produk')->references('id_kategori_produk')->on('table_kategori_produk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_produk');
    }
};
