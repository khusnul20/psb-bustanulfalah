@extends("sb_user.app")
@section('title', 'Dashboard User' )
@section('home', 'active' )


@section('content')

    <strong class="h5 mb-4 font-weight-bold text-gray-800">
        Selamat Datang,
    </strong> <span><strong class="fw-bold fs-5" style="color: #1acf9f">{{ auth()->user()->name }}</strong></span>
    <hr class="bg-dark">
    <div class="row justify-content-center mt-2">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2" style="background-color: #A1B57D">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col text-center">
                            <a href="{{ route('user.index') }}" class="btn border-0">
                                <i class="fa-solid fa-print fa-3x text-light mt-2"></i>
                                <h5 class="text-light mt-3">Cetak Formulir</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2" style="background-color: #519259">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col text-center">
                            <a href="{{ route('user.bukti') }}" class="btn border-0">
                                <i class="fa-solid fa-wallet fa-3x text-light mt-2"></i>
                                <h5 class="text-light mt-3">Pembayaran</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2" style="background-color: #519259">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col text-center">
                            <a href="{{ route('user.hasiltes') }}" class="btn border-0">
                                <i class="fa-solid fa-file-lines fa-3x text-light mt-2"></i>
                                <h5 class="text-light mt-3">Hasil Tes</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="bg-dark">

        {{-- @if (Auth::guard('web')->user()->status == 1)
        <div class="card border-success">
            <div class="card-header text-light text-center bg-success">
                    <span class="fw-bold fs-5">SELAMAT</span>
            </div>
            <div class="card-body text-center">
                <h6 class="card-title">Anda di telah diterima di</h6>
                <h5 class="fw-bold text-dark">PONDOK PESANTREN BUSTANUL FALAH GENTENG</h5>
                <h6 class="card-title">Harap untuk melakukan Pembayaran Administrasi Pendaftar <a href="{{ route('user.bukti') }}">disini</a> </h6>
                <hr class="bg-dark">
                <p class="card-text">Harap mencetak bukti penerimaan santri baru melalui tombol cetak dibawah ini</p>
                <a href="#" class="btn btn-primary">Cetak</a>
            </div>
        </div>
        @else
        <div class="card border-danger">
            <div class="card-header text-light text-center bg-danger">
                    <span class="fw-bold fs-5">SEDANG PROSES VERIFIKASI</span>
            </div>
            <div class="card-body text-center">
                <h6 class="card-title">Data anda sedang di proses oleh pihak</h6>
                <h5 class="fw-bold text-dark">PONDOK PESANTREN BUSTANUL FALAH GENTENG</h5>
                <h6 class="card-title">Harap untuk menunggu dan cek website secara berkala</h6>
            </div>
        </div>
        @endif --}}



    @foreach ($pengumuman as $data)
    @if ($data->tutup == 1)

        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Pengumuman</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body text-center">
                    <h5 class="card-title text-dark fw-bold">Hallo!! {{ Auth::guard('web')->user()->name }}</h5>
                    <p class="card-text">Silahkan klik tombol dibawah untuk melihat pengumuman!</p>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#lihatPengumuman" data-bs-whatever="@mdo">Lihat Detail</button>
                </div>
                <div class="card-footer text-center">
                    {{ $data->created_at }}
                </div>
            </div>
        </div>
    @endif
    @endforeach

    <!-- Modal -->
    @foreach ($pengumuman as $data)
    <div class="modal fade" id="lihatPengumuman" tabindex="-1" aria-labelledby="lihatPengumuman" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <div class="text-dark fw-bold">
                        Detail Pengumuman
                    </div> --}}
                </div>
                <div class="modal-body">
                    <div class="card-body border" style="background-color: rgb(255, 255, 255)">
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <img src="https://i.postimg.cc/Qd2Pfmbr/logo.png" style="margin-left: 90px" alt="logo" width="110px">
                            </div>
                            <div class="col-md-6 ">
                                <div class="text-center">
                                    <h5 class="fw-bold text-dark mt-2">YAYASAN BUSTANUL FALAH</h5>
                                    <h2 class="fw-bold lh-1" style="color: rgb(71, 211, 211)">PONPES BUSTANUL FALAH</h2>
                                    <p class="lh-1 text-dark" style="font-size: 12px">Jl Tebu Indah 99 Kembiritan Genteng Banyuwangi ( 68465 ) <span>Email : ponpesbustanulfalahgenteng@gmail.com</span></p>
                                </div>
                            </div>
                            <div style="margin-left: 100px; margin-right: 100px; color: black">
                                <hr style="background-color: black">
                                <h5 class="text-center fw-bold" style="color: rgba(0, 0, 0, 0.726)">Pengumuman {{ $data->pengumuman }}</h5>
                                <div class="table-responsive px-5 ">
                                    <table class="table table-bordered">
                                        <tbody class="">
                                            <tr>
                                                <td class="fw-bold">Pengumuman</td>
                                                <td>{{ $data->pengumuman }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Tanggal</td>
                                                <td>{{ date('d-m-Y', strtotime($data->tanggal))  }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Jam</td>
                                                <td>{{ date('h:s', strtotime($data->pukul))  }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Keterangan</td>
                                                <td>{!! $data->deskripsi !!}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    {{-- <input class="btn btn-primary btn-sm" type="submit" value="Submit"> --}}
                </div>
            </div>
        </div>
    </div>
     @endforeach



@endsection
