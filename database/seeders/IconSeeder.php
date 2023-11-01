<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class IconSeeder extends Seeder
{
    public function run()
    {
        $iconDirectory = storage_path('app/public/media/svg/food-icons'); // Lokasi direktori ikon Anda

        // Ambil semua file SVG dalam direktori
        $iconFiles = File::files($iconDirectory);

        foreach ($iconFiles as $iconFile) {
            $iconName = pathinfo($iconFile, PATHINFO_FILENAME); // Ambil nama file tanpa ekstensi

            // Simpan nama ikon ke dalam tabel 'icons'
            DB::table('categories')->insert([
                'nama' => 'Makanan',
                'icon' => 'spaghetti.svg',
            ]);
            DB::table('categories')->insert([
                'nama' => 'Minuman',
                'icon' => 'coffee.svg',
            ]);
        }
    }
}
