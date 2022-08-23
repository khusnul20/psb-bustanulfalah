@extends("sb_admin.app")
@section('title', 'Dashboard Admin' )
@section('dashboard', 'active' )

@section('content')
<strong class="h5 mb-4 font-weight-bold text-gray-800">
    Selamat Datang
</strong> <span><strong class="fw-bold fs-5" style="color: #1acf9f">{{ auth()->user()->name }}</strong></span>
<hr class="sidebar-divider">
<div class="row justify-content-center mt-4">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow h-100 py-2" style="background-color: #064635">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-4 font-weight-bold text-light">{{$jumlah}}</div>
                        <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                            Jumlah Pendaftar
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow h-100 py-2" style="background-color: #064635">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-4 font-weight-bold text-light">{{ $jumlah }}</div>
                        <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                            Jumlah Santri
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow h-100 py-2" style="background-color: #064635">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-4 font-weight-bold text-light">{{  $jumlahKelas }}</div>
                        <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                            Jumlah Kelas
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow h-100 py-2" style="background-color: #064635">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-4 font-weight-bold text-light">{{  $jumlahBuktitf }}</div>
                        <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                            Pembayaran
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="card" style="width: 60rem;">
        <div class="card-body text-center">
            <h5 class="font-weight-bold">Welcome</h5>
            <p class="card-text">Sedang Berada di halaman Administrator Aplikasi PSB Pondok Pesantren Bustanul Falah Genteng</p>
            <img src="https://i.postimg.cc/Qd2Pfmbr/logo.png" alt="" width="150px" class="d-inline-block align-text-button">
            <h5 class="card-text font-weight-bold mt-3">Pondok Pesantren Bustanul Falah Genteng</h5>
        </div>
    </div>
</div>
@endsection
