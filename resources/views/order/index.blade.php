@extends('layouts.master')

@section('title', 'Tabel Pesanan')

@section('content')
<div class="col-md-9">
    <h2 class="mt-3">Tabel Pesanan</h2>

    <!-- Form Pencarian -->
    <form action="{{ route('orders.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Pesanan (ID, Pelanggan, Metode Pembayaran, Status)" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>

    <a href="{{ route('orders.create') }}" class="btn btn-success mb-3">+Tambah Data</a>
    <table class="table table-bordered table-striped" id="tabel-pesanan">
        <thead>
            <tr>
                <th style="width:1%">ID</th>
                <th style="width:4%">ID Pelanggan</th>
                <th style="width:15%">Tanggal Event</th>
                <th style="width:5%">Total Harga</th>
                <th style="width:5%">Metode Pembayaran</th>
                <th style="width:5%">Status Pesanan</th>
                <th style="width:10%">Detail</th>
                <th style="width:20%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->customer->id_pelanggan ?? 'Tidak Ditemukan' }}</td>
                <td>{{ $data->event_date }}</td>
                <td>{{ number_format($data->total_price, 0, ',', '.') }}</td>
                <td>{{ ucfirst($data->payment_method) }}</td>
                <td>{{ ucfirst($data->order_status) }}</td>
                <td>
                    <!-- Detail pesanan (dalam format JSON) -->
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#orderDetails{{ $data->id }}">Lihat Detail</button>
                    <!-- Modal untuk menampilkan detail pesanan -->
                    <div class="modal fade" id="orderDetails{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="orderDetailsLabel{{ $data->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="orderDetailsLabel{{ $data->id }}">Detail Pesanan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Menampilkan detail pesanan -->
                                    <ul>
                                        @foreach(json_decode($data->details, true) as $item)
                                            <li>{{ $item['menu'] }} - Jumlah: {{ $item['quantity'] }} - Harga: {{ number_format($item['price'], 0, ',', '.') }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <form action="{{ route('orders.destroy', $data->id) }}" method="post">@csrf
                        @method('DELETE')
                        <a href="{{ route('orders.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="pagination justify-content-center">
        {{ $orders->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
