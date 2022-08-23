@extends("sb_admin.app")
@section('title', 'Admin | Pembayaran' )
@section('pembayaran', 'active' )


@section('content')

<div class="card mt-4">
    <div class="card-header text-light fw-bold fs-6" style="background-color: #064635">
        Data Pembayaran Pendaftaran Calon Santri
    </div>
    <div class="card-body shadow">
            <table class="table table-bordered table-hover table-responsive-lg table-sm">
                <thead class="text-dark fw-bold ">
                    <tr class="text-center" style="font-size: 13px">
                        <th scope="col">No</th>
                        <th scope="col">No.Pendaftaran</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Transaksi</th>
                        <th scope="col">Waktu Transaksi</th>
                        <th scope="col">Foto Bukti TF</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bukti as  $row)
                    <tr style="font-size: 12px">
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>{{ $row->user->no_pend }}</td>
                        <td>{{ $row->user->name }}</td>
                        <td >
                            {{ date('d-m-Y', strtotime($row->tanggal_tf))  }}
                        </td>
                        <td>
                            {{ $row->waktu_tf  }}
                        </td>
                        <td>
                            <img src="{{ asset('upload/bukti/'.$row->foto) }}" alt="image" width="40px" >
                        </td>
                        <td class="text-center">
                            <div class="badge border {{ ($row->status == 1) ? 'border-success' : 'border-secondary' }} text-wrap py-2" style="width: 120px;">
                                <span class=" text-uppercase fst-italic {{ ($row->status == 1) ? 'text-success' : 'text-secondary' }}" style="font-size: 12px;">{{ ($row->status == 1) ? 'Terverifikasi' : 'Belum Verifikasi' }}</span>
                            </div>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-info btn-sm me-1" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $row->id }}"><i class="fa-solid fa-eye"></i></a>
                            <a class="btn btn-danger btn-sm" href="/admin/deleteTF/{{ $row->id }}" role="button"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $user->links() }} --}}
            <small id="pengumuman" class="form-text text-danger fst-italic" style="font-size: 12px">
                * Harap mengecek bukti foto apakah waktu dan tanggal transaksi sesuai dengan yang di inputkan calon santri baru ! <br>
                * Jika Tanggal atau Waktu Transfer Salah Silahkah <span class="fw-bold">Klik Tombol Salah</span> dan <span class="fw-bold">Tombol Hapus</span> Untuk Memperingati Santri Upload Bukti Kembali!
            </small>
        {{-- </div> --}}
    </div>
</div>


@foreach ($bukti as $data)
<!-- Modal -->
    <div class="modal fade" id="exampleModal-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg  modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header text-light" style="background-color: #064635">
            <h5 class="modal-title" id="exampleModalLabel">Detail Bukti Pembayaran</h5>
            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>No.Pendaftaran</th>
                            <td>{{ $data->user->no_pend }}</td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>{{ $data->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Transaksi</th>
                            <td>{{ date('d-m-Y', strtotime($data->tanggal_tf))}}</td>
                        </tr>
                        <tr>
                            <th>Jam Transaksi</th>
                            <td>{{ $data->waktu_tf }}</td>
                        </tr>
                        <tr>
                            <th>Foto Bukti Transaksi</th>
                            <td>
                                <img src="{{ asset('upload/bukti/'.$data->foto) }}" alt="image" width="200px" class="zoom">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                @if ($data->status == 1)
                    <a href="/admin/status/{{ $data->id }}" class="btn btn-sm {{ ($data->status == 1) ? ' btn-outline-danger' : ' btn-outline-primary' }}">Batal Verifikasi</a>
                @else
                    <a href="/admin/status/{{ $data->id }}" class="btn btn-sm btn-outline-primary fw-bold"> Verifikasi</a>
                @endif
                {{-- <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button> --}}
            </div>
        </div>
        </div>
    </div>
@endforeach


@endsection
