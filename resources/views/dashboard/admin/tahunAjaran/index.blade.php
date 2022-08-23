@extends("sb_admin.app")
@section('title', 'Tahun Ajaran' )
@section('tahunajaran', 'active' )
@section('main', 'show' )

@section('content')

<div class="card mt-4">
    <div class="card-header text-light fw-bold fs-6" style="background-color: #064635">
        Tahun Ajaran
    </div>
    <div class="card-body shadow">
        <div class="col">
            <button type="button" class="btn btn-sm mb-3 text-light" style="background-color: #28544B" data-bs-toggle="modal" data-bs-target="#tambahTahunajaran"><i class="fa-solid fa-plus me-2"></i>Add Tahun Ajaran</button>
            <table class="table table-bordered table-responsive-lg">
                <thead class="text-dark">
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Tahun Ajaran</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tahunAjaran as $ta)
                    <tr class="text-center">
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#tahunAjaran-{{ $ta->id }}">
                                {{ $ta->tahun_ajaran }}
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-warning btn-sm" role="button" data-bs-toggle="modal" data-bs-target="#editTA-{{ $ta->id }}">Edit</a>
                            <a class="btn btn-danger btn-sm" href="/admin/konfirmasi/{{ $ta->id }}" role="button">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach ($tahunAjaran as $data)
<div class="modal fade" id="tahunAjaran-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @csrf
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header text-center" style="background-color: #064635">
                    <h6 class="modal-title fw-bold text-light" style="color: black" id="exampleModalLabel">Detail Data Tahun Ajaran </h6>
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
                            Tahun Ajaran {{ $data->tahun_ajaran }}
                        </div>
                        <table class=" table table-bordered">
                            <thead>
                                <tr style="color: rgba(0, 0, 0, 0.76)">
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col">Nomor Pendaftaran</th>
                                    <th scope="col">Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->user as $row)
                                <tr style="color: rgba(0, 0, 0, 0.705); font-size: 14px">
                                    <th scope="row" class="text-center">{{ $loop->iteration}}</th>
                                    <td>{{ $row->no_pend }}</td>
                                    <td>{{ $row->name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
</div>
@endforeach


{{-- Tambah Tahun Ajaran --}}
<div class="modal fade" id="tambahTahunajaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('admin.insertTA') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                    <div class="mb-3 text-center text-dark">
                        <Strong>Tambah Tahun Ajaran</Strong>
                        <hr>
                    </div>
                    <div class="mb-3">
                        <label for="tahun_ajaran" class="mb-1 text-dark fw-bold">Tahun Ajaran</label>
                        <input type="text" name="tahun_ajaran" class="form-control @error('tahun_ajaran') is-invalid @enderror" placeholder="2019-2020" id="tahun_ajaran" required value="{{ old('tahun_ajaran') }}">
                        @error('tahun_ajaran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
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



<!-- Edit Tahun Ajaran -->
@foreach ($tahunAjaran as $data)
<div class="modal fade" id="editTA-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="/admin/updateTA/{{ $data->id }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-3 text-center">
                    <Strong>Edit Tahun Ajaran</Strong>
                    <hr>
                </div>
                <div class="mb-3">
                    <label for="tahun_ajaran" class="mb-1 text-dark fw-bold">Tahun Ajaran :</label>
                    <input type="text" name="tahun_ajaran" class="form-control @error('tahun_ajaran') is-invalid @enderror" id="tahun_ajaran" required value="{{ $data->tahun_ajaran }}" style="color: black">
                    @error('tahun_ajaran')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <input class="btn btn-primary" type="submit" value="Simpan">
            </div>
        </div>
    </div>
    </form>
</div>
@endforeach


@endsection
