<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AnalyticsController2 extends Controller
{
    public function salesChart()
    {
        $salesData = Order::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(total_price) as total_sales')
        )
            ->groupBy('date')
            ->get();

        $labels = $salesData->pluck('date');
        $sales = $salesData->pluck('total_sales');

        return view('omset.chartpertanggal', compact('labels', 'sales'));
    }

    public function exportSalesToExcel()
    {
        $salesData = Order::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(total_price) as total_sales')
        )
            ->groupBy('date')
            ->get();

        // Menyusun data untuk Excel
        $data = $salesData->map(function ($item) {
            return [
                'Tanggal' => $item->date,
                'Total Omset' => $item->total_sales,
            ];
        });

        // Ekspor ke Excel
        return Excel::download(new class($data) implements FromCollection, WithHeadings {
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
                return ['Tanggal', 'Total Omset'];
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