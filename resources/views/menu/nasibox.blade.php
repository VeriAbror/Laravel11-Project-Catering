@extends('layouts.master') <!-- Sesuaikan dengan layout Anda -->
@section('title', 'Nasi Box')
@section('content')

@section('title', 'Menu Nasi Box')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="font-weight: bold;">Menu Nasi Box</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ([
                ['name' => 'Paket A', 'price' => 'Rp 18.000', 'items' => ['Ayam potong : Goreng, Bakar, Kremes', 'Nasi, sayur, sambal, dan lalapan']],
                ['name' => 'Paket B', 'price' => 'Rp 27.000', 'items' => ['Ayam potong 1/4: Goreng, Bakar, Kremes', 'Nasi, sayur, sambal, dan lalapan']],
            ] as $paket)
                <div class="mb-4">
                    <h4 style="font-weight: bold;">{{ $paket['name'] }} ({{ $paket['price'] }})</h4>
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
    .menu-container {
        width: 60%;
        margin: 0 auto;
        font-family: 'Arial', sans-serif;
        text-align: center;
    }

    .menu-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .menu-item {
        text-align: left;
        margin-bottom: 20px;
    }

    .menu-item h3 {
        font-size: 18px;
        font-weight: bold;
        color: #333;
    }

    .menu-item ul {
        list-style: none;
        padding: 0;
        margin: 10px 0;
        line-height: 1.5;
    }

    .menu-item hr {
        border: none;
        border-top: 1px solid #c0392b; /* Warna garis */
        margin-top: 10px;
    }
</style>

@endsection