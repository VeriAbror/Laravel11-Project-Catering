<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AnalyticsController extends Controller
{
    public function salesChart()
    {
        // Ambil data total omset berdasarkan tanggal
        $salesData = Order::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(total_price) as total_sales')
        )
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Membuat omset kumulatif
        $cumulativeSales = [];
        $runningTotal = 0;

        foreach ($salesData as $data) {
            $runningTotal += $data->total_sales;
            $cumulativeSales[] = [
                'date' => $data->date,
                'cumulative_sales' => $runningTotal,
            ];
        }

        // Pisahkan data untuk dikirim ke view
        $labels = collect($cumulativeSales)->pluck('date'); // Tanggal
        $sales = collect($cumulativeSales)->pluck('cumulative_sales'); // Omset kumulatif

        return view('omset.chartkumulatif', compact('labels', 'sales'));
    }

    public function exportSalesToExcel()
    {
        // Ambil data total omset berdasarkan tanggal
        $salesData = Order::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(total_price) as total_sales')
        )
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Menyusun omset kumulatif
        $cumulativeSales = [];
        $runningTotal = 0;

        foreach ($salesData as $data) {
            $runningTotal += $data->total_sales;
            $cumulativeSales[] = [
                'Tanggal' => $data->date,
                'Total Omset Kumulatif' => $runningTotal,
            ];
        }

        // Ekspor data ke Excel
        return Excel::download(new class($cumulativeSales) implements FromCollection, WithHeadings {
            private $data;

            public function __construct($data)
            {
                $this->data = $data;
            }

            public function collection()
            {
                return collect($this->data);
            }

            public function headings(): array
            {
                return ['Tanggal', 'Total Omset Kumulatif'];
            }
        }, 'sales_report.xlsx');
    }

    public function topMenuChart()
    {
        // Ambil semua data pesanan
        $orders = Order::all();

        // Menghitung jumlah terlaris untuk setiap menu
        $menuCount = [];

        foreach ($orders as $order) {
            $details = json_decode($order->details, true); // Mendekode JSON ke array

            foreach ($details as $item) {
                if (isset($item['menu']) && isset($item['quantity'])) {
                    $menu = $item['menu'];
                    $quantity = (int) $item['quantity'];

                    // Jika menu sudah ada, jumlahkan quantity-nya
                    if (!isset($menuCount[$menu])) {
                        $menuCount[$menu] = 0;
                    }

                    $menuCount[$menu] += $quantity;
                }
            }
        }

        // Mengurutkan berdasarkan jumlah terjual
        arsort($menuCount);
        $menuNames = array_keys(array_slice($menuCount, 0, 10)); // 10 menu terlaris
        $quantities = array_values(array_slice($menuCount, 0, 10)); // Jumlah terjual

        return view('omset.menu-chart', compact('menuNames', 'quantities'));
    }
}
