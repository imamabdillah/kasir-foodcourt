<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus'; // Nama tabel dalam database

    protected $fillable = [
        'nama',
        'harga',
        'deskripsi',
        'foto_produk',
    ];

    // Tambahan metode atau relasi, jika diperlukan
    use HasFactory;
}

