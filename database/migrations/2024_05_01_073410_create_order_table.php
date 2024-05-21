<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Menambahkan kolom user_id sebagai foreign key
            $table->string('judul');
            $table->text('nama'); // Menggunakan tipe data text untuk menyimpan banyak nama
            $table->text('deskripsi'); // Menggunakan tipe data text untuk menyimpan banyak deskripsi
            $table->string('img');
            $table->integer('harga');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
