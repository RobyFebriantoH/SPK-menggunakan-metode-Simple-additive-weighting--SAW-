<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    public function index()
    {
        $id_user_level = session('log.id_user_level');
        
        if ($id_user_level != 1) {
            return redirect()->route('Dashboard')->with('error', 'Anda tidak berhak mengakses halaman ini!');
        }

        $data['page'] = "User ";
        $data['list'] = UserModel::get_user();
        return view('user.index', $data);
    }

    public function tambah()
    {
        $id_user_level = session('log.id_user_level');
        
        if ($id_user_level != 1) {
            return redirect()->route('Dashboard')->with('error', 'Anda tidak berhak mengakses halaman ini!');
        }

        $data['page'] = "User ";
        $data['user_level'] = UserModel::get_user_level();
        return view('user.tambah', $data);
    }

    public function simpan(Request $request)
    {
        $id_user_level = session('log.id_user_level');
        
        if ($id_user_level != 1) {
            return redirect()->route('Dashboard')->with('error', 'Anda tidak berhak mengakses halaman ini!');
        }
    
        // Validasi input
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email|unique:user,email', // Pastikan email unik
            'privilege' => 'required',
            'username' => 'required|unique:user,username', // Pastikan username unik
            'password' => 'required', // Pastikan password minimal 6 karakter
            'nomor_hp' => 'required|numeric' // Validasi untuk nomor_hp
        ]);
    
        // Siapkan data untuk disimpan
        $data = [
            'id_user_level' => $request->input('privilege'),
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'nomor_hp' => $request->input('nomor_hp'), // Menyimpan nomor_hp
            'password' => md5($request->input('password')) // Anda mungkin ingin menggunakan Hash::make()
        ];
    
        // Simpan data ke database
        $result = UserModel::create($data);
    
        // Redirect dengan pesan sukses atau gagal
        if ($result) {
            return redirect('User  ')->with('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
        } else {
            return redirect('User  /tambah')->with('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
        }
    }

    public function edit($id_user)
    {
        $id_user_level = session('log.id_user_level');
        
        if ($id_user_level != 1) {
            return redirect()->route('Dashboard')->with('error', 'Anda tidak berhak mengakses halaman ini!');
        }

        $data['page'] = "User ";
        $data['user_level'] = UserModel::get_user_level();
        $data['user'] = UserModel::findOrFail($id_user);
        return view('user.edit', $data);
    }

    public function detail($id_user)
    {
        $id_user_level = session('log.id_user_level');
        
        if ($id_user_level != 1) {
            return redirect()->route('Dashboard')->with('error', 'Anda tidak berhak mengakses halaman ini!');
        }

        $data['page'] = "User ";
        $data['user_level'] = UserModel::get_user_level();
        $data['user'] = UserModel::findOrFail($id_user);
        return view('user.detail', $data);
    }

public function update(Request $request, $id_user)
{
    $id_user_level = session('log.id_user_level');
    
    if ($id_user_level != 1) {
        return redirect()->route('Dashboard')->with('error', 'Anda tidak berhak mengakses halaman ini!');
    }

    $this->validate($request, [
        'nama' => 'required',
        'email' => 'required|email',
        'privilege' => 'required',
        'username' => 'required',
        'password' => 'required', // Pastikan password minimal 6 karakter
        'nomor_hp' => 'required|numeric' // Validasi untuk nomor_hp
    ]);

    $data = [
        'id_user_level' => $request->input('privilege'),
        'nama' => $request->input('nama'),
        'email' => $request->input('email'),
        'username' => $request->input('username'),
        'nomor_hp' => $request->input('nomor_hp'), // Menyimpan nomor_hp
        'password' => md5($request->input('password')) // Anda mungkin ingin menggunakan Hash::make()
    ];

    $user = UserModel::findOrFail($id_user);
    $user->update($data);

    return redirect('User  ')->with('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
}

    public function destroy(Request $request, $id_user)
    {
        $id_user_level = session('log.id_user_level');
        
        if ($id_user_level != 1) {
            return redirect()->route('Dashboard')->with('error', 'Anda tidak berhak mengakses halaman ini!');
        }
        
        UserModel::findOrFail($id_user)->delete();
        return redirect('User  ')->with('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
    }
}