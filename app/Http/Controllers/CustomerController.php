<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Menampilkan daftar pelanggan
    public function index(Request $request)
    {
        $search = $request->input('search'); // Ambil input pencarian

        // Ambil data pelanggan berdasarkan pencarian, jika ada
        $customers = Customer::when($search, function ($query, $search) {
            return $query->where('nama_pelanggan', 'like', "%{$search}%")
                         ->orWhere('nomor_telepon', 'like', "%{$search}%")
                         ->orWhere('alamat', 'like', "%{$search}%");
        })->paginate(5); // Pagination 5 per halaman

        // Menampilkan view dengan data pelanggan
        return view('customer.index', compact('customers'));
    }

    // Menampilkan form untuk membuat pelanggan baru
    public function create()
    {
        return view('customer.create'); // Menampilkan halaman form input pelanggan
    }

    // Menyimpan data pelanggan baru
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nama_pelanggan' => 'required',
            'nomor_telepon' => 'required|unique:customers', // Validasi nomor telepon unik
            'alamat' => 'required',
        ]);

        // Menyimpan data pelanggan baru
        Customer::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'nomor_telepon' => $request->nomor_telepon,
            'alamat' => $request->alamat,
        ]);

        // Redirect ke halaman list pelanggan
        return redirect()->route('customers.index');
    }

    // Menampilkan form untuk mengedit data pelanggan
    public function edit($id_pelanggan)
    {
        // Mengambil data pelanggan berdasarkan ID
        $customer = Customer::findOrFail($id_pelanggan);

        // Kirimkan data customer ke view
        return view('customer.edit', compact('customer')); // Mengirimkan 'customer' ke view
    }

    // Mengupdate data pelanggan
    public function update(Request $request, $id_pelanggan)
    {
        // Mengambil data pelanggan berdasarkan ID
        $customer = Customer::findOrFail($id_pelanggan);

        // Validasi input untuk update
        $request->validate([
            'nama_pelanggan' => 'required',
            'nomor_telepon' => 'required|unique:customers,nomor_telepon,' . $customer->id_pelanggan . ',id_pelanggan', // Validasi unik berdasarkan 'id_pelanggan'
            'alamat' => 'required',
        ]);

        // Mengupdate data pelanggan
        $customer->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'nomor_telepon' => $request->nomor_telepon,
            'alamat' => $request->alamat,
        ]);

        // Redirect ke halaman list pelanggan
        return redirect()->route('customers.index');
    }

    // Menghapus data pelanggan
    public function destroy($id_pelanggan)
    {
        // Mencari dan menghapus data pelanggan
        Customer::findOrFail($id_pelanggan)->delete();

        // Redirect ke halaman list pelanggan setelah data dihapus
        return redirect()->route('customers.index');
    }
}
