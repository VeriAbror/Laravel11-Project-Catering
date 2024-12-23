@extends('layouts.master') <!-- Sesuaikan dengan layout Anda -->
@section('title', 'Nasi Tumpeng')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="font-weight: bold;">Menu Nasi Tumpeng</h1>
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <!-- Tambahkan gambar nasi tumpeng -->
            <picture>
                <source srcset="{{ asset('images/nasitumpeng.jpg') }}" type="image/jpeg" />
                <img src="{{ asset('images/nasitumpeng.jpg') }}" 
                    class="img-fluid" 
                    style="max-width: 50%; height: auto; border-radius: 10px;"
                    alt="image desc" />
            </picture>
            @foreach ([
                [
                    'name' => 'Nasi Tumpeng',
                    'price' => 'Mulai dari Rp 150.000-an',
                    'items' => ['Lauk: Ayam, telur, sambal goreng tempe, sayur (lalapan).']
                ]
            ] as $paket)
                <div class="mb-4 text-left">
                    <h4 style="font-weight: bold;">{{ $paket['name'] }}</h4>
                    <p><b>Harga:</b> {{ $paket['price'] }}</p>
                    <ul>
                        @foreach ($paket['items'] as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                    <hr style="border-top: 1px solid #800000;">
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

<style>
    .container {
        font-family: 'Arial', sans-serif;
    }

    h1, h4 {
        color: #800000; /* Warna teks utama */
    }

    ul {
        list-style-type: disc;
        padding-left: 20px;
    }

    hr {
        margin-top: 20px;
    }

    .btn-danger {
        background-color: #800000; /* Warna tombol */
        border: none;
    }

    .btn-danger:hover {
        background-color: #b30000; /* Warna hover tombol */
    }
</style>