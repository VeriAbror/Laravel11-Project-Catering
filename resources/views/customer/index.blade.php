@extends('layouts.master')

@section('title', 'Tabel Pelanggan')

@section('content')
<div class="col-md-9">
    <h2 class="mt-3">Tabel Pelanggan</h2>

    <!-- Form Pencarian -->
    <form action="{{ route('customers.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari pelanggan..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>

    <a href="{{ route('customers.create') }}" class="btn btn-success mb-3">+Tambah Data</a>

    <table class="table table-bordered table-striped" id="tabel-pelanggan">
        <thead>
            <tr>
                <th style="width:5%">ID Pelanggan</th>
                <th style="width:20%">Nama Pelanggan</th>
                <th style="width:15%">Nomor Telepon</th>
                <th style="width:30%">Alamat</th>
                <th style="width:20%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($customers as $customer) <!-- Menggunakan variabel $customers untuk data pelanggan -->
            <tr>
                <td>{{ $customer->id_pelanggan }}</td> <!-- Menampilkan ID Pelanggan -->
                <td>{{ $customer->nama_pelanggan }}</td> <!-- Menampilkan Nama Pelanggan -->
                <td>{{ $customer->nomor_telepon }}</td> <!-- Menampilkan Nomor Telepon -->
                <td>{{ $customer->alamat }}</td> <!-- Menampilkan Alamat -->
                <td>
                    <!-- Form untuk menghapus pelanggan -->
                    <form action="{{ route('customers.destroy', $customer->id_pelanggan) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?')">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('customers.edit', $customer->id_pelanggan) }}" class="btn btn-warning">Edit</a>
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Data pelanggan tidak ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="pagination justify-content-center">
        {{ $customers->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
