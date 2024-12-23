<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Custom CSS for Sidebar */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            height: 100vh;
            background-color: #2c3e50;
            color: #fff;
            display: flex;
            flex-direction: column;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
        }
        .sidebar a:hover {
            background-color: #34495e;
        }
        .submenu {
            padding-left: 20px;
        }
        /* Membuat menu sidebar mengisi ruang yang tersedia */
        .nav {
            flex-grow: 1;
        }

        /* Menjaga sidebar agar tidak terpotong */
        .container-fluid {
            padding: 0;
        }

        /* Agar sidebar bisa collapse di mode mobile */
        @media (max-width: 991px) {
            .sidebar {
                position: absolute;
                top: 0;
                left: 0;
                bottom: 0;
                width: 250px;
                z-index: 100;
                transition: transform 0.3s ease;
                transform: translateX(-100%);
            }
            .sidebar.show {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>
    <!-- Navbar Toggler for Small Screens -->
    <nav class="navbar navbar-dark bg-dark d-md-none">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Menu</a>
            <!-- Tombol Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar (Kiri) -->
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky pt-3">
                    <h5 class="px-3">Menu</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link submenu-toggle" href="#submenu1" data-bs-toggle="collapse" aria-expanded="false">Menu Makanan</a>
                            <ul id="submenu1" class="collapse submenu">
                                <li><a class="nav-link" href="{{ route('menu.snackbox') }}">Snack Box</a></li>
                                <li><a class="nav-link" href="{{ route('menu.nasibox') }}">Nasi Box</a></li>
                                <li><a class="nav-link" href="{{ route('menu.tumpeng') }}">Nasi Tumpeng</a></li>
                                <li><a class="nav-link" href="{{ route('menu.snack') }}">Snack</a></li>
                                <li><a class="nav-link" href="{{ route('menu.kue_kering') }}">Kue Kering</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('orders.index') }}">Pesanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('customers.index') }}">Pelanggan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link submenu-toggle" href="#submenu2" data-bs-toggle="collapse" aria-expanded="false">Omset</a>
                            <ul id="submenu2" class="collapse submenu">
                                <li><a class="nav-link" href="{{ route('omset.chart') }}">Chart Kumulatif</a></li>
                                <li><a class="nav-link" href="{{ route('omset.chart2') }}">Chart per Tanggal</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Konten Utama (Tabel Pesanan di Kanan) -->
            <div class="col-md-9 col-lg-10">
                @yield('content') <!-- Konten halaman utama -->
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Script untuk membuka dan menutup sidebar secara manual di mobile
        const sidebar = document.getElementById('sidebarMenu');
        const toggler = document.querySelector('.navbar-toggler');

        toggler.addEventListener('click', function() {
            sidebar.classList.toggle('show');
        });
    </script>
</body>
</html>
