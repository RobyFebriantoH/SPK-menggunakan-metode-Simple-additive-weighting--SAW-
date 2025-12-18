<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlternatifModel;
use App\Models\KriteriaModel;
use App\Models\SubKriteriaModel;
use App\Models\PenilaianModel;

class SearchController extends Controller
{
    public function index()
    {
        // Fetch all alternatives
        $alternatives = AlternatifModel::all();

        // Fetch unique facilities from alternatives
        $fasilitas = [];
        foreach ($alternatives as $alternative) {
            $facilityArray = json_decode($alternative->fasilitas, true);
            foreach ($facilityArray as $facility) {
                if (!in_array($facility, $fasilitas)) {
                    $fasilitas[] = $facility; // Add unique facility
                }
            }
        }

        // Fetch unique jenis_lapangan from alternatives
        $jenisLapangan = AlternatifModel::select('jenis_lapangan')->distinct()->get();

        // Fetch criteria starting from C4
        $kriteria = KriteriaModel::where('kode_kriteria', 'C4')->orWhere('kode_kriteria', 'C5')->get(); // Adjust as needed for more criteria

        // Fetch sub-criteria for each C4 and above
        $subKriteriaC4 = [];
        foreach ($kriteria as $k) {
            $subKriteriaC4[$k->keterangan] = SubKriteriaModel::data_sub_kriteria($k->id_kriteria); // Use keterangan as key
        }

        $page = 'Cari Lapangan Futsal'; // Page title

        // Pass the variables to the view
        return view('search.index', compact('fasilitas', 'page', 'alternatives', 'jenisLapangan', 'subKriteriaC4'));
    }

    public function search(Request $request)
    {
        // Validasi input
        $request->validate([
            'harga' => 'required|numeric',
            'fasilitas' => 'nullable|array',
            'jenis_lapangan' => 'required|string',
            'sub_kriteria' => 'nullable|array', // Add validation for sub_kriteria
        ]);

        $harga = $request->input('harga');
        $fasilitasIds = $request->input('fasilitas', []);
        $jenisLapangan = $request->input('jenis_lapangan');
        $subKriteriaIds = $request->input('sub_kriteria', []); // Get selected sub-kriteria

        // Ambil bobot dari KriteriaModel
        $kriteria = KriteriaModel::all()->keyBy('kode_kriteria');

        // Mulai query
        $alternatives = AlternatifModel::all();

        // Inisialisasi array untuk menyimpan alternatif yang diberi skor
        $scoredAlternatives = [];

        // Normalisasi harga
        $maxHarga = $alternatives->max('harga'); // Max price for normalization

        foreach ($alternatives as $alternative) {
            $score = 0;
            $reasons = []; // Array untuk menyimpan alasan

            // Normalisasi harga
            $normalizedHarga = $maxHarga ? $alternative->harga / $maxHarga : 0; // Normalized price
            if ($alternative->harga == $harga) {
                $reasons[] = "Harga sewa sama dengan Rp " . number_format($harga, 0, ',', '.');
                $score += 10; // Bonus for exact price match
            } elseif ($alternative->harga >= $harga - 10000 && $alternative->harga <= $harga + 10000) {
                $reasons[] = "Harga sewa mirip dengan Rp " . number_format($harga, 0, ',', '.');
                $score += 5; // Slight bonus for close match
            }
            $score += (1 - $normalizedHarga) * $kriteria['C1']->bobot; // Cost criteria (lower is better)

            // Normalisasi fasilitas
            $alternativeFacilities = json_decode($alternative->fasilitas, true);
            $matchedFacilities = array_intersect($alternativeFacilities ?? [], $fasilitasIds);
            $fasilitasSkor = count($matchedFacilities) / (count($fasilitasIds) ?: 1); // Avoid division by zero
            if (!empty($matchedFacilities)) {
                $score += $fasilitasSkor * $kriteria['C2']->bobot; // Benefit criteria (higher is better)
                $reasons[] = "Fasilitas yang cocok: " . implode(', ', $matchedFacilities);

                // Check if all selected facilities are matched
                if (count($fasilitasIds) > 1 && count($matchedFacilities) == count($fasilitasIds)) {
                    $score += 5; // Bonus for matching all selected facilities
                    $reasons[] = "Semua fasilitas yang dipilih tersedia.";
                } elseif (count($fasilitasIds) == 1 && count($matchedFacilities) == 1) {
                    $reasons[] = "Fasilitas yang dipilih tersedia.";
                }
            } else {
                $reasons[] = "Tidak ada fasilitas yang cocok.";
            }

            // Tambahkan skor untuk kecocokan jenis lapangan
            if ($alternative->jenis_lapangan === $jenisLapangan) {
                $score += $kriteria['C3']->bobot; // Benefit criteria (higher is better)
                $reasons[] = "Jenis lapangan sesuai dengan yang dicari: " . $jenisLapangan;
            } else {
                $reasons[] = "Jenis lapangan tidak sesuai dengan kriteria.";
            }

            // Tambahkan skor untuk kecocokan sub-kriteria C4 dan lebih
            if (!empty($subKriteriaIds)) {
                foreach ($subKriteriaIds as $subKriteriaId) {
                    $penilaian = PenilaianModel::data_penilaian($alternative->id_alternatif, $subKriteriaId);
                    if ($penilaian) {
                        $score += $penilaian->nilai * $kriteria['C4']->bobot; // Benefit criteria (higher is better)
                        $reasons[] = "Sub-kriteria yang cocok: " . $subKriteriaId . " dengan nilai " . $penilaian->nilai;
                    } else {
                        $reasons[] = "Tidak ada penilaian untuk sub-kriteria: " . $subKriteriaId;
                    }
                }
            }

            // Simpan alternatif dan skornya
            $scoredAlternatives[] = [
                'alternative' => $alternative,
                'score' => $score,
                'reasons' => $reasons,
            ];
        }

        // Sort alternatives by score in descending order
        usort($scoredAlternatives, function ($a, $b) {
            return $b['score'] <=> $a['score'];
        });

        // Filter out alternatives with a score of 0
        $filteredAlternatives = array_filter($scoredAlternatives, function ($item) {
            return $item['score'] > 0;
        });

        // Jika tidak ada rekomendasi, kembalikan pesan
        if (empty($filteredAlternatives)) {
            return redirect()->back()->with('message', 'Tidak ada lapangan yang memenuhi kriteria Anda.');
        }

        // Define the page variable for the search results
        $page = 'Hasil Pencarian'; // Set the title for the results page

        // Kembalikan hasil ke tampilan
        return view('search.result', [
            'recommendations' => $filteredAlternatives,
            'page' => $page,
            'harga' => $harga,
        ]);
    }
}
