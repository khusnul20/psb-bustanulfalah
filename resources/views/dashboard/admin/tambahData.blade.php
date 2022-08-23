@extends("sb_admin.app")
@section('title', 'Tambah Data Santri' )


@section('content')
<h4 class="text-center fw-bold text-dark">Tambah Data Santri</h4>
<div class="row justify-content-center">
    <div class="col-lg-9 mt-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.insertData') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="no_pendaftaran" class="form-label">No.Pendaftaran</label>
                        <input type="text" class="form-control" name="no_pendaftaran" id="no_pendaftaran">
                    </div>
                    <div class="mb-3">
                        <label for="nisn" class="form-label">Nisn</label>
                        <input type="text" class="form-control" name="nisn" id="nisn">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                        <input type="text" class="form-control" name="tanggalLahir" id="tanggalLahir">
                    </div>
                    <div class="mb-3">
                        <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempatLahir" id="tempatLahir">
                    </div>
                    <div class="mb-3">
                        <label for="id_kelas">kelas</label>
                        <select class="form-select rounded-3" name="kelas" id="id_kelas" aria-label="Default select example" >
                            <option selected disabled>Pilih Kelas</option>
                            @foreach ($kelas as $row)
                                <option value="{{ $row->id }}">{{ $row->kelas}}{{ $row->jumlah }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="anakKe" class="form-label">Anak Ke</label>
                        <input type="text" class="form-control" name="anakKe" id="anakKe">
                    </div>
                    <div class="mb-3">
                        <label for="jumlahSaudara" class="form-label">Jumlah Saudara</label>
                        <input type="text" class="form-control" name="jumlahSaudara" id="jumlahSaudara">
                    </div>
                    <div class="mb-3">
                        <label for="image">Upload Foto</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="jenisKelamin">Jenis Kelamin</label>
                        <select class="form-select rounded-3" name="jenisKelamin" id="jenisKelamin" aria-label="Default select example" >
                            <option selected>Pilih jenis kelamin</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nameAyah">Nama Ayah</label>
                        <input type="text" class="form-control" name="nameAyah" id="nameAyah" >
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaanAyah">Pekerjaan Ayah</label>
                        <select class="form-select rounded-3" name="pekerjaanAyah" aria-label="Default select example" id="pekerjaanAyah">
                            <option selected>Pilih pekerjaan ayah</option>
                            <option value="Wirasuasta">Wirasuasta</option>
                            <option value="Buruh">Buruh</option>
                            <option value="Peternak">Peternak</option>
                            <option value="Petani">Petani</option>
                            <option value="Sopir">Sopir</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="penghasilanAyah">Penghasilan Ayah</label>
                        <input type="text" class="form-control" name="penghasilanAyah" id="penghasilanAyah">
                    </div>
                    <div class="mb-3">
                        <label for="noAyah">No.Telepon Ayah</label>
                        <input type="text" class="form-control" name="noAyah" id="noAyah">
                    </div>
                    <div class="mb-3">
                        <label for="alamatAyah">Alamat Ayah</label>
                        <input type="text" class="form-control" name="alamatAyah" id="alamatAyah">
                    </div>
                    <div class="mb-3">
                        <label for="nameIbu">Nama Ibu</label>
                        <input type="text" class="form-control" name="nameIbu" id="nameIbu" >
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaanIbu">Pekerjaan Ibu</label>
                        <select class="form-select rounded-3" name="pekerjaanIbu" id="pekerjaanIbu" aria-label="Default select example">
                            <option selected>Pilih pekerjaan Ibu</option>
                            <option value="Wirasuasta">Wirasuasta</option>
                            <option value="Petani">Petani</option>
                            <option value="TKW">TKW</option>
                            <option value="IRT">Ibu Rumah Tangga</option>
                            <option value="Penjahit">Penjahit</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="penghasilanIbu">Penghasilan Ibu</label>
                        <input type="text" class="form-control" name="penghasilanIbu" id="penghasilanIbu" >
                    </div>
                    <div class="mb-3">
                        <label for="noIbu">No.Telepon Ibu</label>
                        <input type="text" class="form-control" name="noIbu" id="noIbu" >
                    </div>
                    <div class="mb-3">
                        <label for="alamatIbu">Alamat Ibu</label>
                        <input type="text" class="form-control" name="alamatIbu" id="alamatIbu" >
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" >
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
