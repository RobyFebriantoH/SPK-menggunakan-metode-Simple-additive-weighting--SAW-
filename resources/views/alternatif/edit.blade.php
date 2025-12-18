@include('layouts.header_admin')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-edit"></i> Edit Data Alternatif</h1>
</div>

<form action="{{ url('Alternatif/update/' . $alternatif->id_alternatif) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    @method('PUT') <!-- Use PUT method for updating -->
    <div class="card-body">
        <div class="row">
            <!-- Nama Lapangan -->
            <div class="form-group col-md-12">
                <label class="font-weight-bold">Nama Lapangan</label>
                <input autocomplete="off" type="text" name="nama" value="{{ $alternatif->nama }}" required class="form-control" />
            </div>

            <!-- Harga Sewa -->
            <div class="form-group col-md-12">
                <label class="font-weight-bold">Harga Sewa</label>
                <input autocomplete="off" type="number" name="harga" value="{{ $alternatif->harga }}" required class="form-control" />
            </div>

            <!-- Fasilitas (Checkbox) -->
            <div class="form-group col-md-12">
                <label class="font-weight-bold">Fasilitas</label>
                <div>
                    @php
                    $fasilitasList = [
                        'Kamar Mandi',
                        'Area Parkir',
                        'Tempat Tunggu',
                        'Tribun Penonton',
                        'Minuman/Kantin',
                        'Alat Futsal',
                        'Ruang Sholat',
                        'Jaring Lapangan',
                        'Ruang Ganti',
                    ];
                    $selectedFacilities = json_decode($alternatif->fasilitas, true); // Get selected facilities
                    @endphp
                    @foreach($fasilitasList as $fasilitas)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fasilitas[]" value="{{ $fasilitas }}" id="{{ str_replace(' ', '_', $fasilitas) }}" 
                        {{ in_array($fasilitas, $selectedFacilities) ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ str_replace(' ', '_', $fasilitas) }}">{{ $fasilitas }}</label>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Jenis Lapangan (Dropdown) -->
            <div class="form-group col-md-12">
                <label class="font-weight-bold">Jenis Lapangan</label>
                <select name="jenis_lapangan" class="form-control" required>
                    <option value="">Pilih Jenis Lapangan</option>
                    <option value="Lapangan Vinyl" {{ $alternatif->jenis_lapangan == 'Lapangan Vinyl' ? 'selected' : '' }}>Lapangan Vinyl</option>
                    <option value="Lapangan Rumput Sintetis" {{ $alternatif->jenis_lapangan == 'Lapangan Rumput Sintetis' ? 'selected' : '' }}>Lapangan Rumput Sintetis</option>
                    <option value="Lapangan Semen" {{ $alternatif->jenis_lapangan == 'Lapangan Semen' ? 'selected' : '' }}>Lapangan Semen</option>
                    <option value="Lapangan Parquette" {{ $alternatif->jenis_lapangan == 'Lapangan Parquette' ? 'selected' : '' }}>Lapangan Parquette</option>
                </select>
            </div>

            <!-- Deskripsi -->
            <div class="form-group col-md-12">
                <label class="font-weight-bold">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="5">{{ $alternatif->deskripsi }}</textarea>
            </div>

            <!-- Gambar Alternatif -->
            <div class="form-group col-md-12">
                <label class="font-weight-bold">Gambar Alternatif</label>
                <input autocomplete="off" type="file" name="gambar[]" multiple class="form-control" />
                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success"><i class="fa fa -save"></i> Update</button>
        <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
    </div>
</form>

<script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('textarea[name="deskripsi"]'))
        .catch(error => {
            console.error(error);
        });
</script>

@include('layouts.footer_admin')