@extends("sb_admin.app")
@section('title', 'Data Pendaftar' )
@section('datapendaftar', 'active' )
@section('main', 'show' )

@section('content')
    {{-- <strong class="fs-4 fw-bold text-dark">Halaman</strong> <span class="fs-4 fw-bold" style="color: rgb(11, 156, 108)">Data Pendaftar</span> --}}
    <div class="card shadow">
        <div class="card-header fs-5 fw-bold text-light text-center" style="background-color: #064635">
            Data Pendaftar
        </div>
        <div class="card-body" >
            <table class="table table-bordered table-hover table-responsive-lg table-sm">
                <thead class="text-dark fw-bold ">
                    <tr style="font-size: 14px">
                        <th scope="col" class="text-center">No</th>
                        <th scope="col">No.Pendaftaran</th>
                        <th scope="col">Tgl Daftar</th>
                        <th scope="col">Nisn</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tempat & Tanggal Lahir</th>
                        <th scope="col">Foto</th>
                        {{-- <th scope="col">Gender</th> --}}
                        <th scope="col">Nama Ayah</th>
                        <th scope="col">Status</th>
                        <th scope="col">Verifikasi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($user as $index => $row)
                    <tr style="font-size: 12px">
                        <th width='3%' scope="row" class="text-center" >{{ $index + $user->firstItem() }}</th>
                        <td width='3%'>{{ $row->no_pend}}</td>
                        <td width='10%'>{{ date('d-m-Y', strtotime($row->created_at))  }}</td>
                        <td width='3%'>{{ $row->nisn }}</td>
                        <td width='13%'>{{ $row->name }}</td>
                        <td >{{ $row->tempatLahir }},{{ date('d-m-Y', strtotime($row->tanggalLahir)) }}</td>
                        <td>
                            <img src="{{ asset('upload/image/'.$row->image) }}" alt="image" width="30px">
                        </td>
                        {{-- <td>{{ $row->jenisKelamin }}</td> --}}
                        <td>{{ $row->nameAyah }}</td>
                        <td class="text-center">
                            <div class="badge border {{ ($row->status == 1) ? 'border-success' : 'border-secondary' }} text-wrap py-2" style="width: 100px;">
                                <span class=" text-uppercase fst-italic {{ ($row->status == 1) ? 'text-success' : 'text-secondary' }}" style="font-size: 10px;">{{ ($row->status == 1) ? 'DiVerifikasi' : 'Belum Diverifikasi' }}</span>
                            </div>
                            </td>
                        <td class="text-center">
                            @if ($row->status == 1)
                                <a href="/admin/statusCS/{{ $row->id }}" class="btn btn-sm btn-danger">Tidak</a>
                            @else
                                <a href="/admin/statusCS/{{ $row->id }}" class="btn btn-sm btn-primary">Terima</a>
                            @endif
                        </td>
                        <td class="text-center">
                            <a class="btn btn-success btn-sm me-1" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal2-{{ $row->id }}"><i class="fa-solid fa-eye"></i></a>
                            <a class="btn btn-danger btn-sm" href="/admin/delete/{{ $row->id }}" role="button"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $user->links() }}
            <small id="user" class="form-text text-danger fst-italic" style="font-size: 12px">
                * Tekan tombol terima jika anda sudah melakukan pengecekan data calon santri
            </small>
        </div>
    </div>


<!-- Show Data Santri -->
@foreach ($user as $row)
    <div class="modal fade" id="exampleModal2-{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header text-light" style="background-color: #064635">
            <h5 class="modal-title" id="exampleModalLabel">Data Detail Calon Santri</h5>
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
                            <hr>
                        </div>
                    </div>
                    <h5 class="text-center fw-bold" style="color: rgba(0, 0, 0, 0.726)">FORMULIR PENDAFTARAN SANTRI BARU</h5>
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-2">
                            <div class="text-center">
                                <img src="{{ asset('upload/image/'.$row->image) }}" alt="image" width="150px">
                            </div>
                        </div>
                        <div class="col-md-8" style="color: rgba(0, 0, 0, 0.726)">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th scope="col">No.Pendadtaran </th>
                                        <td>: {{ $row->no_pend }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">NISN </th>
                                        <td>: {{ $row->nisn}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Nama </th>
                                        <td>: {{ $row->name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Tempat & Tanggal Lahir </th>
                                        <td>: {{ $row->tempatLahir}}, {{ Carbon\Carbon::parse($row->tanggalLahir)->translatedFormat('d F Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Tahun Ajaran </th>
                                        <td>: {{ $row->tahunAjaran->tahun_ajaran}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Jenis Kemain</th>
                                        <td>: {{ $row->jenisKelamin }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Anak Ke</th>
                                        <td>: {{ $row->anakKe }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Jumlah Saudara</th>
                                        <td>: {{ $row->jumlahSaudara }}</td>
                                    </tr>
                                    {{-- <hr> --}}
                                    <tr>
                                        <th scope="col">Nama Ayah</th>
                                        <td>: {{ $row->nameAyah }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Pekerjaan Ayah</th>
                                        <td>: {{ $row->pekerjaanAyah}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Penghasilan Ayah </th>
                                        <td>: {{ $row->penghasilanAyah}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">No.Telepon</th>
                                        <td>: {{ $row->noAyah}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Alamat Ayah</th>
                                        <td>: {{ $row->alamatAyah}}</td>
                                    </tr>
                                    {{-- <hr> --}}
                                    <tr>
                                        <th scope="col">Nama Ibu</th>
                                        <td>: {{ $row->nameIbu }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Pekerjaan Ibu</th>
                                        <td>: {{ $row->pekerjaanIbu}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Penghasilan Ibu </th>
                                        <td>: {{ $row->penghasilanIbu}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">No.Telepon</th>
                                        <td>: {{ $row->noIbu}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Alamat Ibu</th>
                                        <td>: {{ $row->alamatIbu}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Foto Kartu Keluarga</th>
                                        <td>:
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#lihatKK-{{ $row->id }}">
                                            Lihat KK</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
@endforeach


<!-- Foto KK -->
@foreach ($user as $data)
<div class="modal fade" id="lihatKK-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center font-weight-bold">
                    Detail Foto Kartu Keluarga
                </div>
                <hr class="bg-dark">
                <div class="text-center justify-content-between">
                    <h6 class="text-drak font-weight-bold">{{ $data->name }}</h6>
                </div>
                <div class="text-center">
                    <img src="{{ asset('upload/FotoKK/'.$data->foto_kk) }}" alt="image" width="600px">
                </div>
                <div class="text-center">
                    <small class="text-danger font-weight-bold">* Klik Kanan Untuk Simpan</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
