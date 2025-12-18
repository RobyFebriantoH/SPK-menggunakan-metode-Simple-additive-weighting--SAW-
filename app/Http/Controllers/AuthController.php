<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserModel;
use Illuminate\Foundation\Auth\User as AuthUser ;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi input
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user',
            'username' => 'required|string|max:255|unique:user',
            'nomor_hp' => 'required|numeric', // Validasi untuk nomor_hp
            'password' => 'required|string', // Pastikan password memiliki konfirmasi
        ]);

        // Buat pengguna baru dengan privilege user level 2
        $data = [
            'id_user_level' => 2, // Atur privilege menjadi user level 2 secara otomatis
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'nomor_hp' => $request->input('nomor_hp'), // Tambahkan nomor_hp
            'password' => md5($request->input('password')), // Anda mungkin ingin menggunakan bcrypt untuk keamanan yang lebih baik
        ];

        $result = UserModel::create($data);

        // Redirect ke halaman login dengan pesan sukses
        if ($result) {
            return redirect('Dashboard')->with('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
        } else {
            return redirect('register')->with('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
        }
    }
}