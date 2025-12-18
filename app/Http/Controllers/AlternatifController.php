<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlternatifModel;
use Illuminate\Support\Facades\Storage;

class AlternatifController extends Controller
{
    public function index()
    {
        $id_user_level = session('log.id_user_level');

        if ($id_user_level != 1 && $id_user_level != 2) {
            return redirect('Dashboard')->with('error', 'Anda tidak berhak mengakses halaman ini!');
        }

        $data['page'] = "Alternatif";
        $data['list'] = AlternatifModel::all();
        return view('alternatif.index', $data);
    }

    public function tambah()
    {
        $id_user_level = session('log.id_user_level');

        if ($id_user_level != 1) {
            return redirect('Alternatif')->with('error', 'Anda tidak berhak mengakses halaman ini!');
        }

        $data['page'] = "Alternatif";
        return view('alternatif.tambah', $data);
    }

    public function simpan(Request $request)
    {
        $id_user_level = session('log.id_user_level');
    
        if ($id_user_level != 1) {
            return redirect('Dashboard')->with('error', 'Anda tidak berhak mengakses halaman ini!');
        }
    
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'fasilitas' => 'required|array',
            'deskripsi' => 'required',
            'jenis_lapangan' => 'required|in:Lapangan Vinyl,Lapangan Rumput Sintetis,Lapangan Semen,Lapangan Parquette',
            'gambar.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);
    
        $gambarPaths = [];
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $gambar) {
                $gambarPath = $gambar->store('public/gambar');
                $gambarPaths[] = $gambarPath;
            }
        }
    
        $data = [
            'nama' => $request->nama,
            'harga' => $request->harga,
            'fasilitas' => json_encode($request->fasilitas ?? []),
            'deskripsi' => $request->deskripsi,
            'jenis_lapangan' => $request->jenis_lapangan,
            'gambar' => json_encode($gambarPaths),
        ];
    
        $result = AlternatifModel::create($data);
    
        if ($result) {
            return redirect('Alternatif')->with('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
        } else {
            return redirect()->back()->withInput()->with('error', 'Data gagal disimpan!'); // Kembali dengan input
        }
    }

    public function edit($id_alternatif)
    {
        $id_user_level = session('log.id_user_level');

        if ($id_user_level != 1) {
            return redirect('Alternatif')->with('error', 'Anda tidak berhak mengakses halaman ini!');
        }

        $data['page'] = "Alternatif";
        $data['alternatif'] = AlternatifModel::findOrFail($id_alternatif);
        return view('alternatif.edit', $data);
    }

    public function update(Request $request, $id_alternatif)
    {
        $request->validate([
            'nama' => 'nullable|string',
            'harga' => 'nullable|numeric',
            'fasilitas' => 'nullable|array',
            'deskripsi' => 'nullable|string',
            'jenis_lapangan' => 'nullable|in:Lapangan Vinyl,Lapangan Rumput Sintetis,Lapangan Semen,Lapangan Parquette', // Pastikan ini sesuai dengan ENUM
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);
    
        $alternatif = AlternatifModel::findOrFail($id_alternatif);
    
        // Siapkan data untuk update
        $data = [];
    
        // Periksa setiap field dan tambahkan ke data jika ada
        if ($request->has('nama')) {
            $data['nama'] = $request->nama;
        }
        if ($request->has('harga')) {
            $data['harga'] = $request->harga;
        }
        if ($request->has('fasilitas')) {
            $data['fasilitas'] = json_encode($request->fasilitas);
        }
        if ($request->has('deskripsi')) {
            $data['deskripsi'] = $request->deskripsi;
        }
        if ($request->has('jenis_lapangan')) {
            $data['jenis_lapangan'] = $request->jenis_lapangan; // Pastikan ini diperiksa dan ditambahkan
        }
    
        // Jika ada gambar baru, tambahkan logika untuk menyimpannya
        if ($request->hasFile('gambar')) {
            $gambarPaths = [];
            foreach ($request->file('gambar') as $gambar) {
                $gambarPath = $gambar->store('public/gambar');
                $gambarPaths[] = $gambarPath;
            }
    
            // Menggabungkan gambar yang sudah ada dengan yang baru
            if ($alternatif->gambar) {
                $existingPaths = json_decode($alternatif->gambar, true);
                $gambarPaths = array_merge($existingPaths, $gambarPaths);
            }
    
            $data['gambar'] = json_encode($gambarPaths);
        }
    
        // Hanya update field yang ada di $data
        $result = $alternatif->update($data);
    
        if ($result) {
            return redirect('Alternatif')->with('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
        } else {
            return redirect()->back()->withInput()->with('error', 'Data gagal diupdate!'); // Kembali dengan input
        }
    }

    public function deleteImage($id_alternatif, $image)
    {
        $alternatif = AlternatifModel::find($id_alternatif);

        if ($alternatif) {
            $images = json_decode($alternatif->gambar, true);
            if (($key = array_search('public/gambar/' . $image, $images)) !== false) {
                unset($images[$key]);
                Storage::delete('public/gambar/' . $image);
            } else {
                return redirect()->back()->with('message', '<div class="alert alert-danger">Image not found in the list.</div>');
            }

            $alternatif->gambar = json_encode(array_values($images));
            $alternatif->save();

            return redirect()->back()->with('message', '<div class="alert alert-success">Image deleted successfully.</div>');
        }

        return redirect()->back()->with('message', '<div class="alert alert-danger">Alternatif not found.</div>');
    }

    public function destroy(Request $request, $id_alternatif)
    {
        $id_user_level = session('log.id_user_level');

        if ($id_user_level != 1) {
            return redirect('Alternatif')->with('error', 'Anda tidak memiliki hak akses untuk menghapus data!');
        }

        try {
            $alternatif = AlternatifModel::findOrFail($id_alternatif);
            $images = json_decode($alternatif->gambar, true);
            foreach ($images as $image) {
                Storage::delete($image);
            }
            $alternatif->delete();

            return redirect('Alternatif')->with('message', '<div class="alert alert-success">Data berhasil dihapus!</div>');
        } catch (\Exception $e) {
            return redirect('Alternatif')->with('error', 'Data gagal dihapus!');
        }
    }
}