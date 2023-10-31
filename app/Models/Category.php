<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    protected $table = 'categories'; // Nama tabel dalam database

    protected $fillable = [
        'nama',

    ];

    // Relasi dengan model Menu
    public function menus()
    {
        return $this->hasMany(Menu::class); // Relasi "Category memiliki banyak Menu"
    }

    // Tambahan metode atau relasi, jika diperlukan
    use HasFactory;
}
