@extends("sb_user.app")
@section('title', 'User | Pembayaran' )
@section('pembayaran', 'active' )


@section('content')
@if (Auth::guard('web')->user()->status == 1)
    @if (Auth::guard('web')->user()->bukti->count() == 1)
        @foreach ($pembayaran as $item)
            @if ($item->status == 1)

            {{-- Berhasil Upload --}}
            <div class="row justify-content-center mt-2">
                <div class="col-lg-11">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="alert alert-success text-center" role="alert">
                                {{ Auth::guard('web')->user()->name }}, Berhasil Upload Bukti Pembayaran
                            </div>
                            <h4 class="text-center text-dark fw-bold mb-4">Bukti Upload Pembayaran</h4>
                            <form action="{{ route('user.create') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row px-5 g-3">
                                    <div class="col-md">
                                        <label for="no_pend">No.Pendaftaran</label>
                                        <input type="text" name="no_pend" class="form-control @error('no_pend') is-invalid @enderror" id="no_pend" value="{{ Auth::guard('web')->user()->no_pend }}" readonly>
                                        @error('no_pend')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required value="{{ Auth::guard('web')->user()->name }}" readonly>
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-4 px-5 g-3">
                                    <div class="col-md-3 mt-3">
                                        <label for="foto">Upload Foto  <span class="fw-bold text-danger">*</span></label>
                                        <div class="text-left">
                                            <img src="{{ asset('upload/bukti/'.$item->foto) }}" alt="image" width="120px" class="zoom" >
                                        </div>
                                    </div>
                                    <div class="col-md-9 ">
                                        <div class="mb-4">
                                            <label for="tanggal_tf">Tanggal Transfer <span class="fw-bold text-danger">*</span></label>
                                            <input type="text" name="tanggal_tf" class="form-control @error('tanggal_tf') is-invalid @enderror" id="tanggal_tf" required value="{{ date('d-m-Y', strtotime($item->tanggal_tf)) }}" readonly>
                                            @error('tanggal_tf')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="waktu_tf">Waktu Transfer <span class="fw-bold text-danger">*</span></label>
                                            <input type="time" name="waktu_tf" class="form-control @error('waktu_tf') is-invalid @enderror" id="waktu_tf" required value="{{ $item->waktu_tf }}" readonly>
                                            @error('waktu_tf')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @else

            @foreach ($pembayaran as  $row)

            {{-- Tunggu Konfirmasi --}}
            <div class="row justify-content-between g-2">
                <div class="alert alert-warning text-center" role="alert">
                    {{ Auth::guard('web')->user()->name }}, Mohon Tunggu Data Anda Sedang di Verifikasi
                </div>
                <div class="col-sm-5 col-md-5 ">
                    <div class="card">
                        <div class="card-header text-light" style="background-color: #064635">
                            Rincian Pembayaran
                        </div>
                        <div class="card-body">
                            <div class="row g-2">
                                <div class="mt-2">
                                    <label for="exampleInputEmail1" class="form-label">Nama Pemilik Rekening</label>
                                    <input class="form-control"  placeholder="Muhammad Sukron " readonly>
                                </div>
                                <div class="mt-2">
                                    <label for="exampleInputEmail1" class="form-label">ATM tujuan</label>
                                    <input class="form-control"  placeholder="BRI " readonly>
                                </div>
                                <div class="mt-2">
                                    <label for="exampleInputEmail1" class="form-label">Nomor Rekening</label>
                                    <input class="form-control"  placeholder="8077654431123 " readonly>
                                </div>
                                <div class="mt-2">
                                    <label for="exampleInputEmail1" class="form-label">Total Pembayaran</label>
                                    <input class="form-control"  placeholder="Rp.100.000,- " readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 offset-sm-2 col-md-7 offset-md-0 ">
                    <div class="card shadow">
                        <div class="card-body">
                            <h4 class="text-center text-dark fw-bold mb-4">Upload Bukti Pembayaran</h4>
                            <form action="{{ route('user.create') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row px-5 g-3">
                                    <div class="mt-2">
                                        <label for="no_pend">No.Pendaftaran</label>
                                        <input type="text" name="no_pend" class="form-control @error('no_pend') is-invalid @enderror" id="no_pend" value="{{ Auth::guard('web')->user()->no_pend }}" readonly>
                                        @error('no_pend')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required value="{{ Auth::guard('web')->user()->name }}" readonly>
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        <label for="tanggal_tf">Tanggal Transfer <span class="fw-bold text-danger">*</span></label>
                                        <input type="date" name="tanggal_tf" class="form-control @error('tanggal_tf') is-invalid @enderror" id="tanggal_tf" required value="{{ $row->tanggal_tf }}" readonly>
                                        @error('tanggal_tf')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div id="tanggal_tf" class="form-text fw-semibold text-danger" style="font-size: 12px">Tanggal transfer harus sesuai dengan yang tertera pada struk atau resi bukti transfrer</div>
                                    </div>
                                    <div class="mt-2">
                                        <label for="waktu_tf">Waktu Transfer <span class="fw-bold text-danger">*</span></label>
                                        <input type="time" name="waktu_tf" class="form-control @error('waktu_tf') is-invalid @enderror" id="waktu_tf" required value="{{  $row->waktu_tf }}" readonly>
                                        @error('waktu_tf')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div id="waktu_tf" class="form-text fw-semibold text-danger" style="font-size: 12px">Waktu transfer harus sesuai dengan yang tertera pada struk atau resi bukti transfrer</div>
                                    </div>
                                    <div class="mt-2">
                                        <div class="col">
                                            <label for="foto">Upload Foto <span class="text-danger fw-bold">*</span></label>
                                            <img class="ms-4" src="{{ asset('upload/bukti/'.$row->foto) }}" alt="image" width="70px" >
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        @endforeach

        @else
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="row justify-content-between g-2">
                <div class="col-sm-5 col-md-5 ">
                    <div class="card">
                        <div class="card-header text-light" style="background-color: #064635">
                            Rincian Pembayaran
                        </div>
                        <div class="card-body">
                            <div class="row g-2">
                                <div class="mt-2">
                                    <label for="exampleInputEmail1" class="form-label">Nama Pemilik Rekening</label>
                                    <input class="form-control"  placeholder="Muhammad Sukron " readonly>
                                </div>
                                <div class="mt-2">
                                    <label for="exampleInputEmail1" class="form-label">ATM tujuan</label>
                                    <input class="form-control"  placeholder="BRI " readonly>
                                </div>
                                <div class="mt-2">
                                    <label for="exampleInputEmail1" class="form-label">Nomor Rekening</label>
                                    <input class="form-control"  placeholder="8077654431123 " readonly>
                                </div>
                                <div class="mt-2">
                                    <label for="exampleInputEmail1" class="form-label">Total Pembayaran</label>
                                    <input class="form-control"  placeholder="Rp.100.000,- " readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 offset-sm-2 col-md-7 offset-md-0 ">
                    <div class="card shadow">
                        <div class="card-body">
                            <h4 class="text-center text-dark fw-bold mb-4">Upload Bukti Pembayaran</h4>
                            <form action="{{ route('user.create') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row px-5 g-3">
                                    <div class="mt-2">
                                        <label for="no_pend">No.Pendaftaran</label>
                                        <input type="text" name="no_pend" class="form-control @error('no_pend') is-invalid @enderror" id="no_pend" value="{{ Auth::guard('web')->user()->no_pend }}" readonly>
                                        @error('no_pend')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required value="{{ Auth::guard('web')->user()->name }}" readonly>
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        <label for="tanggal_tf">Tanggal Transfer <span class="fw-bold text-danger">*</span></label>
                                        <input type="date" name="tanggal_tf" class="form-control @error('tanggal_tf') is-invalid @enderror" id="tanggal_tf" required value="{{ old('tanggal_tf') }}">
                                        @error('tanggal_tf')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div id="tanggal_tf" class="form-text fw-semibold text-dark fw-bold" style="font-size: 12px">Tanggal transfer harus sesuai dengan yang tertera pada struk atau resi bukti transfrer</div>
                                    </div>
                                    <div class="mt-2">
                                        <label for="waktu_tf">Waktu Transfer <span class="fw-bold text-danger fw-bold">*</span></label>
                                        <input type="time" name="waktu_tf" class="form-control @error('waktu_tf') is-invalid @enderror" id="waktu_tf" required value="{{ old('waktu_tf') }}">
                                        @error('waktu_tf')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div id="waktu_tf" class="form-text fw-semibold text-dark fw-bold" style="font-size: 12px">Waktu transfer harus sesuai dengan yang tertera pada struk atau resi bukti transfrer</div>
                                    </div>
                                    <div class="mt-2">
                                        <label for="foto">Upload Foto</label>
                                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto" required>
                                        @error('foto')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                    <div class="mt-3">
                                        <button class="btn btn-primary" type="submit" value="Submit">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @else
    @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="row justify-content-between g-2">
                <div class="col-sm-5 col-md-5">
                    <div class="card">
                        <div class="card-header text-light" style="background-color: #064635">
                            Rincian Pembayaran
                        </div>
                        <div class="card-body">
                            <div class="row g-2">
                                <div class="mt-2">
                                    <label for="exampleInputEmail1" class="form-label">Nama Pemilik Rekening</label>
                                    <input class="form-control"  placeholder="Muhammad Sukron " readonly>
                                </div>
                                <div class="mt-2">
                                    <label for="exampleInputEmail1" class="form-label">ATM tujuan</label>
                                    <input class="form-control"  placeholder="BRI " readonly>
                                </div>
                                <div class="mt-2">
                                    <label for="exampleInputEmail1" class="form-label">Nomor Rekening</label>
                                    <input class="form-control"  placeholder="8077654431123 " readonly>
                                </div>
                                <div class="mt-2">
                                    <label for="exampleInputEmail1" class="form-label">Total Pembayaran</label>
                                    <input class="form-control"  placeholder="Rp.100.000,- " readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 offset-sm-2 col-md-7 offset-md-0">
                    <div class="card shadow">
                        <div class="card-body">
                            <h4 class="text-center text-dark fw-bold mb-4">Upload Bukti Pembayaran</h4>
                            <form action="{{ route('user.create') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row px-5 g-3">
                                    <div class="mt-2">
                                        <label for="no_pend">No.Pendaftaran</label>
                                        <input type="text" name="no_pend" class="form-control @error('no_pend') is-invalid @enderror" id="no_pend" value="{{ Auth::guard('web')->user()->no_pend }}" readonly>
                                        @error('no_pend')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required value="{{ Auth::guard('web')->user()->name }}" readonly>
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        <label for="tanggal_tf">Tanggal Transfer <span class="fw-bold text-danger">*</span></label>
                                        <input type="date" name="tanggal_tf" class="form-control @error('tanggal_tf') is-invalid @enderror" id="tanggal_tf" required value="{{ old('tanggal_tf') }}" readonly>
                                        @error('tanggal_tf')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div id="tanggal_tf" class="form-text fw-semibold text-dark" style="font-size: 12px">Tanggal transfer harus sesuai dengan yang tertera pada struk atau resi bukti transfrer</div>
                                    </div>
                                    <div class="mt-2">
                                        <label for="waktu_tf">Waktu Transfer <span class="fw-bold text-danger">*</span></label>
                                        <input type="time" name="waktu_tf" class="form-control @error('waktu_tf') is-invalid @enderror" id="waktu_tf" required value="{{ old('waktu_tf') }}" readonly>
                                        @error('waktu_tf')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div id="waktu_tf" class="form-text fw-semibold text-dark" style="font-size: 12px">Waktu transfer harus sesuai dengan yang tertera pada struk atau resi bukti transfrer</div>
                                    </div>
                                    <div class="mt-2">
                                        <label for="foto">Upload Foto</label>
                                        <input type="file" name="foto" class="form-control  @error('foto') is-invalid @enderror" readonly id="foto" required value="{{ old('foto') }}">
                                        @error('foto')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <button class="btn btn-primary disabled" type="submit" value="Submit">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    @endif



@endsection
