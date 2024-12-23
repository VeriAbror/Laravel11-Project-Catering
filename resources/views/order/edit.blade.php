@extends('layouts.master')
@section('title', 'Edit Data Pesanan')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Edit Data Pesanan</h4>
                        <br>
                        <form action="{{ route('orders.update', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="customer_id">ID Pelanggan <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="customer_id" id="customer_id" value="{{ $order->customer_id }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="event_date">Tanggal Event <span class="text-danger">*</span></label>
                                <input class="form-control" type="datetime-local" name="event_date" id="event_date" value="{{ \Carbon\Carbon::parse($order->event_date)->format('Y-m-d\TH:i') }}">
                            </div>
                            <div class="form-group">
                                <label for="total_price">Total Harga <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="total_price" id="total_price" value="{{ $order->total_price }}">
                            </div>
                            <div class="form-group">
                                <label for="payment_method">Metode Pembayaran <span class="text-danger">*</span></label>
                                <select class="form-control" name="payment_method" id="payment_method">
                                    <option value="cash" {{ $order->payment_method === 'cash' ? 'selected' : '' }}>Cash</option>
                                    <option value="e-money" {{ $order->payment_method === 'e-money' ? 'selected' : '' }}>E-Money</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="order_status">Status Pesanan <span class="text-danger">*</span></label>
                                <select class="form-control" name="order_status" id="order_status">
                                    <option value="pending" {{ $order->order_status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="delivered" {{ $order->order_status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="details">Detail Pesanan <span class="text-danger">*</span></label>
                                <div id="order-details">
                                    <!-- Existing Items -->
                                    @foreach (json_decode($order->details, true) as $detail)
                                        <div class="form-row mb-2 detail-item">
                                            <div class="col">
                                                <input class="form-control" type="text" name="menu[]" value="{{ $detail['menu'] }}" placeholder="Nama Menu" required>
                                            </div>
                                            <div class="col">
                                                <input class="form-control" type="number" name="quantity[]" value="{{ $detail['quantity'] }}" placeholder="Jumlah" required>
                                            </div>
                                            <div class="col">
                                                <input class="form-control" type="number" name="price[]" value="{{ $detail['price'] }}" placeholder="Harga" required>
                                            </div>
                                            <button type="button" class="btn btn-danger remove-item">Hapus Item</button>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" id="add-item" class="btn btn-primary mt-2">Tambah Item</button>
                            </div>
                            <br>
                            <div>
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                <a href="{{ route('orders.index') }}" class="btn btn-success">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const orderDetails = document.getElementById('order-details');
        const addItemButton = document.getElementById('add-item');

        // Template untuk item baru
        const detailTemplate = () => `
            <div class="form-row mb-2 detail-item">
                <div class="col">
                    <input class="form-control" type="text" name="menu[]" placeholder="Nama Menu" required>
                </div>
                <div class="col">
                    <input class="form-control" type="number" name="quantity[]" placeholder="Jumlah" required>
                </div>
                <div class="col">
                    <input class="form-control" type="number" name="price[]" placeholder="Harga" required>
                </div>
                <button type="button" class="btn btn-danger remove-item">Hapus Item</button>
            </div>
        `;

        // Tambah item baru
        addItemButton.addEventListener('click', () => {
            orderDetails.insertAdjacentHTML('beforeend', detailTemplate());
        });

        // Hapus item
        orderDetails.addEventListener('click', (event) => {
            if (event.target.classList.contains('remove-item')) {
                const item = event.target.closest('.detail-item');
                if (item) {
                    item.remove();
                }
            }
        });
    });
</script>
@endsection
