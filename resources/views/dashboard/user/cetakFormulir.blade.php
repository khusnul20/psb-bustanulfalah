@extends("sb_user.app")
@section('title', 'User | Cetak Formulir' )
@section('cetak', 'active' )


@section('content')
    @if (Auth::guard('web')->user()->status == 1)
    <div class="alert alert-success text-center" role="alert">
        Terimakasih sudah mendaftar pada Pondok Pesantren Bustanul Falah Genteng. Anda berhasil melakukan pendaftaran dan diterima sebagai santri baru, Silahkan cetak bukti pendaftaran ada untuk berkas pendaftaran !
    </div>
    @endif

    <div class="card mt-4">
        <div class="card-header text-light fw-bold" style="background-color: #064635">
            Status Pendaftaran
        </div>
        <div class="card-body shadow">
            <div class="col">
                <table class="table table-bordered table-responsive-lg">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.Pendaftaran</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>{{ Auth::guard('web')->user()->no_pend }}</td>
                            <td>{{ Auth::guard('web')->user()->name }}</td>
                            {{-- <td>{{ Auth::guard('web')->user()->status }}</td> --}}
                            <td class="text-center">
                            <div class="badge border {{ (Auth::guard('web')->user()->status == 1) ? 'border-success' : 'border-secondary' }} text-wrap py-2" style="width: 150px;">
                                <span class=" text-uppercase fst-italic {{ (Auth::guard('web')->user()->status == 1) ? 'text-success' : 'text-secondary' }}" style="font-size: 15px;">{{ (Auth::guard('web')->user()->status == 1) ? 'Diterima' : 'Tidak Diterima' }}</span>
                            </div>
                            </td>
                            <td>
                                @if (Auth::guard('web')->user()->status == 1)
                                    <a href="/user/cetakformulir/{{ Auth::guard('web')->user()->id }}" type="button" class="btn btn-primary btn-sm">Cetak Bukti</a>
                                @else
                                <a href="/user/cetakformulir/{{ Auth::guard('web')->user()->id }}" type="button" class="btn btn-primary btn-sm disabled">Cetak Bukti</a>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                <small id="pengumuman" class="form-text text-danger fst-italic fw-bold" style="font-size: 12px">
                    * Jangan Lupa Cetak Bukti Pendaftaran !

                </small>
            </div>
        </div>
    </div>

@endsection
