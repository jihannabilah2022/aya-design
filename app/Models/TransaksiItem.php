<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiItem extends Model
{
    use HasFactory;

    protected $table = 'transaksi_items';

    protected $fillable = [
        'transaksi_id',
        'judul',
        'nama',
        'deskripsi',
        'img',
        'harga',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}

