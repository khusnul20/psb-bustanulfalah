<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #064635">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <img src="https://i.postimg.cc/Qd2Pfmbr/logo.png" alt="" width="45px" height="40px" class="d-inline-block align-text-button">
        <div class="sidebar-brand-text fs-6">PSB Bustanul Falah</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-2">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('home')">
        <a class="nav-link" href="{{ route('user.home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span >Dashboard</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider my-2">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('cetak')">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fa-solid fa-print"></i>
            <span >Cetak Bukti Pendaftarn</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-2">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('pembayaran')">
        <a class="nav-link" href="{{ route('user.bukti') }}">
            <i class="fa-solid fa-wallet"></i>
            <span >Pembayaran</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-2">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('hasiltes')">
        <a class="nav-link" href="{{ route('user.hasiltes') }}">
            <i class="fa-solid fa-file-lines"></i>
            <span >Hasil Tes</span>
        </a>
    </li>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-3">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
