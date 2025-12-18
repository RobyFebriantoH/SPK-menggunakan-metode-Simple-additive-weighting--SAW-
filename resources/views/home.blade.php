<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SPK Lapangan Futsal</title>
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <style>
        body {
            background-color: #f8f9fc; /* Light background for better contrast */
        }
        .card {
            height: 100%; /* Make all cards the same height */
            border: 2px solid #007bff; /* Change border color to blue */
            transition: transform 0.2s, box-shadow 0.2s; /* Transition for hover effect */
        }
        .card:hover {
            transform: scale(1.05); /* Scale up on hover */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Add shadow on hover */
        }
        .card-img-top {
            height: 200px; /* Fixed height for images */
            object-fit: cover; /* Maintain aspect ratio */
        }
        .card-body {
            display: flex;
            flex-direction: column; /* Stack elements vertically */
            justify-content: space-between; /* Space out elements */
        }
        .card-title {
            font-size: 1.5rem; /* Increase title font size */
            color: #007bff; /* Change title color to blue */
        }
        .card-text {
            font-size: 1rem; /* Standardize text size */
        }
        .btn-primary {
            background-color: #007bff; /* Change button color to blue */
            border-color: #007bff; /* Change button border color to blue */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
            border-color: #004085; /* Darker border on hover */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-white shadow-lg pb-3 pt-3 font-weight-bold">
        <div class="container">
            <a class="navbar-brand text-danger" style="font-weight: 900;" href="{{ url('/') }}">
                <i class="fa fa-database mr-2 rotate-n-15"></i> Sistem Pendukung Keputusan Metode SAW
            </a>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center text-danger mb-4">Temukan Lapangan Futsal Terbaik untuk Anda!</h1>
        <p class="text-center text-dark mb-4">Jelajahi berbagai pilihan lapangan futsal yang sesuai dengan kriteria Anda.</p>
        <div class="text-center mb-4">
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login untuk Filter dan Temukan Lapangan Ideal Anda!</a>
        </div>

        <div class="row">
            @foreach ($alternatives as $data)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $data->gambar ? asset(str_replace('public/', 'storage/', json_decode($data->gambar)[0])) : asset('img/default.jpg') }}" class="card-img-top" alt="Gambar {{ $data->nama }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $data->nama }}</h5>
                        <p class="card-text"><strong>Harga Sewa:</strong> Rp {{ number_format($data->harga, 2, ',', '.') }}</p>
                        <p class="card-text"><strong>Fasilitas:</strong>
                            @if ($data->fasilitas)
                                @foreach(json_decode($data->fasilitas) as $fasilitas)
                                    <span class="badge badge-info">{{ $fasilitas }}</span>
                                @endforeach
                            @else
                                -
                            @endif
                        </p>
                        <p class="card-text"><strong>Jenis Lapangan:</strong> {{ $data->jenis_lapangan }}</p>
                        <p class="card-text"><strong>Deskripsi:</strong> {!! $data->deskripsi !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>