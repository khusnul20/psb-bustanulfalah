@extends("sb_admin.app")
@section('title', 'Admin | Pengumuman' )
@section('pengumuman', 'active' )


@section('content')

<div class="card mt-4">
    <div class="card-header text-light fw-bold fs-6" style="background-color: #064635">
        Pengumuman
    </div>
    <div class="card-body shadow">
        <div class="col">
            <div class="button mb-2">
                <button type="button" class="btn btn-sm mb-3 text-light" style="background-color: #28544B" data-bs-toggle="modal" data-bs-target="#tambahPengumuman" data-bs-whatever="@mdo"><i class="fa-solid fa-plus me-2"></i>Add Pengumuman</button>
            </div>
            <table class="table table-bordered table-hover table-sm table-responsive-lg">
                <thead class="text-dark fw-bold ">
                    <tr class="text-center" style="font-size: 15px">
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Judul</th>
                        {{-- <th scope="col">Deskripsi</th> --}}
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($p as $row)
                    <tr style="font-size: 13px" class="text-dark">
                        <th width='4%' scope="row">{{ $loop->iteration}}</th>
                        <td width='15%'>{{ Carbon\Carbon::parse($row->tanggal)->translatedFormat('l, d F Y') }}</td>
                        <td width='10%'>{{ $row->pukul }}</td>
                        <td width='10%'>{{ $row->pengumuman }}</td>
                        {{-- <td width='10%'>{!! $row->deskripsi !!}</td> --}}
                        <td width='5%' class="text-center">
                            @if ($row->tutup == 1)
                                <a href="/admin/tutup/{{ $row->id }}" class="btn btn-sm btn-danger fw-bold ">Tutup</a>
                            @else
                                <a href="/admin/tutup/{{ $row->id }}" class="btn btn-sm btn-success fw-bold">Tampilkan</a>
                            @endif
                        </td>
                        <td width='10%' class="text-center">
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#lihatPengumuman-{{ $row->id }}" data-bs-whatever="@mdo"><i class="fa-solid fa-eye "></i></button>
                            <a class="btn btn-warning btn-sm" role="button" data-bs-toggle="modal" data-bs-target="#editDataSantri-{{ $row->id }}"><i class="fa-solid fa-pen"></i></a>
                            <a class="btn btn-danger btn-sm" href="/admin/deletePengumuman/{{ $row->id }}" role="button"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Tambah Pengumuman -->
<div class="modal fade" id="tambahPengumuman" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('admin.insertPengumuman') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header text-light" style="background-color: #064635">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengumuman</h5>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="tanggal" class="form-label text-dark fw-bold">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" required value="{{ old('tanggal') }}">
                            @error('tanggal')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pukul" class="form-label text-dark fw-bold">Pukul</label>
                            <input type="time" class="form-control" name="pukul" id="pukul" required value="{{ old('pukul') }}">
                            @error('pukul')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pengumuman" class="form-label text-dark fw-bold">Pengumuman</label>
                            <input type="text" class="form-control" name="pengumuman" id="pengumuman" required value="{{ old('pengumuman') }}">
                            @error('pengumuman')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="form-label text-dark fw-bold">Deskripsi</label>
                            <input id="deskripsi" type="hidden" name="deskripsi" required value="{{ old('deskripsi') }}">
                            <trix-editor input="deskripsi" ></trix-editor>
                            @error('deskripsi')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                    <input class="btn btn-primary btn-sm" type="submit" value="Simpan">
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Lihat Pengumuman -->
@foreach ($p as $data)
<div class="modal fade" id="lihatPengumuman-{{ $data->id }}" tabindex="-1" aria-labelledby="tambahPengumuman" aria-hidden="true">
    <form action="{{ route('admin.insertPengumuman') }}" method="POST" enctype="multipart/form-data">
        @csrf
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
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
                    {{-- <input class="btn btn-primary btn-sm" type="submit" value="Submit"> --}}
                </div>
            </div>
        </div>
    </form>
</div>
@endforeach


<!-- Edit Pengumuman -->
@foreach ($p as $data)
    <div class="modal fade" id="editDataSantri-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="/admin/updatePengumuman/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title fw-bold" id="staticBackdropLabel">Edit Pengumuman</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tanggal" class="form-label text-dark fw-bold">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ $data->tanggal }}">
                            @error('tanggal')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pukul" class="form-label text-dark fw-bold">Pukul</label>
                            <input type="time" class="form-control" name="pukul" id="pukul"value="{{ $data->pukul }}">
                            @error('pukul')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pengumuman" class="form-label text-dark fw-bold">Pengumuman</label>
                            <input type="text" class="form-control" name="pengumuman" id="pengumuman" value="{{ $data->pengumuman }}">
                            @error('pengumuman')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="form-label text-dark fw-bold">Deskripsi</label>
                            @error('deskripsi')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <input id="body" type="hidden" name="deskripsi" value="{{ old('deskripsi', $data->deskripsi) }}">
                            <trix-editor input="body"></trix-editor>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <input class="btn btn-primary" type="submit" value="Simpan">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endforeach






@endsection
