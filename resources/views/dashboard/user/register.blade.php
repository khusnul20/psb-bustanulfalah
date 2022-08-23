
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Santri- Login</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Custom styles for this template-->
    <link href="/vendor/css/sb-admin-2.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="/css/style.css"> --}}

</head>
<body style="background-color: rgb(40, 119, 97)">

    {{-- Navbar --}}
    <nav class="navbar shadow-lg fixed-top py-4" style="background-color: rgb(40, 119, 97)">
        <div class="container-fluid">
            <a href="/" class="navbar-brand btn btn-outline-light">Kembali</a>
            <div class="d-flex">
                <h5 class="text-light">Formulir Pendaftaran</h5>
            </div>
            <div class="d-flex">
                <a href="{{ route('user.register') }}" type="button" class="btn btn-light button-register1">Daftar<i class="fa-solid fa-circle-check ms-2" style="color: green"></i></a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <form class="user" action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (session()->has('fail'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('fail') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @csrf
                    <div class="card o-hidden border-0 shadow-lg" style="margin-top: 100px">
                        {{-- Bioadata Santri --}}
                        <div class="card-header text-dark font-weight-bolder">
                            Biodata Santri
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-4">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="no_pend">Nomor Pendaftaran</label>
                                                <input type="text" name="no_pend" class="form-control" id="no_pend" placeholder="Nomor Pendaftaran" readonly value="{{ $nomer }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">Nama</label>
                                                <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan nama" required value="{{ old('name') }}">
                                                @error('name')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="tempatLahir">Tahun Ajaran</label>
                                                <select class="form-select rounded-3" name="tahun_ajaran" id="id_thnAjaran"  aria-label="Default select example" value="{{ old('tahun_ajaran') }}" >
                                                    <option selected disabled>Pilih Tahun Ajaran</option>
                                                    @foreach ($tahunAjaran as $row)
                                                        <option value="{{ $row->id }}">{{ $row->tahun_ajaran}}</option>
                                                    @endforeach
                                                </select>
                                                @error('tahun_ajaran')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nisn">NISN</label>
                                                <input type="text" name="nisn" class="form-control" id="nisn" placeholder="Masukkan NISN" required value="{{ old('nisn') }}">
                                                @error('nisn')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="tempatLahir">Tempat Lahir</label>
                                                <input type="text" name="tempatLahir" class="form-control" id="tempatLahir" placeholder="Tempat Lahir" required value="{{ old('tempatLahir') }}">
                                                @error('tempatLahir')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tanggalLahir">Tanggal Lahir</label>
                                                <input type="date" name="tanggalLahir" class="form-control" id="tanggalLahir" placeholder="Tanggal Lahir" required value="{{ old('tanggalLahir') }}">
                                                @error('tanggalLahir')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label for="jenisKelamin">Jenis Kelamin</label>
                                                <select class="form-select" name="jenisKelamin" aria-label="Default select example" required value="{{ old('jenisKelamin') }}">
                                                    <option selected>Pilih jenis kelamin</option>
                                                    <option value="L">Laki-Laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                                @error('jenisKelamin')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="anakKe">Anak Ke</label>
                                                <input type="number" name="anakKe" class="form-control" id="anakKe" placeholder="Anak keberapa" required value="{{ old('anakKe') }}">
                                                @error('anakKe')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="jumlahSaudara">Jumlah Saudara</label>
                                                <input type="number" name="jumlahSaudara" class="form-control" id="jumlahSaudara" placeholder="Jumlah Saudara" required value="{{ old('jumlahSaudara') }}">
                                                @error('jumlahSaudara')
                                                    <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Upload Foto </label>
                                            <input type="file" name="image" class="form-control" id="image" required value="{{ old('image') }}">
                                            @error('image')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="foto_kk">Upload Foto Kartu Keluarga </label>
                                            <input type="file" name="foto_kk" class="form-control" id="foto_kk" required value="{{ old('foto_kk') }}">
                                            @error('foto_kk')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Bioadata Orang Tua --}}
                        <div class="card-header border text-dark font-weight-bolder">
                            Biodata Orang Tua
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-4">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="nameAyah">Nama Ayah</label>
                                                <input type="text" name="nameAyah" class="form-control" id="nameAyah" placeholder="Masukkan nama Ayah" value="{{ old('nameAyah') }}" required>
                                                @error('nameAyah')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nameIbu">Nama Ibu</label>
                                                <input type="text" name="nameIbu" class="form-control" id="nameIbu" placeholder="Masukkan nama ibu" required value="{{ old('nameIbu') }}">
                                                @error('nameIbu')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
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
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
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
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="penghasilanAyah" >Penghasilan Ayah</label>
                                                <select class="form-select rounded-3" name="penghasilanAyah" id="penghasilanAyah" aria-label="Default select example" required value="{{ old('penghasilanAyah') }}">
                                                    <option selected>Pilih Penghasilan Ayah</option>
                                                    <option value="1000.000-2000.000">1000.000-2000.000</option>
                                                    <option value="2000.000-4000.000">2000.000-4000.000</option>
                                                    <option value="4000.000-6000.000">4000.000-6000.000</option>
                                                    <option value="6000.000-8000.000">6000.000-8000.000</option>
                                                    <option value="8000.000-10.000.000">8000.000-10.000.000</option>
                                                </select>
                                                @error('penghasilanAyah')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="penghasilanIbu" >Penghasilan Ibu</label>
                                                <select class="form-select rounded-3" name="penghasilanIbu" id="penghasilanIbu" aria-label="Default select example" required value="{{ old('penghasilanIbu') }}">
                                                    <option selected>Pilih Penghasilan Ayah</option>
                                                    <option value="1000.000-2000.000">1000.000-2000.000</option>
                                                    <option value="2000.000-4000.000">2000.000-4000.000</option>
                                                    <option value="4000.000-6000.000">4000.000-6000.000</option>
                                                    <option value="6000.000-8000.000">6000.000-8000.000</option>
                                                    <option value="8000.000-10.000.000">8000.000-10.000.000</option>
                                                </select>
                                                @error('penghasilanIbu')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="noAyah" >No.Telpon Ayah</label>
                                                <input type="number" name="noAyah" class="form-control" id="noAyah" placeholder="Contoh penulisan '087765545'" required value="{{ old('noAyah') }}">
                                                @error('noAyah')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="noIbu" >No.Telpon Ibu</label>
                                                <input type="number" name="noIbu" class="form-control" id="noIbu" placeholder="Contoh penulisan '087765545'" value="{{ old('noIbu') }}">
                                                @error('noIbu')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="alamatAyah" >Alamat Ayah</label>
                                                <textarea type="text" name="alamatAyah" class="form-control" id="alamatAyah" placeholder="Dusun, RT/RW, Desa, Kecamatan, Kabupaten" required value="{{ old('alamatAyah') }}"></textarea>
                                                @error('alamatAyah')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="alamatIbu" >Alamat Ibu</label>
                                                <textarea type="text" name="alamatIbu" class="form-control" id="alamatIbu" placeholder="Dusun, RT/RW, Desa, Kecamatan, Kabupaten" required value="{{ old('alamatIbu') }}"></textarea>
                                                @error('alamatIbu')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Pembuatan AKun --}}
                        <div class="card-header border text-dark font-weight-bolder">
                            Pembuatan Akun
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-4">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="email">Email</label>
                                                <input type="text" name="email" class="form-control" id="email" placeholder="Masukkan email" value="{{ old('email') }}" required>
                                                @error('email')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password" >
                                                @error('password')
                                                     <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <hr class="bg-dark">
                                        <div class="form-goup px-5">
                                            <button class="w-100 btn btn-lg text-light" type="submit" style="background-color: #064635; border-radius: 24px">Register</button>
                                            <small class="d-block text-center mt-3">Sudah Register?<a href="{{ route('user.login') }}">Login</a></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

