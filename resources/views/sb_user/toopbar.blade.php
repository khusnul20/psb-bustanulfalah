<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        @auth

        <li class="nav-item dropdown no-arrow ">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left: 10rem">
                <i class="fas fa-bell fa-fw" ></i>
                @if ($jumlah_pengumuman !==0)
                <span class="badge badge-danger badge-counter" style="margin-left: 15px">{{ $jumlah_pengumuman }}</span>
                @endif
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Pengumuman
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    @foreach ($pengumuman as $data)
                    @if ($data->tutup == 1)
                    <div>
                        <div class="small text-gray-500">{{ $data->created_at }}</div>
                        <span class="font-weight-bold">{{ $data->pengumuman }}</span>
                    </div>
                    @endif
                    @endforeach
                </a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <strong class="mr-3 d-none d-lg-inline text-dark">{{ auth()->user()->name }}</strong>
                <img src="{{ asset('upload/image/'.Auth::guard('web')->user()->image) }}" class="img-profile rounded-circle" alt="image" width="60px" height="60">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('user.profil') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        logout
                </a>
            </div>
        </li>

        @endauth


    </ul>


</nav>


{{-- {{ Modal Logout }} --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('user.logout') }}" method="post">
        @csrf
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin keluar dari aplikasi ini?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cencel</button>
            <button type="submit" class="btn btn-primary">Logout</button>
            </div>
        </div>
    </div>
    </form>
</div>
