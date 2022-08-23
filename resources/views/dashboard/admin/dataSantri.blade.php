@extends("sb_admin.app")
@section('title', 'Data Santri' )
@section('datasantri', 'active' )
@section('main', 'show' )

@section('content')

<div class="card mt-4">
    <div class="card-header text-light fw-bold fs-6"  style="background-color: #064635">
        Data Calon Santri
    </div>
    <div class="card-body shadow">
        <div class="row g-3">
            <div class="col-sm-5 col-md-3">
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahData" data-bs-whatever="@md"><i class="fa-solid fa-plus me-2"></i>Tambah Data</button>
                <a class="btn btn-success btn-sm" href="{{ route('admin.cetakDS') }}" role="button"><i class="fa-solid fa-print me-2"></i>Cetak Data</a>
            </div>
            <div class="col-sm-5 offset-sm-2 col-md-9 offset-md-0 ">
                <form action="{{ route('admin.dataSantri') }}" method="get" class="d-flex">
                    <div class="col-3">
                        <select class="form-select form-select-sm" name="kelas" aria-label="Default select example">
                            <option selected disabled value="{{ old('kelas') }}">Cari Kelas</option>
                            @foreach ($kelas as $row)
                                <option value="{{ $row->id }}">{{ $row->kelas }} {{ $row->madrasah }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <select class="form-select form-select-sm" name="tahunajaran" aria-label="Default select ">
                            <option selected disabled value="{{ old('tahunajaran') }}">Cari Tahun Ajaran</option>
                            @foreach ($tahunAjaran as $row)
                                <option value="{{ $row->id }}">{{ $row->tahun_ajaran }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col d-flex">
                        <input class="form-control me-2 form-control-sm" type="search" id="name" name="name" placeholder="Cari" aria-label="Search" value="{{ request('name') }}" >
                        <button class="btn text-light btn-sm" type="submit" style="background-color: #064635">Search</button>
                    </div>
                </form>
            </div>
            <div>
                <table class="table table-bordered table-sm table-responsive-lg">
                    <thead class="fw-bold text-dark">
                        <tr class="text-center" style="font-size: 13px">
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">No Pendaftaran</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">TTGL</th>
                            <th scope="col">JK</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama Ayah</th>
                            <th scope="col">Tahun Ajaran</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($user as $index => $row)
                        <tr style="font-size: 10px">
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ date('d-m-Y', strtotime($row->created_at))  }}</td>
                            <td>{{ $row->no_pend}}</td>
                            <td>{{ $row->nisn }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->tempatLahir }},{{ date('d-m-Y', strtotime($row->tanggalLahir)) }}</td>
                            <td>{{ $row->jenisKelamin }}</td>
                            <td>{{ $row->kelas->kelas}} <span>{{ $row->kelas->madrasah }}</span></td>
                            <td>
                                <img src="{{ asset('upload/image/'.$row->image) }}" alt="image" width="30px">
                            </td>
                            <td>{{ $row->nameAyah }}</td>
                            <td>
                                {{  $row->tahunAjaran->tahun_ajaran}}
                            </td>
                            <td class="text-center" style="width: 10rem">
                                <a class="btn btn-info btn-sm" role="button" data-bs-toggle="modal" data-bs-target="#showDataSantri-{{ $row->id }}"><i class="fa-solid fa-eye"></i></a>
                                <a class="btn btn-warning btn-sm" role="button" data-bs-toggle="modal" data-bs-target="#editDataSantri-{{ $row->id }}"><i class="fa-solid fa-pen"></i></a>
                                <a class="btn btn-danger btn-sm" href="/admin/deleteDS/{{ $row->id }}" role="button"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $user->links() }}
        <small id="kelas" class="form-text text-danger fst-italic" style="font-size: 12px">
            Kelas Otomatis terisi dan bisa di ubah setelah santri mengikuti tes non-akademik
        </small>
    </div>
