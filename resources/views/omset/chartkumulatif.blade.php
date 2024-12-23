@extends('layouts.master')

@section('title', 'Omset Chart')

@section('content')
<div class="col-md-9">
    <h2 class="mt-3">Grafik Omset</h2>

    <!-- Tombol untuk mencetak ke Excel -->
    <a href="{{ route('analytics.sales.export') }}" class="btn btn-primary mb-3">Cetak ke Excel</a>

    <!-- Canvas untuk menampilkan chart -->
    <canvas id="salesChart"></canvas>

    <script>
        // Ambil data yang dikirim dari controller
        const labels = @json($labels);
        const sales = @json($sales);

        // Membuat chart menggunakan Chart.js
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'line', // Tipe chart (line chart)
            data: {
                labels: labels, // Labels untuk sumbu X (tanggal)
                datasets: [{
                    label: 'Omset Kumulatif',
                    data: sales, // Data untuk sumbu Y (total_sales)
                    borderColor: 'rgba(75, 192, 192, 1)', // Warna garis
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna latar belakang di bawah garis
                    fill: true,
                    tension: 0.1, // Memberikan efek lengkungan pada garis
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Omset Kumulatif',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return 'Rp ' + tooltipItem.raw.toLocaleString(); // Menampilkan format uang
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Tanggal',
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Total Omset',
                        },
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString(); // Format angka ke format uang
                            }
                        }
                    }
                }
            }
        });
    </script>
</div>
@endsection
