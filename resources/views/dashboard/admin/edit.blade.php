@extends("sb_admin.app")
@section('title', 'Edit Data Santri' )

@section('content')
<h4 class="text-center fw-bold text-dark">EditData Santri</h4>
<div class="row justify-content-center">
    <div class="col-lg-9 mt-2">
        <div class="card">
            <div class="card-body">
                <form action="/admin/update/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="no_pend" class="form-label text-dark fw-bold">No.Pendaftaran</label>
                        <input type="text" class="form-control" name="no_pend" id="no_pend" value="{{ $user->no_pend }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tahun_ajaran" class="form-label text-dark fw-bold">Tahun Ajaran</label>
                        <input type="text" class="form-control" name="tahun_ajaran" id="tahun_ajaran" value="{{ $user->tahun_ajaran }}">
                    </div>
                    <div class="mb-3">
                        <label for="nisn" class="form-label text-dark fw-bold">Nisn</label>
                        <input type="text" class="form-control" name="nisn" id="nisn" value="{{ $user->nisn }}">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label text-dark fw-bold">Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="tempatLahir" class="form-label text-dark fw-bold">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempatLahir" id="tempatLahir" value="{{ $user->tempatLahir }}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggalLahir" class="form-label text-dark fw-bold">Tanggal Lahir</label>
                        <input type="text" class="form-control" name="tanggalLahir" id="tanggalLahir" value="{{ $user->tanggalLahir }}">
                    </div>
                    <div class="mb-3">
                        <label for="id_kelas">kelas</label>
                        <select class="form-select rounded-3" name="kelas" id="id_kelas" aria-label="Default select example" >
                            @foreach ($kelas as $row)
                            @if ($row->id == $user->id_kelas)
                                <option selected value="{{ $row->id }}">{{ $row->kelas }}</option>
                            @endif
                            @endforeach
                            @foreach ($kelas as $row)
                            @if ($row->id != $user->id_kelas)
                                <option value="{{ $row->id }}">{{ $row->kelas }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="anakKe" class="form-label text-dark fw-bold">Anak Ke</label>
                        <input type="text" class="form-control" name="anakKe" id="anakKe" value="{{ $user->anakKe }}">
                    </div>
                    <div class="row">
                        <div class="col-md-3 mt-3">
                            @if ($user->image)
                            <img src="{{ asset('upload/image/'.$user->image) }}" alt="image" width="100px">
                            @endif
                        </div>
                        <div class="col-md-9 ">
                            <div class="mb-3">
                                <label for="image" class="form-label text-dark fw-bold">Upload Foto</label>
                                <input type="file" class="form-control" name="image" id="image" value="{{ $user->image }}">
                            </div>
                            <div class="mb-3">
                                <label for="jenisKelamin" class="form-label text-dark fw-bold">Jenis Kelamin</label>
                                <select class="form-select rounded-3" name="jenisKelamin" id="jenisKelamin" aria-label="Default select example" >
                                    <option selected>{{ $user->jenisKelamin }}</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jumlahSaudara" class="form-label text-dark fw-bold">Jumlah Saudara</label>
                        <input type="text" class="form-control" name="jumlahSaudara" id="jumlahSaudara" value="{{ $user->jumlahSaudara }}">
                    </div>
                    <div class="mb-3">
                        <label for="nameAyah" class="form-label text-dark fw-bold">Nama Ayah</label>
                        <input type="text" class="form-control" name="nameAyah" id="nameAyah" value="{{ $user->nameAyah }}">
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaanAyah" class="form-label text-dark fw-bold">Pekerjaan Ayah</label>
                        <select class="form-select rounded-3" name="pekerjaanAyah" aria-label="Default select example" id="pekerjaanAyah">
                            <option selected>{{ $user->pekerjaanAyah }}</option>
                            <option value="Wirasuasta">Wirasuasta</option>
                            <option value="Puruh">Buruh</option>
                            <option value="Peternak">Peternak</option>
                            <option value="Petani">Petani</option>
                            <option value="Sopir">Sopir</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="penghasilanAyah" class="form-label text-dark fw-bold">Penghasilan Ayah</label>
                        <input type="text" class="form-control" name="penghasilanAyah" id="penghasilanAyah" value="{{ $user->penghasilanAyah }}">
                    </div>
                    <div class="mb-3">
                        <label for="noAyah" class="form-label text-dark fw-bold">No.Telepon Ayah</label>
                        <input type="text" class="form-control" name="noAyah" id="noAyah" value="{{ $user->noAyah }}">
                    </div>
                    <div class="mb-3">
                        <label for="alamatAyah" class="form-label text-dark fw-bold">Alamat Ayah</label>
                        <input type="text" class="form-control" name="alamatAyah" id="alamatAyah" value="{{ $user->alamatAyah }}">
                    </div>
                    <div class="mb-3">
                        <label for="nameIbu" class="form-label text-dark fw-bold">Nama Ibu</label>
                        <input type="text" class="form-control" name="nameIbu" id="nameIbu" value="{{ $user->nameIbu }}">
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaanIbu" class="form-label text-dark fw-bold">Pekerjaan Ibu</label>
                        <select class="form-select rounded-3" name="pekerjaanIbu" id="pekerjaanIbu" aria-label="Default select example">
                            <option selected>{{ $user->pekerjaanIbu }}</option>
                            <option value="Wirasuasta">Wirasuasta</option>
                            <option value="Petani">Petani</option>
                            <option value="TKW">TKW</option>
                            <option value="IRT">Ibu Rumah Tangga</option>
                            <option value="Penjahit">Penjahit</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="penghasilanIbu" class="form-label text-dark fw-bold">Penghasilan Ibu</label>
                        <input type="text" class="form-control" name="penghasilanIbu" id="penghasilanIbu" value="{{ $user->penghasilanIbu }}">
                    </div>
                    <div class="mb-3">
                        <label for="noIbu" class="form-label text-dark fw-bold">No.Telepon Ibu</label>
                        <input type="text" class="form-control" name="noIbu" id="noIbu" value="{{ $user->noIbu }}">
                    </div>
                    <div class="mb-3">
                        <label for="alamatIbu"class="form-label text-dark fw-bold">Alamat Ibu</label>
                        <input type="text" class="form-control" name="alamatIbu" id="alamatIbu" value="{{ $user->alamatIbu }}" >
                    </div>
                    <div class="mb-3" class="form-label text-dark fw-bold">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label text-dark fw-bold">Password</label>
                        <input type="password" class="form-control" name="password" value="{{ $user->password }}">
                    </div>
                    <div class="mb-3">
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
