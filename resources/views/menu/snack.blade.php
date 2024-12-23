@extends('layouts.master') <!-- Sesuaikan dengan layout Anda -->
@section('title', 'Menu Snack')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="font-weight: bold;">Menu Snack</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Tambahkan background form -->
            <div class="form-background">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Lemper
                        <span class="badge bg-danger text-white">Rp 2.000</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Brownies
                        <span class="badge bg-danger text-white">Rp 2.000</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Putu Ayu
                        <span class="badge bg-danger text-white">Rp 1.500</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Risoles
                        <span class="badge bg-danger text-white">Rp 1.500</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Klepon
                        <span class="badge bg-danger text-white">Rp 2.000</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Donat
                        <span class="badge bg-danger text-white">Rp 2.000</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Pastel
                        <span class="badge bg-danger text-white">Rp 2.500</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Fruit Pie
                        <span class="badge bg-danger text-white">Rp 3.500</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Bomboloni
                        <span class="badge bg-danger text-white">Rp 2.000</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Dadar Gulung
                        <span class="badge bg-danger text-white">Rp 2.000</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    h1 {
        font-family: 'Arial', sans-serif;
        font-size: 36px;
        font-weight: bold;
        color: #800000; /* Warna merah untuk judul */
    }

    .form-background {
        background-color: #fff8e6; /* Warna cream lembut */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Bayangan untuk efek 3D */
    }

    .list-group-item {
        font-family: 'Arial', sans-serif;
        font-size: 16px;
        padding: 10px;
    }

    .badge {
        font-size: 14px;
    }

    .bg-danger {
        background-color: #800000 !important; /* Warna merah untuk badge */
    }
</style>