<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function storeLogin(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3|max:10'
        ]);

        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();
            return redirect()->intended('/buku');
        }
        return back()->with('error', 'Email atau password salah');
    }

    public function indexRegister()
    {
        return view('auth.register');
    }

    public function storeRegister(Request $request)
    {
        $dataValidated = $request->validate([
            'nama' => ['required', 'string', 'min:5', 'max:255', 'unique:users'],
            'jurusan' => ['required', 'string', 'max:45'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:5', 'max:8'],
        ]);

        $dataValidated['role'] = 'user';

        $dataValidated['nama'] = strip_tags($request->nama);
        $dataValidated['jurusan'] = strip_tags($request->jurusan);
        $dataValidated['email'] = strip_tags($request->email);
        $dataValidated['password'] = strip_tags($request->password);

        User::create($dataValidated);
        $request->session()->flash('success');
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}