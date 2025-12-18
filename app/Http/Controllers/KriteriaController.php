<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KriteriaModel;

class KriteriaController extends Controller
{
    public function index()
    {
        $id_user_level = session('log.id_user_level');

        if ($id_user_level != 1 ) {
?>
            <script>
                window.location = '<?php echo url("Kriteria"); ?>'
                alert('Anda tidak berhak mengakses halaman ini!');
            </script>
        <?php
        }

        $data['page'] = "Kriteria";
        $data['list'] = KriteriaModel::all();
        return view('kriteria.index', $data);
    }

    public function tambah()
    {
        $id_user_level = session('log.id_user_level');

        if ($id_user_level != 1) {
        ?>
            <script>
                window.location = '<?php echo url("Kriteria"); ?>'
                alert('Anda tidak berhak mengakses halaman ini!');
            </script>
        <?php
        }

        $data['page'] = "Kriteria";
        return view('kriteria.tambah', $data);
    }

    public function simpan(Request $request)
{
    $id_user_level = session('log.id_user_level');

    if ($id_user_level != 1) {
        return redirect()->back()->with('error', 'Anda tidak berhak mengakses halaman ini!');
    }

    // Validasi request
    $this->validate($request, [
        'keterangan' => 'required',
        'kode_kriteria' => 'required',
        'bobot' => 'required|numeric|min:0',
        'jenis' => 'required'
    ]);

    // Cek jika kode_kriteria sudah ada
    if (KriteriaModel::where('kode_kriteria', $request->kode_kriteria)->exists()) {
        return redirect()->back()->with('message', '<div class="alert alert-danger">Kode kriteria sudah ada!</div>')->withInput();
    }

    // Cek jika keterangan sudah ada
    if (KriteriaModel::where('keterangan', $request->keterangan)->exists()) {
        return redirect()->back()->with('message', '<div class="alert alert-danger">Nama Kriteria sudah ada!</div>')->withInput();
    }

    // Mengecek apakah total bobot tidak melebihi 100
    $totalBobot = KriteriaModel::sum('bobot') + $request->bobot; // Total bobot semua kriteria + bobot baru
    if ($totalBobot > 100) {
        return redirect()->back()->with('message', '<div class="alert alert-danger">Total bobot tidak boleh lebih dari 100!</div>')->withInput();
    }

    // Siapkan data untuk penyimpanan
    $data = [
        'keterangan' => $request->keterangan,
        'kode_kriteria' => $request->kode_kriteria,
        'bobot' => $request->bobot,
        'jenis' => $request->jenis
    ];

    // Simpan data ke database
    $result = KriteriaModel::create($data);

    if ($result) {
        return redirect()->route('Kriteria')->with('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
    } else {
        return redirect()->route('Kriteria/tambah')->with('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
    }
}


    public function edit($id_kriteria)
    {
        $id_user_level = session('log.id_user_level');

        if ($id_user_level != 1 & 2) {
        ?>
            <script>
                window.location = '<?php echo url("Kriteria"); ?>'
                alert('Anda tidak berhak mengakses halaman ini!');
            </script>
<?php
        }

        $data['page'] = "Kriteria";
        $data['kriteria'] = KriteriaModel::findOrFail($id_kriteria);
        return view('kriteria.edit', $data);
    }

    public function update(Request $request, $id_kriteria)
    {
        $kriteria = KriteriaModel::findOrFail($id_kriteria);
    
        // Validasi data
        $this->validate($request, [
            'keterangan' => 'required|string',
            'kode_kriteria' => 'required|string',
            'bobot' => 'required|numeric|min:0|max:100',
            'jenis' => 'required|string',
        ]);
    
        // Validasi total bobot
        $totalBobot = KriteriaModel::where('id_kriteria', '!=', $id_kriteria)->sum('bobot') + $request->bobot;
        if ($totalBobot > 100) {
            return redirect()->back()->with('message', '<div class="alert alert-danger">Total bobot tidak boleh lebih dari 100!</div>')->withInput();
        }
    
        // Update semua field
        $kriteria->update([
            'keterangan' => $request->keterangan,
            'kode_kriteria' => $request->kode_kriteria,
            'bobot' => $request->bobot,
            'jenis' => $request->jenis,
        ]);
    
        return redirect()->route('Kriteria')->with('message', '<div class="alert alert-success" role="alert">Data berhasil diperbarui!</div>');
    }
    
    


    public function destroy(Request $request, $id_kriteria)
    {
        $id_user_level = session('log.id_user_level');

        // Mengecek apakah pengguna adalah level 1
        if ($id_user_level == 1) {
            // Jika pengguna adalah level 1, lanjutkan dengan menghapus data Kriteria
            KriteriaModel::findOrFail($id_kriteria)->delete();
        
            // Set flash message untuk memberi tahu pengguna bahwa data berhasil dihapus
            return redirect()->route('Kriteria')->with('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        } else {
            // Jika pengguna bukan level 1, kirimkan pesan kesalahan dalam sesi
            return redirect()->back()->with('message', '<div class="alert alert-danger" role="alert">Anda tidak memiliki hak akses untuk menghapus data!</div>');
        }
    }

}
