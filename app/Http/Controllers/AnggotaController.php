<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('dashboard.user.index', compact('user'));
    }

    public function tampil($id)
    {
        $user = User::find($id);
        return view('dashboard.user.tampil', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.user.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        $validate = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'jurusan' => 'required'
        ]);
        $user->update($validate);
        $request->session()->flash('updateuser');
        return redirect('/anggota');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        request()->session()->flash('deleteuser');
        return redirect('/anggota');
    }
}