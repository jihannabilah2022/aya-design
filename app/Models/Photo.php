<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'image_url', // Kolom yang menyimpan URL gambar
        'description', // Kolom untuk deskripsi foto
        // Tambahkan kolom lain yang diperlukan di sini
    ];

    // Anda bisa menambahkan relasi atau metode lain di sini
}
