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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id'); // Kolom ID Pengguna (User)
            $table->unsignedBigInteger('menu_id'); // Kolom ID Menu
            $table->integer('quantity'); // Kolom Jumlah Barang
            $table->timestamps(); // Kolom Waktu Pembuatan dan Perubahan

            // Menambahkan Kunci Asing (Foreign Keys)
            // $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('menu_id')->references('id')->on('menus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
