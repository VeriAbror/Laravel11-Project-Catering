@extends('layouts.master')

@section('title', 'Edit Data Pelanggan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Konten Utama -->
        <div class="col-md-9">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Edit Data Pelanggan</h4>
                        <br>
                        <form action="{{ route('customers.update', $customer->id_pelanggan) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="id_pelanggan">ID Pelanggan <span class="text-danger"> *</span></label>
                                <input class="form-control" type="text" name="id_pelanggan" id="id_pelanggan" value="{{ $customer->id_pelanggan }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama_pelanggan">Nama Pelanggan <span class="text-danger"> *</span></label>
                                <input class="form-control" type="text" name="nama_pelanggan" id="nama_pelanggan" value="{{ $customer->nama_pelanggan }}">
                            </div>
                            <div class="form-group">
                                <label for="nomor_telepon">Nomor Telepon <span class="text-danger"> *</span></label>
                                <input class="form-control" type="text" name="nomor_telepon" id="nomor_telepon" value="{{ $customer->nomor_telepon }}">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat <span class="text-danger"> *</span></label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="3">{{ $customer->alamat }}</textarea>
                            </div>
                            <br>
                            <div>
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                <a href="{{ route('customers.index') }}" class="btn btn-success">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
