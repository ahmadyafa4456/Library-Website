<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $buku = Buku::with('category_buku')->get();
        return view('dashboard.buku.index', compact(['buku']));
    }

    public function tambah()
    {
        $kategori = Category::all();
        $buku = Buku::all();
        return view('dashboard.buku.tambah', compact(['buku', 'kategori']));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'judul' => 'required',
            'kode_buku' => 'required|unique:bukus',
            'kategori_buku' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'gambar' => 'image|file|max:2048',
        ]);

        if ($request->file('gambar')) {
            $validate['gambar'] = $request->file('gambar')->store('buku-image', 'public');
            $buku = Buku::create($validate);
            $buku->category_buku()->sync($request->kategori_buku);
        }

        $request->session()->flash('bukutambah');
        return redirect('/buku');
    }

    public function edit($id)
    {
        $kategori = Category::all();
        $buku = Buku::find($id);
        return view('dashboard.buku.edit', compact(['buku', 'kategori']));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);
        $update = $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'gambar' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->file('gambar')) {
            $update['gambar'] = $request->file('gambar')->store('buku-image', 'public');
            Storage::delete($buku->gambar);
        }
        $buku->category_buku()->sync($request->kategori_buku);
        $buku->update($update);

        $request->session()->flash('updatebuku');
        return redirect('/buku');
    }

    public function delete($id)
    {
        $buku = Buku::find($id);
        if ($buku->gambar) {
            Storage::delete($buku->gambar);
        }
        $buku->delete();
        return redirect('/buku');
    }
}
