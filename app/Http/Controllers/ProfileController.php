<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('dashboard.profile.index', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.profile.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);
        $valid = request()->validate([
            'nama' => 'required|min:3|max:255',
            'email' => 'required|email',
            'jurusan' => 'required'
        ]);

        $valid['nama'] = strip_tags(request()->nama);
        $valid['email'] = strip_tags(request()->email);
        $valid['jurusan'] = strip_tags(request()->jurusan);

        $user->update($valid);
        $request->session()->flash('update');
        return redirect('/profile');
    }
}