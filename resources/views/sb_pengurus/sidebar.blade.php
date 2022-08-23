<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #064635">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <img src="https://i.postimg.cc/Qd2Pfmbr/logo.png" alt="" width="45px" height="40px" class="d-inline-block align-text-button">
        <div class="sidebar-brand-text fs-6">PSB Bustanul Falah</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-2">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('dashboard')">
        <a class="nav-link" href="{{ route('pengurus.home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span >Dashboard</span>
        </a>
    </li>


    <hr class="sidebar-divider my-2">

    <!-- Nav Item -  -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-copy"></i>
            <span>Tes</span>
        </a>
        <div id="collapseUtilities" class="collapse @yield('main')" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Input Nilai Tes</h6>
                <a class="collapse-item @yield('nilaiAlquran')" href="{{ route('pengurus.nilaiAlquran') }}">Tes Al-Qur'an</a>
                <a class="collapse-item @yield('nilaiKitab')" href="{{ route('pengurus.nilaiKitab') }}">Tes Kitab Mabadi Fiqih</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider my-2">

    <!-- Nav Item -  -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-copy"></i>
            <span>Hasil Tes</span>
        </a>
        <div id="collapseUtilities2" class="collapse @yield('main2')" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Dokumen Hasil Tes</h6>
                <a class="collapse-item @yield('tesAlquran')" href="{{ route('pengurus.tesAlquran') }}">Tes Al-Qur'an</a>
                <a class="collapse-item @yield('tesKitab')" href="{{ route('pengurus.tesKitab') }}">Tes Kitab Mabadi Fiqih</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider my-2">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-3">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
