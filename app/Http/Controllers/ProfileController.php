<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class ProfileController extends Controller
{
    public function index()
    {
        $id_user = session('log.id_user');
        $data['page'] = "Profile";
        $data['profile'] = UserModel::findOrFail($id_user);
        return view('profile.index', $data);
    }

    public function update(Request $request, $id_user)
    {
        // Validasi input
        $this->validate($request, [
            'email' => 'required|email', // Pastikan email valid
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6', // Pastikan password minimal 6 karakter
            'nomor_hp' => 'required|numeric' // Validasi untuk nomor HP
        ]);
    
        // Ambil data dari request
        $data = [
            'email' => $request->input('email'),
            'nama' => $request->input('nama'),
            'username' => $request->input('username'),
            'password' => md5($request->input('password')), // Anda mungkin ingin menggunakan Hash::make()
            'nomor_hp' => $request->input('nomor_hp')
        ];
    
        // Temukan pengguna berdasarkan ID
        $user = UserModel::findOrFail($id_user);
        
        // Update data pengguna
        $user->update($data);
    
        // Redirect dengan pesan sukses
        return redirect('Profile')->with('message', '<div class="alert alert-success" role="alert">Data profile berhasil diupdate!</div>');
    }
}