<ul class="navbar-nav sidebar sidebar-dark accordion " id="accordionSidebar" style="background-color: #064635">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <img src="https://i.postimg.cc/Qd2Pfmbr/logo.png" alt="" width="45px" height="40px" class="d-inline-block align-text-button">
        <div class="sidebar-brand-text fs-6">PSB Bustanul Falah</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-2">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('dashboard') ">
        <a class="nav-link" href="{{ route('admin.home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span >Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider my-2">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-copy"></i>
            <span>Pendaftaran</span>
        </a>
        <div id="collapseUtilities" class="collapse @yield('main')" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Dokemen Pendaftaran</h6>
                <a class="collapse-item @yield('datapendaftar')" href="{{ route('admin.dataPendaftar') }}">Data Pendaftar</a>
                <a class="collapse-item @yield('datasantri')" href="{{ route('admin.dataSantri') }}">Data Santri</a>
                <a class="collapse-item  @yield('nilai')" href="{{ route('admin.nilai') }}">Nilai</a>
                <a class="collapse-item @yield('kelas')" href={{ route('admin.kelas') }}>Data Kelas</a>
                <a class="collapse-item @yield('tahunajaran')" href={{ route('admin.tahunAjaran') }}>Tahun Ajaran</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider my-2">

    <!-- Nav Item -  -->
    <li class="nav-item @yield('pengumuman')" >
        <a class="nav-link" href="{{ route('admin.pengumuman') }}">
            <i class="fa-solid fa-bullhorn"></i>
            <span >Pengumuman</span>
        </a>
    </li>
    <hr class="sidebar-divider my-2">

    <!-- Nav Item - Pembayaran -->
    <li class="nav-item @yield('pembayaran')">
        <a class="nav-link" href="{{ route('admin.pembayaran') }}">
            <i class="fas fa-wallet"></i>
            <span >Pembayaran</span>
        </a>
    </li>

    <!-- Divider -->
    {{-- <hr class="sidebar-divider"> --}}


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-3">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
