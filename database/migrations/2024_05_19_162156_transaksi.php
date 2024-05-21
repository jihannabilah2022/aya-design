<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Pastikan tabel transaksi dibuat terlebih dahulu
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('total_harga', 10, 2);
            $table->string('status')->default('pending');
            $table->timestamps();
        });

        // Buat tabel transaksi_items setelah tabel transaksi
        Schema::create('transaksi_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id')->constrained('transaksi')->onDelete('cascade'); // Pastikan nama tabelnya 'transaksi'
            $table->string('judul');
            $table->text('nama');
            $table->text('deskripsi');
            $table->string('img');
            $table->integer('harga');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi_items');
        Schema::dropIfExists('transaksi');
    }
};
