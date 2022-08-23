@extends("sb_admin.app")
@section('title', 'Data Kelas' )
@section('kelas', 'active' )
@section('main', 'show' )

@section('content')
<div class="d-grid gap-2 d-md-flex justify-content-md-end">

</div>
<div class="card mt-4">
    <div class="card-header text-light fw-bold fs-6" style="background-color: #064635">
        Data Kelas
    </div>
    <div class="card-body shadow">
        <div class="col">
            <button type="button" class="btn btn-sm mb-3 text-light" style="background-color: #28544B" data-bs-toggle="modal" data-bs-target="#tambahDataKelas"><i class="fa-solid fa-plus me-2"></i>Add Kelas</button>
            <table class="table table-hover table-bordered table-responsive-lg">
                <thead class="text-dark fw-bold">
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Madrasah</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelas as $row)
                    <tr>
                        <th scope="row" class="fw-bold text-dark col-1 text-center">{{ $loop->iteration}}</th>
                        <td>{{ $row->kelas }}</td>
                        <td >{{ $row->madrasah }}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $row->id }}">
                                Lihat
                            </button>
                        </td>
                        <td class="col-2 text-center">
                            <a class="btn btn-warning btn-sm" role="button" data-bs-toggle="modal" data-bs-target="#editKelas-{{ $row->id }}"><i class="fa-solid fa-pen"></i></a>
                            <a class="btn btn-danger btn-sm" href="/admin/konfirmasiKelas/{{ $row->id }}" role="button"><i class="fa-solid fa-trash-can g-2"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Lihat Detail Data Kelas --}}
@foreach ($kelas as $data)
<div class="modal fade" id="exampleModal-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header text-center" style="background-color: #064635">
                <h6 class="modal-title fw-bold text-light" style="color: black" id="exampleModalLabel">Detail Data Kelas</h6>
            </div>
            <div class="modal-body">
                <div class="card-body">
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
                    <div class="text-center font-weight-bold mb-2" style="color: black">
                        Kelas {{ $data->kelas }} {{ $data->madrasah }}
                    </div>
                    <table class="table table-bordered" >
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">No.Pendaftaran</th>
                                <th scope="col">Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->santri as $row)
                            <tr style="color: rgba(0, 0, 0, 0.705); font-size: 14px">
                                <th scope="row">{{ $loop->iteration}}</th>
                                <td>{{ $row->no_pend }}</td>
                                <td>{{ $row->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

{{-- Tambah Kelas --}}
<div class="modal fade" id="tambahDataKelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <form action="{{ route('admin.insertKelas') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 text-center">
                        <Strong>Tambah Data Kelas</Strong>
                        <hr>
                    </div>
                        <div class="form-group">
                            <label for="kelas" class="form-label text-dark fw-bold">Kelas</label>
                            <input type="text" class="form-control" name="kelas" id="kelas" required value="{{ old('kelas') }}">
                            @error('kelas')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="madrasah" class="form-label text-dark fw-bold">Madrasah</label>
                            <input type="text" class="form-control" name="madrasah" id="madrasah" required value="{{ old('madrasah') }}">
                            @error('madrasah')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-primary" type="submit" value="Submit">Simpan</button>
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Data Kelas -->
@foreach ($kelas as $data)
    <div class="modal fade" id="editKelas-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="/admin/updateKelas/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="mb-3 text-center">
                            <Strong>Edit Data Kelas</Strong>
                            <hr>
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" name="kelas" class="form-control @error('kelas') is-invalid @enderror" id="kelas" required value="{{ $data->kelas }}">
                            @error('kelas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="madrasah" class="form-label">Madrasah</label>
                            <input type="text" name="madrasah" class="form-control @error('madrasah') is-invalid @enderror" id="madrasah" required value="{{ $data->madrasah }}">
                            @error('madrasah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <input class="btn btn-primary" type="submit" value="Submit">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endforeach





@endsection