</div>

<!-- Tambah Data Santri -->
<div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Calon Santri Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.insertData') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col">
                        <div class="mb-3">
                            <label for="no_pend" class="form-label">No.Pendaftaran</label>
                            <input type="text" name="no_pend" class="form-control @error('no_pend') is-invalid @enderror" id="no_pend" required value="{{ $nomer }}" readonly>
                                @error('no_pend')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tahun_ajaran" class="mb-1">Tahun Ajaran :</label>
                            <select class="form-select rounded-3" name="tahun_ajaran" id="id_thnAjaran" aria-label="Default select example" >
                                <option selected disabled>Pilih Tahun Ajaran</option>
                                @foreach ($tahunAjaran as $row)
                                    <option value="{{ $row->id }}">{{ $row->tahun_ajaran}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nisn" class="mb-1">NISN :</label>
                            <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror" id="nisn" required value="{{ old('nisn') }}">
                            @error('nisn')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempatLahir" class="form-control @error('tempatLahir') is-invalid @enderror" id="tempatLahir" required value="{{ old('tempatLahir') }}">
                                @error('tempatLahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tanggalLahir" class="mb-1">Tanggal Lahir :</label>
                                <input type="date" name="tanggalLahir" class="form-control @error('tanggalLahir') is-invalid @enderror" id="tanggalLahir" required value="{{ old('tanggalLahir') }}">
                                @error('tanggalLahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label for="id_kelas">kelas</label>
                            <select class="form-select rounded-3" name="kelas" id="id_kelas" aria-label="Default select example" >
                                <option selected disabled>Pilih Kelas</option>
                                @foreach ($kelas as $row)
                                    <option value="{{ $row->id }}">{{ $row->kelas}} {{ $row->madrasah }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="anakKe" class="form-label">Anak Ke</label>
                            <input type="number" name="anakKe" class="form-control @error('anakKe') is-invalid @enderror" id="anakKe" required value="{{ old('anakKe') }}">
                            @error('anakKe')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jumlahSaudara" class="form-label">Jumlah Saudara</label>
                            <input type="number" name="jumlahSaudara" class="form-control @error('jumlahSaudara') is-invalid @enderror" id="jumlahSaudara" required value="{{ old('jumlahSaudara') }}">
                            @error('jumlahSaudara')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image">Upload Foto</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" required value="{{ old('image') }}">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="foto_kk">Upload Foto Kartu Keluarga </label>
                            <input type="file" name="foto_kk" class="form-control" id="foto_kk" required value="{{ old('foto_kk') }}">
                            @error('foto_kk')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jenisKelamin">Jenis Kelamin</label>
                            <select class="form-select" name="jenisKelamin" aria-label="Default select example" required alue="{{ old('jenisKelamin') }}">
                                <option selected>Pilih jenis kelamin</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            @error('jenisKelamin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nameAyah">Nama Ayah</label>
                            <input type="text" name="nameAyah" class="form-control @error('nameAyah') is-invalid @enderror" id="nameAyah" required value="{{ old('nameAyah') }}">
                            @error('nameAyah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pekerjaanAyah">Pekerjaan Ayah</label>
                            <select class="form-select rounded-3" name="pekerjaanAyah" aria-label="Default select example" id="pekerjaanAyah" required value="{{ old('pekerjaanAyah') }}">
                                <option selected>Pilih pekerjaan ayah</option>
                                <option value="Wirasuasta">Wirasuasta</option>
                                <option value="Buruh">Buruh</option>
                                <option value="Peternak">Peternak</option>
                                <option value="Petani">Petani</option>
                                <option value="Sopir">Sopir</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            @error('pekerjaanAyah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="penghasilanAyah">Penghasilan Ayah</label>
                            <select class="form-select rounded-3" name="penghasilanAyah" id="penghasilanAyah" aria-label="Default select example" required value="{{ old('penghasilanAyah') }}">
                                <option selected>Pilih Penghasilan Ayah</option>
                                <option value="1000.000-2000.000">1000.000-2000.000</option>
                                <option value="2000.000-4000.000">2000.000-4000.000</option>
                                <option value="4000.000-6000.000">4000.000-6000.000</option>
                                <option value="6000.000-8000.000">6000.000-8000.000</option>
                                <option value="8000.000-10.000.000">8000.000-10.000.000</option>
                            </select>
                            @error('penghasilanAyah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="noAyah">No.Telepon Ayah</label>
                            <input type="number" name="noAyah" class="form-control @error('noAyah') is-invalid @enderror" id="noAyah" required value="{{ old('noAyah') }}">
                            @error('noAyah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamatAyah">Alamat Ayah</label>
                            <textarea type="text" name="alamatAyah" class="form-control @error('alamatAyah') is-invalid @enderror" id="alamatAyah" required value="{{ old('alamatAyah') }}"></textarea>
                            @error('alamatAyah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nameIbu">Nama Ibu</label>
                            <input type="text" name="nameIbu" class="form-control @error('nameIbu') is-invalid @enderror" id="nameIbu" required value="{{ old('nameIbu') }}">
                            @error('nameIbu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pekerjaanIbu">Pekerjaan Ibu</label>
                            <select class="form-select rounded-3" name="pekerjaanIbu" id="pekerjaanIbu" aria-label="Default select example" required value="{{ old('pekerjaanIbu') }}">
                                <option selected>Pilih pekerjaan Ibu</option>
                                <option value="Wirasuasta">Wirasuasta</option>
                                <option value="Petani">Petani</option>
                                <option value="TKW">TKW</option>
                                <option value="IRT">Ibu Rumah Tangga</option>
                                <option value="Penjahit">Penjahit</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            @error('pekerjaanIbu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="penghasilanIbu">Penghasilan Ibu</label>
                            <select class="form-select rounded-3" name="penghasilanIbu" id="penghasilanIbu" aria-label="Default select example" required value="{{ old('penghasilanIbu') }}">
                                <option selected>Pilih Penghasilan Ibu</option>
                                <option value="1000.000-2000.000">1000.000-2000.000</option>
                                <option value="2000.000-4000.000">2000.000-4000.000</option>
                                <option value="4000.000-6000.000">4000.000-6000.000</option>
                                <option value="6000.000-8000.000">6000.000-8000.000</option>
                                <option value="8000.000-10.000.000">8000.000-10.000.000</option>
                            </select>
                            @error('penghasilanIbu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="noIbu">No.Telepon Ibu</label>
                            <input type="number" name="noIbu" class="form-control @error('noIbu') is-invalid @enderror" id="noIbu" required value="{{ old('noIbu') }}">
                            @error('noIbu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamatIbu">Alamat Ibu</label>
                            <textarea type="number" name="alamatIbu" class="form-control @error('alamatIbu') is-invalid @enderror" id="alamatIbu" required value="{{ old('alamatIbu') }}"></textarea>
                            @error('alamatIbu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" required value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input class="btn btn-primary" type="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Show Data Santri -->
@foreach ($user as $row)
    <div class="modal fade" id="showDataSantri-{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header text-light" style="background-color: #064635">
            <h5 class="modal-title" id="exampleModalLabel">Data Detail Calon Santri</h5>
            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                        <th scope="col">Kelas </th>
                                        <td>: {{ $row->kelas->kelas }} {{ $row->kelas->madrasah }}</td>
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
                                        <td>: {{  $row->penghasilanIbu}}</td>
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


<!-- Edit Data Santri -->
@foreach ($user as $data)
    <div class="modal fade" id="editDataSantri-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="/admin/update/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h6 class="modal-title fw-bold" id="staticBackdropLabel">Edit Data Calon Santri</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="px-4">
                            <div class="row">
                                <div class="col">
                                    <label for="no_pend" class="form-label">No.Pendaftaran</label>
                                    <input type="text" name="no_pend" class="form-control @error('no_pend') is-invalid @enderror" id="no_pend" required value="{{ $data->no_pend }}" readonly>
                                        @error('no_pend')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </div>
                                <div class="col">
                                    <label for="tahun_ajaran">Tahun Ajaran :</label>
                                    <select class="form-select rounded-3" name="tahun_ajaran" id="tahun_ajaran" aria-label="Default select example" >
                                        @foreach ($tahunAjaran as $row)
                                        @if ($row->id == $data->tahunajaran_id)
                                            <option selected value="{{ $row->id }}">{{ $row->tahun_ajaran }}</option>
                                        @endif
                                        @endforeach
                                        @foreach ($tahunAjaran as $row)
                                        @if ($row->id != $data->tahunajaran_id)
                                            <option value="{{ $row->id }}">{{ $row->tahun_ajaran }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="nisn">NISN :</label>
                                    <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror" id="nisn" required value="{{ $data->nisn }}">
                                    @error('nisn')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required value="{{ $data->name }}">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" name="tempatLahir" class="form-control @error('tempatLahir') is-invalid @enderror" id="tempatLahir" required value="{{ $data->tempatLahir }}">
                                        @error('tempatLahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </div>
                                <div class="col">
                                    <label for="tanggalLahir" class="mb-1">Tanggal Lahir :</label>
                                        <input type="date" name="tanggalLahir" class="form-control @error('tanggalLahir') is-invalid @enderror" id="tanggalLahir" required value="{{ $data->tanggalLahir }}">
                                        @error('tanggalLahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="id_kelas">kelas</label>
                                    <select class="form-select rounded-3" name="kelas" id="id_kelas" aria-label="Default select example" >
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
                                <div class="col">
                                    <label for="anakKe" class="form-label">Anak Ke</label>
                                    <input type="number" name="anakKe" class="form-control @error('anakKe') is-invalid @enderror" id="anakKe" required value="{{ $data->anakKe }}">
                                    @error('anakKe')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="jumlahSaudara" class="form-label">Jumlah Saudara</label>
                                    <input type="number" name="jumlahSaudara" class="form-control @error('jumlahSaudara') is-invalid @enderror" id="jumlahSaudara" required value="{{ $data->anakKe }}">
                                    @error('jumlahSaudara')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3 mt-3">
                                    @if ($data->image)
                                    <img src="{{ asset('upload/image/'.$data->image) }}" alt="image" width="100px">
                                    @endif
                                </div>
                                <div class="col-md-9 ">
                                    <div class="mb-3">
                                        <label for="image" class="form-label text-dark fw-bold">Upload Foto</label>
                                        <input type="file" class="form-control" name="image" id="image" value="{{ $data->image }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenisKelamin" class="form-label text-dark fw-bold">Jenis Kelamin</label>
                                        <select class="form-select rounded-3" name="jenisKelamin" id="jenisKelamin" aria-label="Default select example" >
                                            <option selected>{{ $data->jenisKelamin }}</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3 mt-3">
                                    @if ($data->foto_kk)
                                    <img src="{{ asset('upload/FotoKK/'.$data->foto_kk) }}" alt="image" width="100px">
                                    @endif
                                </div>
                                <div class="col-md-9 ">
                                    <div class="mb-3">
                                        <label for="foto_kk" class="form-label text-dark fw-bold">Upload Foto Kartu Keluarga</label>
                                        <input type="file" class="form-control" name="foto_kk" id="foto_kk" value="{{ $data->foto_kk }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="nameAyah">Nama Ayah</label>
                                    <input type="text" name="nameAyah" class="form-control @error('nameAyah') is-invalid @enderror" id="nameAyah" required value="{{ $data->nameAyah }}">
                                    @error('nameAyah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="pekerjaanAyah">Pekerjaan Ayah</label>
                                    <select class="form-select rounded-3" name="pekerjaanAyah" aria-label="Default select example" id="pekerjaanAyah">
                                        <option selected>{{ $data->pekerjaanAyah }}</option>
                                        <option value="Wirasuasta">Wirasuasta</option>
                                        <option value="Puruh">Buruh</option>
                                        <option value="Peternak">Peternak</option>
                                        <option value="Petani">Petani</option>
                                        <option value="Sopir">Sopir</option>
                                    </select>
                                    @error('pekerjaanAyah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="penghasilanAyah" class="form-label text-dark fw-bold">Penghasilan Ayah</label>
                                        <select class="form-select rounded-3" name="penghasilanAyah" id="penghasilanAyah" aria-label="Default select example" >
                                            <option selected>{{ $data->penghasilanAyah }}</option>
                                            <option value="1000.000-2000.000">1000.000-2000.000</option>
                                            <option value="2000.000-4000.000">2000.000-4000.000</option>
                                            <option value="4000.000-6000.000">4000.000-6000.000</option>
                                            <option value="6000.000-8000.000">6000.000-8000.000</option>
                                            <option value="8000.000-10.000.000">8000.000-10.000.000</option>
                                        </select>
                                    @error('penghasilanAyah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="noAyah">No.Telepon Ayah</label>
                                    <input type="number" name="noAyah" class="form-control @error('noAyah') is-invalid @enderror" id="noAyah" required value="{{ $data->noAyah }}">
                                    @error('noAyah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="alamatAyah">Alamat Ayah</label>
                                    <input type="text" name="alamatAyah" class="form-control @error('alamatAyah') is-invalid @enderror" id="alamatAyah" required value="{{ $data->alamatAyah }}">
                                    @error('alamatAyah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <hr class="bg-dark mt-4">
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="nameIbu">Nama Ibu</label>
                                    <input type="text" name="nameIbu" class="form-control @error('nameIbu') is-invalid @enderror" id="nameIbu" required value="{{ $data->nameIbu }}">
                                    @error('nameIbu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="pekerjaanIbu">Pekerjaan Ibu</label>
                                    <select class="form-select rounded-3" name="pekerjaanIbu" id="pekerjaanIbu" aria-label="Default select example" required>
                                        <option selected>{{ $data->pekerjaanIbu }}</option>
                                        <option value="Wirasuasta">Wirasuasta</option>
                                        <option value="Petani">Petani</option>
                                        <option value="TKW">TKW</option>
                                        <option value="IRT">Ibu Rumah Tangga</option>
                                        <option value="Penjahit">Penjahit</option>
                                    </select>
                                    @error('pekerjaanIbu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="penghasilanIbu">Penghasilan Ibu</label>
                                    <select class="form-select rounded-3" name="penghasilanIbu" id="penghasilanIbu" aria-label="Default select example" >
                                        <option selected>{{ $data->penghasilanIbu }}</option>
                                        <option value="1000.000-2000.000">1000.000-2000.000</option>
                                        <option value="2000.000-4000.000">2000.000-4000.000</option>
                                        <option value="4000.000-6000.000">4000.000-6000.000</option>
                                        <option value="6000.000-8000.000">6000.000-8000.000</option>
                                        <option value="8000.000-10.000.000">8000.000-10.000.000</option>
                                    </select>
                                    @error('penghasilanIbu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="noIbu">No.Telepon Ibu</label>
                                    <input type="number" name="noIbu" class="form-control @error('noIbu') is-invalid @enderror" id="noIbu" required value="{{ $data->noIbu }}">
                                    @error('noIbu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="alamatIbu">Alamat Ibu</label>
                                    <input type="text" name="alamatIbu" class="form-control @error('alamatIbu') is-invalid @enderror" id="alamatIbu" required value="{{ $data->alamatIbu }}">
                                    @error('alamatIbu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
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
