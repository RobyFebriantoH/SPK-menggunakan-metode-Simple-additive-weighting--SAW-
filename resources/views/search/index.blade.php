@include('layouts.header_admin')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-search"></i> Cari Lapangan Futsal</h1>
</div>

<form action="{{ url('search') }}" method="POST" aria-label="Search for futsal fields">
    @csrf
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger"><i class="fa fa-filter"></i> Filter Pencarian</h6>
        </div>
        <div class="card-body">
            <!-- Input untuk harga sewa -->
            <div class="form-group">
                <label class="font-weight-bold" for="harga">Harga Sewa Maksimal (Rp) <span class="text-danger">*</span></label>
                <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukkan harga maksimal" required aria-required="true">
            </div>

            <!-- Fasilitas (Checkbox) -->
            <div class="form-group">
                <label class="font-weight-bold">Fasilitas <span class="text-danger">*</span></label>
                <div class="d-flex flex-wrap">
                    @foreach ($fasilitas as $f)
                    <div class="form-check mr-4 mb-2 d-flex align-items-center">
                        <input class="form-check-input" type="checkbox" name="fasilitas[]" value="{{ $f }}" id="fasilitas_{{ $f }}">
                        <label class="form-check-label ml-2" for="fasilitas_{{ $f }}">{{ $f }}</label>
                    </div>
                    @endforeach
                </div>
                <small class="form-text text-muted">Pilih minimal satu fasilitas.</small>
            </div>

            <!-- Dropdown untuk memilih jenis lapangan -->
            <div class="form-group">
 <label class="font-weight-bold" for="jenis_lapangan">Jenis Lapangan <span class="text-danger">*</span></label>
                <select name="jenis_lapangan" id="jenis_lapangan" class="form-control" required aria-required="true">
                    <option value="">Pilih Jenis Lapangan</option>
                    @foreach ($jenisLapangan as $jl)
                        <option value="{{ $jl->jenis_lapangan }}">{{ $jl->jenis_lapangan }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Dynamic Criteria (C4 and above) as Select Options -->
            @foreach ($subKriteriaC4 as $keterangan => $subKriteria)
                <div class="form-group">
                    <label class="font-weight-bold">{{ $keterangan }} <span class="text-danger">*</span></label>
                    <select name="sub_kriteria[{{ $keterangan }}]" class="form-control" required>
                        <option value="">Pilih Sub-Kriteria</option>
                        @foreach ($subKriteria as $sub)
                        <option value="{{ $sub->id_sub_kriteria }}">{{ $sub->deskripsi }}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Pilih sub-kriteria yang relevan.</small>
                </div>
            @endforeach

            <button type="submit" class="btn btn-danger btn-lg w-100">Tampilkan Hasil</button>
        </div>
    </div>
</form>

<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        const checkboxes = document.querySelectorAll('input[name="fasilitas[]"]:checked');
        if (checkboxes.length === 0) {
            event.preventDefault(); // Prevent form submission
            alert('Silakan pilih minimal satu fasilitas.');
        }
    });
</script>

@include('layouts.footer_admin')