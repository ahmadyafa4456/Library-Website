<?php

namespace App\Models;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RiwayatPeminjam extends Model
{
    use HasFactory;

    protected $table = 'riwayat_peminjams';
    protected $fillable = [
        'users_id',
        'buku_id',
        'tanggal_pinjam',
        'tanggal_wajib_kembali',
        'tanggal_pengembalian'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id', 'id');
    }
}