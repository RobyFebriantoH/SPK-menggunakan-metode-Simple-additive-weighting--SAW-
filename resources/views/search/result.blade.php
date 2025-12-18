@include('layouts.header_admin')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-list"></i> {{ $page }}</h1>
</div>

@if (session('message'))
<div class="alert alert-warning">{{ session('message') }}</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">Hasil Pencarian</h6>
    </div>
    <div class="card-body">
        <div class="row">
            @if (count($recommendations) > 0)
            @foreach ($recommendations as $item)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item['alternative']->nama }}</h5>
                        @php
                        $gambarPaths = json_decode($item['alternative']->gambar, true);
                        @endphp
                        @if(!empty($gambarPaths))
                        <div class="gallery mb-3">
                            @foreach ($gambarPaths as $index => $gambarPath)
                            <a data-fancybox="gallery" href="{{ asset('storage/' . ltrim($gambarPath, 'public/')) }}">
                                <img src="{{ asset('storage/' . ltrim($gambarPath, 'public/')) }}" alt="Gambar {{ $index }}" class="img-fluid" style="width: 100%; height: 200px; object-fit: cover;">
                            </a>
                            @endforeach
                        </div>
                        @else
                        <p class="text-muted">Tidak ada gambar</p>
                        @endif
                        <p class="card-text"><strong>Harga Sewa:</strong> Rp {{ number_format($item['alternative']->harga, 0, ',', '.') }}</p>
                        <p class="card-text"><strong>Jenis Lapangan:</strong> {{ $item['alternative']->jenis_lapangan }}</p>
                        <p class="card-text"><strong>Fasilitas:</strong>
                            <span class="text-muted">{{ implode(', ', json_decode($item['alternative']->fasilitas, true)) }}</span>
                        </p>
                        <p class="card-text"><strong>Deskripsi:</strong></p>
                        <p>{!! $item['alternative']->deskripsi !!}</p>
                        <p class="card-text"><strong>Skor:</strong> {{ $item['score'] }}</p>
                        <p class="card-text"><strong>Alasan:</strong></p>
                        <ul>
                            @foreach ($item['reasons'] as $reason)
                            <li>{{ $reason }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-12">
                <p class="text-muted">Tidak ada rekomendasi yang ditemukan.</p>
            </div>
            @endif
        </div>
    </div>
</div>
</div>

@include('layouts.footer_admin')

<!-- Include jQuery and FancyBox -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

<script>
    $(document).ready(function() {
        $('[data-fancybox="gallery"]').fancybox({
            // Additional options can be added here
        });
    });
</script>