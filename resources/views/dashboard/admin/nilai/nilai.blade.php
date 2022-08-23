@extends("sb_admin.app")
@section('title', 'Nilai' )
@section('nilai', 'active' )
@section('main', 'show' )

@section('content')

<div class="card mt-4">
    <div class="card-header text-light fw-bold fs-6" style="background-color: #064635">
        Hasil Tes Calon Santri
    </div>

    <div class="card-body shadow">
        <div class="row mb-3 ">
            <div class="button d-flex justify-content-between g-2">
                <form action="{{ route('admin.nilai') }}" method="get" class="d-flex" role="search">
                    <input class="form-control form-control-sm me-2" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ request('search') }}" >
                    <button class="btn text-light btn-sm" type="submit" style=" background-color: #064635">Search</button>
                </form>
                <div>
                    @if (Auth::guard('admin')->user()->tutup == 1)
                <a href="/admin/tutupNilai/{{ Auth::guard('admin')->user()->id }}" class="btn btn-sm btn-danger fw-bold ">Tutup</a>
                @else
                <a href="/admin/tutupNilai/{{ Auth::guard('admin')->user()->id }}" class="btn btn-sm btn-primary fw-bold">Tampilkan</a>
                @endif
                </div>

            </div>
            <div class="col-sm-6 offset-sm-2 col-md-0 offset-md-0 ">

            </div>
        </div>
        <table class="table table-bordered table-hover table-responsive-lg table-sm">
            <thead>
                <tr class="text-center" style="font-size: 13px">
                    <th scope="col">No</th>
                    <th scope="col">No.Pendaftaran</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Total Nilai Al-Qur'an</th>
                    <th scope="col">Total Nilai Kitab Mabadi Fiqih</th>
                    <th scope="col">Kelas</th>
                    {{-- <th scope="col">Status</th> --}}
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $row)
                <tr style="font-size: 13px">
                    <th scope="row" class="text-center">{{ $loop->iteration}}</th>
                    <td>{{ $row->no_pend }}</td>
                    <td>{{ $row->name }}</td>
                    <td class="text-center">
                        <img src="{{ asset('upload/image/'.$row->image) }}" alt="image" width="20px">
                    </td>
                    <td class="text-center">
                        @foreach($row->nilaiAlquran as $t)
                            <a href="" data-bs-toggle="modal" data-bs-target="#editNilaiAlquran-{{ $t->id }}">
                                {{ $t->hasil }}
                            </a>
                        @endforeach
                    </td>
                    <td class="text-center">
                        @foreach($row->NilaiKitab as $t)
                        <a href="" data-bs-toggle="modal" data-bs-target="#editNilaiKitab-{{ $t->id }}">
                            {{ $t->hasil }}
                        </a>
                        @endforeach
                    </td>
                    <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#editKelas-{{ $row->id }}">
                            {{ $row->kelas->kelas }} {{ $row->kelas->madrasah }}
                        </a>
                    </td>
                    {{-- <td width='5%' class="text-center">
                        @if ($row->tutup == 1)
                            <a href="/admin/tutupNilai/{{ $row->id }}" class="btn btn-sm btn-danger fw-bold ">Tutup</a>
                        @else
                            <a href="/admin/tutupNilai/{{ $row->id }}" class="btn btn-sm btn-success fw-bold">Tampilkan</a>
                        @endif
                    </td> --}}
                    <td class="text-center">
                        <a class="btn btn-danger btn-sm" href="/admin/deleteNilai/{{ $row->id }}" role="button"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $user->links() }}
        <small id="kelas" class="form-text text-danger fst-italic" style="font-size: 12px">
            * Total Nilai Al-Quran bisa di ubah
            <br>
            * Total Nilai Kitab bisa di ubah
            <br>
            * Kelas Otomatis terisi dan bisa di ubah setelah santri mengikuti tes non-akademik
        </small>
    </div>
</div>

<!-- Edit Nilai Kitab -->
@foreach ($nilaiKitab as $data)
<div class="modal fade" id="editNilaiKitab-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="/admin/updateNilaiK/{{ $data->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fw-bold" style="color: black" id="exampleModalLabel">Edit Nilai Kitab</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required value="{{ $data->user->name }}" readonly>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col mt-2">
                        <label for="hasil" class="form-label">Nilai Kitab :</label>
                        <input type="text" name="hasil" class="form-control @error('hasil') is-invalid @enderror" id="hasil" required value="{{ $data->hasil }}">
                        @error('hasil')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <input class="btn btn-primary" type="submit" value="Submit">
                </div>
            </div>
        </div>
    </form>
</div>
@endforeach


<!-- Edit Nilai Alquran -->
@foreach ($nilaiAlquran as $data)
<div class="modal fade" id="editNilaiAlquran-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="/admin/updateNilaiA/{{ $data->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fw-bold" style="color: black" id="exampleModalLabel">Edit Nilai Al-Quran</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required value="{{ $data->user->name }}" readonly>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col mt-2">
                        <label for="hasil" class="form-label">Nilai Alquran</label>
                        <input type="text" name="hasil" class="form-control @error('hasil') is-invalid @enderror" id="hasil" required value="{{ $data->hasil }}">
                        @error('hasil')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <input class="btn btn-primary" type="submit" value="Submit">
                </div>
            </div>
        </div>
    </form>
</div>
@endforeach


<!-- Edit Kelas -->
@foreach ($user as $data)
<div class="modal fade" id="editKelas-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="/admin/updateKelasNilai/{{ $data->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" style="color: black" id="exampleModalLabel">Edit Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required value="{{ $data->name }}" readonly>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col mt-2">
                        <label for="kelas">kelas</label>
                        <select class="form-select rounded-3" name="kelas" id="kelas" aria-label="Default select example" >
                            @foreach ($kelas as $row)
                            @if ($row->id == $data->id_kelas)
                                <option selected value="{{ $row->id }}">{{ $row->kelas }} {{ $row->madrasah }}</option>
                            @endif
                            @endforeach
                            @foreach ($kelas as $row)
                            @if ($row->id != $data->id_kelas)
                                <option value="{{ $row->id }}">{{ $row->kelas }} {{ $row->madrasah }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <input class="btn btn-primary" type="submit" value="Submit">
                </div>
            </div>
        </div>
    </form>
</div>
@endforeach


@endsection
