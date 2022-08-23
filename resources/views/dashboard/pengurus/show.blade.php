@extends("sb_pengurus.app")
@section('title', 'Data Pendaftar' )
@section('datasantri', 'active' )

@section('content')


<div class="mb-3">

    <a  href=""><i class="fa-solid fa-arrow-left-long fa-2x text-dark"></i></a>
</div>
<div class="card-body border" style="background-color: rgb(255, 255, 255)">
    <div class="row justify-content-center">
        <div class="col-lg-2" style="margin-left: 40px">
            <img src="https://i.postimg.cc/Qd2Pfmbr/logo.png" style="margin-left: 90px" alt="logo" width="110px">
        </div>
        <div class="col-lg-7 ">
            <div class="text-center" style="margin-right: 40px">
                <h5 class="fw-bold text-dark mt-2">YAYASAN BUSTANUL FALAH</h5>
                <h2 class="fw-bold lh-1" style="color: rgb(71, 211, 211)">PONPES BUSTANUL FALAH</h2>
                <p class="lh-1 text-dark" style="font-size: 12px">Jl Tebu Indah 99 Kembiritan Genteng Banyuwangi ( 68465 ) <span>Email : ponpesbustanulfalahgenteng@gmail.com</span></p>
            </div>
        </div>
        <div style="margin-left: 100px; margin-right: 100px; color: black">
            <hr>
        </div>
    </div>
    <h5 class="text-center" style="color: rgba(0, 0, 0, 0.726)">FORMULIR PENDAFTARAN SANTRI BARU</h5>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-2 ">
            <img src="{{ asset('upload/image/'.$user->image) }}" alt="image" width="150px">
        </div>
        <div class="col-lg-8 border" style="color: rgba(0, 0, 0, 0.726)">
            <p class="ps-5 mt-2">NISN <span style="margin-left: 230px">:</span><span class="ms-4">{{ $user->nisn }}</span></p>
            <p class="ps-5 mt-2">Nama <span style="margin-left: 14rem">:</span><span class="ms-4">{{ $user->name }}</span></p>
            <p class="ps-5 mt-2">Tempat & Tanggal Lahir <span style="margin-left: 6rem">:</span><span class="ms-4">{{ $user->tempatLahir}}, {{ date('d-m-Y', strtotime($user->tanggalLahir)) }}</span></p>
            <p class="ps-5 mt-2">Kelas <span style="margin-left: 14rem">:</span><span class="ms-4">{{ $user->kelas->kelas }} {{ $user->kelas->jumlah }}</span></p>
            <p class="ps-5 mt-2">Jenis Kemain <span style="margin-left: 11rem">:</span><span class="ms-4">{{ $user->jenisKelamin}}</span></p>
            <p class="ps-5 mt-2">Anak Ke <span style="margin-left: 13rem">:</span><span class="ms-4">{{ $user->anakKe}}</span></p>
            <p class="ps-5 mt-2">Jumlah Saudara <span style="margin-left: 155px">:</span><span class="ms-4">{{ $user->jumlahSaudara}}</span></p>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-lg-2 "></div>
        <div class="col-lg-8 border" style="color: rgba(0, 0, 0, 0.726)">
            <p class="ps-5 mt-2">Nama Ayah <span style="margin-left: 183px">:</span><span class="ms-4">{{ $user->nameAyah }}</span></p>
            <p class="ps-5 mt-2">Pekerjaan Ayah <span style="margin-left: 155px">:</span><span class="ms-4">{{ $user->pekerjaanAyah }}</span></p>
            <p class="ps-5 mt-2">Penghasilan Ayah <span style="margin-left: 137px">:</span><span class="ms-4">{{ currency_IDR($user->penghasilanAyah)}}</span></p>
            <p class="ps-5 mt-2">No. Telepon Ayah <span style="margin-left: 140px">:</span><span class="ms-4">{{ $user->noAyah}}</span></p>
            <p class="ps-5 mt-2">Alamat Ayah <span style="margin-left: 173px">:</span><span class="ms-4">{{ $user->alamatAyah}}</span></p>
        </div>
    </div>
    <div class="row justify-content-center mt-4 mb-5">
        <div class="col-lg-2 "></div>
        <div class="col-lg-8 border" style="color: rgba(0, 0, 0, 0.726)">
            <p class="ps-5 mt-2">Nama Ibu <span style="margin-left: 199px">:</span><span class="ms-4">{{ $user->nameIbu }}</span></p>
            <p class="ps-5 mt-2">Pekerjaan Ibu <span style="margin-left: 170px">:</span><span class="ms-4">{{ $user->pekerjaanIbu }}</span></p>
            <p class="ps-5 mt-2">Penghasilan Ibu <span style="margin-left: 153px">:</span><span class="ms-4">{{ currency_IDR($user->penghasilanIbu)}}</span></p>
            <p class="ps-5 mt-2">No. Telepon Ibu <span style="margin-left: 155px">:</span><span class="ms-4">{{ $user->noIbu}}</span></p>
            <p class="ps-5 mt-2">Alamat Ibu <span style="margin-left: 189px">:</span><span class="ms-4">{{ $user->alamatIbu}}</span></p>
        </div>
    </div>
</div>

@endsection
