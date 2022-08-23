@extends('layouts.app')

@section('content')
<!-- Required meta tags -->

<div class="home bg-image d-flex justify-content-center align-items-center" id="Home">
    <div class="container-lg mt-5">
        <div class="row align-items-center align-content-center">
            <div class="col-md-6 mt-5 mt-md-0">
                <div class="home-img text-center">
                    <img src="https://i.postimg.cc/767XLwLy/logo-2.png" alt="" width="250px" class="d-inline-block">
                </div>
            </div>
            <div class="col-md-6 mt-5 mt-md-2">
                <div class="home-text text-center text-lg-start">
                    <p class="text-light fw-bold fs-2">Penerimaan Santri Baru</p>
                    <p class="text-light fw-bold fs-3">PONDOK PESANTREN BUSTANUL FALAH</p>
                    <p class="fst-normal lh-sm text-light">Kembiritan Genteng Banyuwangi</p>
                    <p class="fs-6 text-light">Tahun Ajaran 2022-2023</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Awal Alur-->
<section class="alur py-5 " id="page-alur">
    <div class="container">
        <div class="row text-center py-5">
            <div class="col-lg ">
                <div class="section-title ">
                    <h2 class="fw-bold fs-1">
                        <span class="text-alur">Alur</span>
                        Pendaftaran Online
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center g-3">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card bg-body shadow border-0">
                    <div class="text-center pt-3">
                        <img src="img/alur1.png" class="card-img-top" alt="nomor1" style="width: 60px">
                    </div>
                    <div class="card-body">
                        <h6 class="card-title text-center fw-bold">Registerasi</h6>
                        <hr>
                        <p class="card-text text-center fw-lighter lh-sm mb-3">Mengisikan Formulir Pendaftaran yaitu Biodata Calon Santri, Biodata Orang Tua dan Pembuatan Akun</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card bg-body shadow border-0 pb-3">
                    <div class="text-center pt-3">
                        <img src="img/alur2.png" class="card-img-top" alt="nomor1" style="width: 60px">
                    </div>
                    <div class="card-body">
                        <h6 class="card-title text-center fw-bold">Login</h6>
                        <hr>
                        <p class="card-text text-center fw-lighter lh-sm">Mencetak Bukti Pendaftaran, Melihat Pengumuman dan Melihat Hasil Tes Non-Akademik</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card bg-body shadow border-0">
                    <div class="text-center pt-3">
                        <img src="img/alur3.png" class="card-img-top" alt="nomor1" style="width: 60px">
                    </div>
                    <div class="card-body">
                        <h6 class="card-title text-center fw-bold">Cetak Bukti Pendaftaran</h6>
                        <hr>
                        <p class="card-text text-center fw-lighter lh-sm mb-3">Cetak dan simpan berkas pendaftaran sebagai bukti pendaftaran yang nantinya diserahkan ke panitia.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card bg-body shadow border-0 pb-3">
                    <div class="text-center pt-3">
                        <img src="img/alur4.png" class="card-img-top" alt="nomor1" style="width: 60px">
                    </div>
                    <div class="card-body">
                        <h6 class="card-title text-center fw-bold ">Pebayaran</h6>
                        <hr>
                        <p class="card-text text-center fw-lighter lh-sm mb-3">Melakukan Upload Bukti Pembayaran </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card bg-body shadow border-0">
                    <div class="text-center pt-3">
                        <img src="img/alur5.png" class="card-img-top" alt="nomor1" style="width: 60px">
                    </div>
                    <div class="card-body">
                        <h6 class="card-title text-center fw-bold">Tes Non-Akademik</h6>
                        <hr>
                        <p class="card-text text-center fw-lighter lh-sm mb-3">Melakukan Tes Non-akademik yaitu Tes Al-quran dan Kitab Mabadi Fiqih pada Panitia Tes</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Alur -->

