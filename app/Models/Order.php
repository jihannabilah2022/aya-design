<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['judul', 'nama', 'deskripsi', 'img', 'harga'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
