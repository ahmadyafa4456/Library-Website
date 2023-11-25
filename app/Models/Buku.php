<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus';
    protected $fillable = [
        'judul',
        'kode_buku',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'deskripsi',
        'gambar'
    ];

    public function category_buku()
    {
        return $this->belongsToMany(Category::class, 'category_buku', 'buku_id', 'category_id');
    }
}