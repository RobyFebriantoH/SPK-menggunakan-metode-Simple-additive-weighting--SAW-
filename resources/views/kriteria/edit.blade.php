@include('layouts.header_admin')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Edit Data Kriteria</h1>

    <a href="{{ url('Kriteria') }}" class="btn btn-secondary btn-icon-split">
        <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
        <span class="text">Kembali</span>
    </a>
</div>

@if (session('message'))
    {!! session('message') !!}
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger"><i class="fas fa-fw fa-edit"></i> Edit Data Kriteria</h6>
    </div>

    <form method="POST" action="{{ url('Kriteria/update/'.$kriteria->id_kriteria) }}">
        {{ csrf_field() }}
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="font-weight-bold">Kode Kriteria</label>
                    <input autocomplete="off" type="text" name="kode_kriteria" value="{{ old('kode_kriteria', $kriteria->kode_kriteria) }}" required class="form-control" @if(session('log.id_user_level')==2) readonly @endif />
                </div>
                <div class="form-group col-md-6">
                    <label class="font-weight-bold">Nama Kriteria</label>
                    <input autocomplete="off" type="text" name="keterangan" value="{{ old('keterangan', $kriteria->keterangan) }}" required class="form-control" @if(session('log.id_user_level')==2) readonly @endif />
                </div>

                <!-- Change Bobot Kriteria to a number input -->
                <div class="form-group col-md-6">
                    <label class="font-weight-bold">Bobot Kriteria</label>
                    <input type="number" name="bobot" value="{{ old('bobot', $kriteria->bobot) }}" min="0" max="100" required class="form-control" placeholder="Masukkan bobot (0-100)" />
                </div>

                <div class="form-group col-md-6">
                    <label class="font-weight-bold">Jenis Kriteria</label>
                    <select name="jenis" class="form-control" required @if(session('log.id_user_level')==2) disabled @endif>
                        <option value="">--Pilih Jenis Kriteria--</option>
                        <option value="Benefit" {{ old('jenis', $kriteria->jenis) == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                        <option value="Cost" {{ old('jenis', $kriteria->jenis) == 'Cost' ? 'selected' : '' }}>Cost</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="card-footer text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
    </form>
</div>

@include('layouts.footer_admin')
