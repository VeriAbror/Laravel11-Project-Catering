<nav class="navbar navbar-dark bg-dark d-md-none">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Menu</a>
        <!-- Tombol Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<!-- Sidebar -->
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
    <div class="position-sticky pt-3">
        <h5 class="px-3">Menu</h5>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="home">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link submenu-toggle" href="#submenu1" data-bs-toggle="collapse" aria-expanded="false">Menu Makanan</a>
                <ul id="submenu1" class="collapse submenu">
                    <li><a class="nav-link" href="#">Snack Box</a></li>
                    <li><a class="nav-link" href="#">Nasi Box</a></li>
                    <li><a class="nav-link" href="#">Nasi Tumpeng</a></li>
                    <li><a class="nav-link" href="#">Snack</a></li>
                    <li><a class="nav-link" href="#">Kue Kering</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Pesanan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="home">Pelanggan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link submenu-toggle" href="#submenu4" data-bs-toggle="collapse" aria-expanded="false">Omset</a>
                <ul id="submenu4" class="collapse submenu">
                    <li><a class="nav-link" href="#">Table Omset</a></li>
                    <li><a class="nav-link" href="#">Chart</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
