<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buku::create([
            "kode_buku" => "978-602-0869-99-5",
            "judul" => "SOSIOLOGI SASTRA",
            "pengarang" => "SAPARDI DJOKO DAMONO",
            "penerbit" => "GRAMEDIA",
            "tahun_terbit" => "2018",
            "gambar" => "public/img/buku/sastra.jpg"
        ]);
    }
}
