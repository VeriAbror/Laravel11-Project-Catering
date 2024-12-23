<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // Ambil input pencarian
        $search = $request->input('search');

        // Ambil data pesanan dengan relasi customer dan filter jika ada pencarian
        $orders = Order::with('customer')
            ->when($search, function ($query, $search) {
                return $query->where('id', 'like', "%{$search}%")
                    ->orWhereHas('customer', function ($query) use ($search) {
                        $query->where('nama_pelanggan', 'like', "%{$search}%");
                    })
                    ->orWhere('payment_method', 'like', "%{$search}%")
                    ->orWhere('order_status', 'like', "%{$search}%");
            })
            ->paginate(5); // Pagination 5 item per halaman

        // Kirim data orders ke view
        return view('order.index', compact('orders'));
    }

    public function create()
    {
        // Ambil semua data customer untuk form pembuatan order
        $customers = Customer::all();
        return view('order.create', compact('customers'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'customer_id' => 'required|exists:customers,id_pelanggan',
            'event_date' => 'required|date',
            'total_price' => 'required|numeric',
            'payment_method' => 'required|in:cash,e-money',
            'order_status' => 'required|in:pending,delivered',
            'menu' => 'required|array',
            'quantity' => 'required|array',
            'price' => 'required|array',
        ]);

        // Menyusun detail pesanan
        $details = [];
        foreach ($request->menu as $key => $menu) {
            $details[] = [
                'menu' => $menu,
                'quantity' => $request->quantity[$key],
                'price' => $request->price[$key],
            ];
        }

        // Menyimpan data pesanan
        Order::create([
            'customer_id' => $request->customer_id,
            'event_date' => $request->event_date,
            'total_price' => $request->total_price,
            'payment_method' => $request->payment_method,
            'order_status' => $request->order_status,
            'details' => json_encode($details), // Menyimpan details sebagai JSON
        ]);

        // Redirect ke halaman daftar pesanan
        return redirect()->route('orders.index');
    }

    public function edit($id)
    {
        // Ambil data order berdasarkan ID
        $order = Order::findOrFail($id);
        // Ambil semua data customer untuk keperluan form edit
        $customers = Customer::all();
        return view('order.edit', compact('order', 'customers'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'event_date' => 'required|date',
            'total_price' => 'required|numeric',
            'payment_method' => 'required|in:cash,e-money',
            'order_status' => 'required|in:pending,delivered',
        ]);

        // Ambil data order berdasarkan ID
        $order = Order::findOrFail($id);

        // Mengonversi detail pesanan menjadi array
        $details = [];
        foreach ($request->menu as $key => $menu) {
            $details[] = [
                'menu' => $menu,
                'quantity' => $request->quantity[$key],
                'price' => $request->price[$key],
            ];
        }

        // Update data pesanan
        $order->update([
            'event_date' => $request->event_date,
            'total_price' => $request->total_price,
            'payment_method' => $request->payment_method,
            'order_status' => $request->order_status,
            'details' => json_encode($details),  // Update details sebagai JSON
        ]);

        // Redirect ke halaman daftar pesanan dengan pesan sukses
        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Hapus data pesanan
        Order::findOrFail($id)->delete();
        // Redirect ke halaman daftar pesanan dengan pesan sukses
        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dihapus');
    }
}