<!-- Awal Syarat-->
<section class="syarat py-5 " id="page-syarat">
    <div class="container">
        <div class="row text-center py-5">
            <div class="col-lg ">
                <div class="section-title ">
                    <h2 class="fw-bold fs-1">Syarat Pendaftaran
                        <span class="text-alur">Ulang</span>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center g-3">
            <div class="col-12 col-lg-8">
                <h6 style="font-size: 15px">Berikut ini merupakan persyaratan yang harus dipenuhi untuk melakukan daftar ulang, adapun persyaratannya sebagai berikut:</h6>
                <div class="col-sm-13 pt-5">
                    <img src="img/ok.png" class="card-img-top" alt="nomor1" style="width: 25px">
                    <span class="fw-bold ps-3" style="font-size: 15px" >Wajib diatar oleh wali santri</span>
                    <p class="ps-5 fw-lighter" style="font-size: 13px">Calon santri datang untuk melakukan pendaftaran wajib di dampingi wali santri</p>
                </div>
                <div class="col-sm-13 mb-4">
                    <img src="img/ok.png" class="card-img-top" alt="nomor1" style="width: 25px">
                    <span class="fw-bold ps-3" style="font-size: 15px" >Membawa Bukti Pendaftaran Oline</span>
                </div>
                <div class="col-sm-13">
                    <img src="img/ok.png" class="card-img-top" alt="nomor1" style="width: 25px">
                    <span class="fw-bold ps-3" style="font-size: 15px" >Mengisi surat peryataan</span>
                    <p class="ps-5 fw-lighter" style="font-size: 13px">Calon santri di dampingin wali santri mengisi surat peryataan</p>
                </div>
                <div class="col-sm-13 ">
                    <img src="img/ok.png" class="card-img-top" alt="nomor1" style="width: 25px">
                    <span class="fw-bold ps-3" style="font-size: 15px" >Photo Copy KTP orang tua / wali</span>
                    <p class="ps-5 fw-lighter" style="font-size: 13px">Sebanyak 2 lembar</p>
                </div>
                <div class="col-sm-13 ">
                    <img src="img/ok.png" class="card-img-top" alt="nomor1" style="width: 25px">
                    <span class="fw-bold ps-3" style="font-size: 15px" >Photo Copy SKHUN/Ijazah</span>
                    <p class="ps-5 fw-lighter" style="font-size: 13px">Sebanyak 2 lembar</p>
                </div>
                <div class="col-sm-13">
                    <img src="img/ok.png" class="card-img-top" alt="nomor1" style="width: 25px">
                    <span class="fw-bold ps-3" style="font-size: 15px" >Photo Copy Akta Kelahiran Calon Santri</span>
                    <p class="ps-5 fw-lighter" style="font-size: 13px">Sebanyak 2 lembar</p>
                </div>

            </div>
            <div class="col-12 col-lg-4 text-center pt-5">
            <img src="img/foto2.jpg" class="card-img-top border border-success border-5 shadow-lg" alt="foto2" style="width: 400px">
        </div>
    </div>
</section>
<!-- Akhir Syarat -->

<!-- Awal footer -->
<section class="footer py-5 " id="page-footer" >
    <div class="container">
        <div class="row justify-content-center g-5">
            <div class="col-12 col-lg-6 " style="color: white">
                <h5 class="card-title fs-5">PONDOK PESANTREN BUSTANUL FALAH GENTENG</h5>
                <p class="fw-lighter lh-lg "style="font-size: 13px">Jl Tebu Indah 99 Kembiritan Genteng Banyuwangi ( 68465 )</p>
            </div>
            <div class="col-12 col-lg-6 "style="color: white">
                <div class="footer-col">
                    <h5 class=" text-lg-center text-right ">Sosial Media</h5>
                    <ul class="fa-ul lh-lg fw-lighter" style= "font-size: 13px">
                        <li>
                            <a href="https://www.facebook.com/bustanul.falah.7" class="text-decoration-none text-light"><i class="fa-li fa fa-brands fa-facebook-square mt-2"></i>Bustanul Falah</a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/santri_bufa/" class="text-decoration-none text-light"><i class="fa-li fa fa-brands fa-instagram mt-2"></i>santri_bufa</a>
                        </li>
                        <li>
                            <a href="https://api.whatsapp.com/send?phone=081399108684" class="text-decoration-none text-light"><i class="fa-li fa fa-brands fa-whatsapp  mt-2"></i>WashApp Santri Putra</a>
                        </li>
                        <li>
                            <a href="https://api.whatsapp.com/send?phone=081311816588" class="text-decoration-none text-light"><i class="fa-li fa fa-brands fa-whatsapp  mt-2"></i>WashApp Santri Putra</a>
                        </li>
                        <li><i class="fa-li fa fa-solid fa-envelope mt-2"></i>ponpesbustanulfalahgenteng@gmail.com</li>
                    </ul>
                </div>
            </div>
            <div class="row pt-5">
                <hr style="background-color: white">
                <div class="col-lg-12">
                    <p class="text-center fw-lighter" style="color: white; font-size: 13px" > ©Copyright © 2021 - 2022 - Bustanul Falah </p>
                </div>
            </div>
        </div>
        <div class="row">
            <a href="#app" class="scroll">
                <button class="btn btn-light"><i class="fa fa-angles-up"></i></button>
            </a>
        </div>
    </div>
</section>

@endsection
