<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Category;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Category::all();
        return view('dashboard.kategori.index', compact('kategori'));
    }

    public function tambah()
    {
        return view('dashboard.kategori.tambah');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|max:25'
        ]);

        $validate['nama'] = strip_tags($request->nama);
        Category::create($validate);
        $request->session()->flash('tambahkategori');
        return redirect('/kategori');
    }

    public function destroy($id)
    {
        $kategori = Category::find($id);

        $kategori->delete();

        request()->session()->flash('KategoriDelete');
        return redirect('/kategori');
    }

    public function show($id)
    {
        $kategori = Category::find($id);
        $buku = Buku::all();
        return view('dashboard.kategori.detail', compact(['kategori', 'buku']));
    }
}