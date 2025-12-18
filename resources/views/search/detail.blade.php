<!-- resources/views/search/detail.blade.php -->

@include('layouts.header_admin')
<h1>{{ $page }}</h1>
<h1>Detail Perhitungan: {{ $lapangan->nama }}</h1>

<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kriteria</th>
                <th>Nilai Penilaian</th>
                <th>Nilai Ternormalisasi</th>
                <th>Bobot</th>
                <th>Nilai Akhir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detailCalculation as $detail)
                <tr>
                    <td>{{ $detail['kriteria'] }}</td>
                    <td>{{ $detail['nilai_penilaian'] }}</td>
                    <td>{{ number_format($detail['normalized_value'], 4) }}</td>
                    <td>{{ $detail['weight'] * 100 }}%</td>
                    <td>{{ number_format($detail['score'], 4) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Total Nilai Preferensi: {{ number_format($totalScore, 4) }}</h4>
</div>

@include('layouts.footer_admin')
