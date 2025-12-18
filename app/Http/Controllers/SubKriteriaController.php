<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubKriteriaModel;
use App\Models\KriteriaModel;

class SubKriteriaController extends Controller
{
    public function index()
    {
        $id_user_level = session('log.id_user_level');
        
        if ($id_user_level != 1) {
            return redirect()->route('Dashboard')->with('error', 'Anda tidak berhak mengakses halaman ini!');
        }

        $data['page'] = "Sub Kriteria";
        $data['kriteria'] = KriteriaModel::all();
        return view('sub_kriteria.index', $data);
    }

    public function simpan(Request $request)
    {
        $id_user_level = session('log.id_user_level');
        
        if ($id_user_level != 1) {
            return redirect()->route('Dashboard')->with('error', 'Anda tidak berhak mengakses halaman ini!');
        }
    
        // Validasi input
        $this->validate($request, [
            'id_kriteria' => 'required',
            'deskripsi' => 'required|string',
            'nilai' => 'required|numeric|min:0|max:1'
        ]);
    
        // Cek apakah deskripsi sudah ada
        if (SubKriteriaModel::where('id_kriteria', $request->id_kriteria)
            ->where('deskripsi', $request->deskripsi)
            ->exists()) {
            return redirect()->back()->with('message', '<div class="alert alert-danger">Deskripsi sudah ada!</div>')->withInput();
        }
    
        // Cek apakah nilai sudah ada untuk kriteria yang sama
        if (SubKriteriaModel::where('id_kriteria', $request->id_kriteria)
            ->where('nilai', $request->nilai)
            ->exists()) {
            return redirect()->back()->with('message', '<div class="alert alert-danger">Nilai sudah ada untuk kriteria yang sama!</div>')->withInput();
        }
    
        // Data yang akan disimpan
        $data = [
            'id_kriteria' => $request->id_kriteria,
            'deskripsi' => $request->deskripsi,
            'nilai' => $request->nilai
        ];
    
        // Simpan data
        $result = SubKriteriaModel::create($data);
    
        // Cek hasil simpan
        if ($result) {
            return redirect('SubKriteria')->with('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
        } else {
            return redirect('SubKriteria')->with('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
        }
    }

    public function edit(Request $request, $id_sub_kriteria)
    {
        $id_user_level = session('log.id_user_level');
        
        if ($id_user_level != 1) {
            return redirect()->route('Dashboard')->with('error', 'Anda tidak berhak mengakses halaman ini!');
        }
    
        $this->validate($request, [
            'id_kriteria' => 'required',
            'deskripsi' => 'required',
            'nilai' => 'required|numeric|min:0|max:1'
        ]);
    
        $subkriteria = SubKriteriaModel::findOrFail($id_sub_kriteria);
    
        // Cek apakah deskripsi sudah ada dalam kriteria yang sama, kecuali untuk deskripsi saat ini
        if (SubKriteriaModel::where('id_kriteria', $request->id_kriteria)
            ->where('deskripsi', $request->deskripsi)
            ->where('id_sub_kriteria', '!=', $id_sub_kriteria)
            ->exists()) {
            return redirect()->back()->with('message', '<div class="alert alert-danger">Deskripsi sudah ada!</div>')->withInput();
        }
    
        // Cek apakah nilai sudah ada untuk kriteria yang sama, kecuali untuk nilai saat ini
        if (SubKriteriaModel::where('id_kriteria', $request->id_kriteria)
            ->where('nilai', $request->nilai)
            ->where('id_sub_kriteria', '!=', $id_sub_kriteria)
            ->exists()) {
            return redirect()->back()->with('message', '<div class="alert alert-danger">Nilai sudah ada untuk kriteria yang sama!</div>')->withInput();
        }
    
        // Data yang akan diperbarui
        $data = [
            'id_kriteria' => $request->id_kriteria,
            'deskripsi' => $request->deskripsi,
            'nilai' => $request->nilai
        ];
    
        // Memperbarui data subkriteria
        $subkriteria->update($data);
    
        return redirect('SubKriteria')->with('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
    }

    public function destroy(Request $request, $id_sub_kriteria)
    {
        $id_user_level = session('log.id_user_level');
        
        if ($id_user_level != 1) {
            return redirect()->route('Dashboard')->with('error', 'Anda tidak berhak mengakses halaman ini!');
        }
        
        SubKriteriaModel::findOrFail($id_sub_kriteria)->delete();
        return redirect('SubKriteria')->with('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
    }
}