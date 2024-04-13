<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\RiwayatPeminjam;
use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RiwayatPinjam extends Controller
{
    public function index()
    {
        $user = Auth::id();
        $peminjam = RiwayatPeminjam::all();
        $pinjamanUser = RiwayatPeminjam::where('users_id', $user)->get();
        return view('dashboard.peminjam.index', compact(['peminjam', 'pinjamanUser']));
    }

    public function tambah()
    {
        $user = User::all();
        $buku = Buku::where('status', 'In Stock')->get();
        $peminjam = $user;
        return view('dashboard.peminjam.tambah', compact(['user', 'buku', 'peminjam']));
    }

    public function store(Request $request)
    {
        $update = $request->validate([
            'users_id' => 'required',
            'buku_id' => 'required'
        ]);

        $update['tanggal_pinjam'] = Carbon::now()->toDateString();
        $update['tanggal_wajib_kembali'] = Carbon::now()->addDay(7)->toDateString();

        $buku = Buku::findOrFail($update['buku_id'])->only('status');
        $count = RiwayatPeminjam::where('users_id', $update['users_id'])->where('tanggal_pengembalian', null)->count();

        if ($count >= 3) {
            return redirect('/pinjam/create');
        } else {
            try {
                DB::beginTransaction();
                RiwayatPeminjam::create($update);
                $buku = Buku::findOrFail($update['buku_id']);
                $buku->status = 'dipinjam';
                $buku->update();
                DB::commit();

                return redirect('/pinjam');
            } catch (\Throwable $th) {
                DB::rollBack();
            }
        }
    }

    public function back()
    {
        $auth = Auth::user()->id;
        $user = User::all();
        $buku = Buku::where('status', 'dipinjam')->get();
        $pinjamanUser = RiwayatPeminjam::where('users_id', $auth)->where('buku_id', $buku);
        return view('dashboard.peminjam.pengembalian', compact(['user', 'buku', 'pinjamanUser']));
    }

    public function kembalikan(Request $request)
    {
        $request->validate([
            'users_id' => 'required',
            'buku_id' => 'required',
        ]);

        $pinjaman = RiwayatPeminjam::where('users_id', $request->users_id)->where('buku_id', $request->buku_id)->where('tanggal_pengembalian', null);
        $dataPinjaman = $pinjaman->first();
        $count = $pinjaman->count();

        if ($count == 1) {
            try {
                DB::beginTransaction();
                $dataPinjaman->tanggal_pengembalian = Carbon::now()->toDateString();
                $dataPinjaman->save();
                $buku = Buku::findOrFail($request->buku_id);
                $buku->status = 'In Stock';
                $buku->save();
                DB::commit();
                return redirect('/pinjam');
            } catch (\Throwable $th) {
                DB::rollback();
            }
        } else {
            return redirect('/pinjam/balik');
        }
    }
}