@extends('layouts.master') <!-- Sesuaikan dengan layout Anda -->
@section('title', 'Kue Kering')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="font-weight: bold;">Kue Kering</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Tambahkan background form -->
            <div class="form-background">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/nastar.jpg') }}" alt="Nastar" class="menu-image">
                            <span class="ms-3">Nastar</span>
                        </div>
                        <span class="badge bg-danger text-white">Rp 45.000/toples</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/salju.jpg') }}" alt="Putri Salju" class="menu-image">
                            <span class="ms-3">Putri Salju</span>
                        </div>
                        <span class="badge bg-danger text-white">Rp 40.000/toples</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/wijen.jpg') }}" alt="Kacang Wijen" class="menu-image">
                            <span class="ms-3">Kacang Wijen</span>
                        </div>
                        <span class="badge bg-danger text-white">Rp 35.000/toples</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/kastengel.jpg') }}" alt="Kastengel" class="menu-image">
                            <span class="ms-3">Kastengel</span>
                        </div>
                        <span class="badge bg-danger text-white">Rp 45.000/toples</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/semprit.jpg') }}" alt="Semprit Susu" class="menu-image">
                            <span class="ms-3">Semprit Susu</span>
                        </div>
                        <span class="badge bg-danger text-white">Rp 60.000/kg</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/klicen.jpg') }}" alt="Kacang Klicen" class="menu-image">
                            <span class="ms-3">Kacang Klicen</span>
                        </div>
                        <span class="badge bg-danger text-white">Rp 55.000/kg</span>
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

    .menu-image {
        width: 50px; /* Atur ukuran gambar */
        height: 50px;
        border-radius: 5px; /* Opsional untuk memberikan sudut melengkung */
        object-fit: cover; /* Pastikan gambar proporsional */
    }

    .badge {
        font-size: 14px;
    }

    .bg-danger {
        background-color: #800000 !important; /* Warna merah untuk badge */
    }
</style>