@include('layouts.header_admin')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Alternatif</h1>

    @if (session('log.id_user_level') == 1)
    <a href="{{ url('Alternatif/tambah') }}" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data </a>
    @endif
</div>

@if(session('message'))
{!! session('message') !!}
@endif

@if(session('error'))
<div class="alert alert-danger" role="alert">{{ session('error') }}</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger"><i class="fa fa-table"></i> Daftar Data Alternatif</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-danger text-white">
                    <tr align="center">
                        <th width="5%">No</th>
                        <th>Nama Lapangan</th>
                        <th>Harga Sewa</th>
                        <th>Fasilitas</th>
                        <th>Jenis Lapangan</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        @if (session('log.id_user_level') == 1)
                        <th width="15%">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($list as $data)
                    <tr align="center">
                        <td>{{ $no++ }}</td>
                        <td class="text-left">{{ $data->nama }}</td>
                        <td class="text-left">Rp {{ number_format($data->harga, 2, ',', '.') }}</td>
                        <td class="text-left">
                            @if($data->fasilitas)
                            @foreach(json_decode($data->fasilitas) as $fasilitas)
                            <span class="badge badge-info">{{ $fasilitas }}</span>
                            @endforeach
                            @else
                            -
                            @endif
                        </td>
                        <td class="text-left">{{ $data->jenis_lapangan }}</td>
                        <td class="text-left">{!! $data->deskripsi !!}</td>
                        <td class="text-left">
                            @if($data->gambar)
                            @foreach(json_decode($data->gambar) as $gambar)
                            <a href="{{ asset(str_replace('public/', 'storage/', $gambar)) }}" data-fancybox="gallery" data-caption="{{ $data->nama }}">
                                <img src="{{ asset(str_replace('public/', 'storage/', $gambar)) }}" alt="Gambar Alternatif" class="img-fluid" style="max-width: 100px; max-height: 100px;">
                            </a>
                            @endforeach
                            @else
                            -
                            @endif
                        </td>
                        @if (session('log.id_user_level') == 1)
                        <td>
                            <div class="btn-group" role="group">
                                <a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="{{ url('Alternatif/edit/'.$data->id_alternatif) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <form action="{{ url('Alternatif/destroy/'.$data->id_alternatif) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('layouts.footer_admin')

<!-- Include jQuery and FancyBox -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>