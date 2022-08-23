<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow ">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        @auth
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <strong class="mr-2 d-none d-lg-inline text-dark">{{ Auth::guard('admin')->user()->name }}</strong>
                <div class="topbar-divider d-none d-sm-block"></div>
                @if (Auth::guard('admin')->user()->image)
                    <img src="{{ asset('upload/admin/'.Auth::guard('admin')->user()->image) }}" class="img-profile rounded-circle" alt="image" width="50px">
                @else
                    <img src="https://i.postimg.cc/gk2pZxXw/logoku-removebg-preview.png" alt="{{ Auth::guard('admin')->user()->name }}" class="img-profile rounded-circle" width="50px">
                @endif

            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('admin.profil') }}">
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
    <form action="{{ route('admin.logout') }}" method="post">
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
