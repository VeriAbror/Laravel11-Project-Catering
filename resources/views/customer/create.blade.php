@extends('layouts.master')
@section('title', 'Aplikasi Laravel')
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Konten Utama -->
        <div class="col-md-9">
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h4>Form Input Data Pelanggan</h4>

                        <!-- Form untuk input data pelanggan -->
                        <form action="{{ route('customers.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama_pelanggan">Nama Pelanggan <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="nama_pelanggan" id="nama_pelanggan" required>
                            </div>
                            <div class="form-group">
                                <label for="nomor_telepon">Nomor Telepon <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="nomor_telepon" id="nomor_telepon" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="3" required></textarea>
                            </div>
                            <br>
                            <div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
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
