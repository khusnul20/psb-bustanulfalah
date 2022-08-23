@extends("sb_pengurus.app")
@section('title', 'Input Nilai Tes Kitab' )
@section('nilaiKitab', 'active' )
@section('main', 'show' )


@section('content')

<div class="row justify-content-between">
    <div class="col-lg-6">
        <div class="card shadow">
            <div class="card-header fs-6 fw-bold text-light text-center" style="background-color: #064635; border-top-left-radius: 5px; border-top-right-radius: 5px ">
                KRITERIA PENILAIAN KITAB MABADI FIQIH
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <strong>Ketentuan Penialain Tes Kitab Mabadi Fiqih</strong>
                    <thead>
                        <tr>
                            <th>1</th>
                            <td>Kelancaran Membaca</td>
                            <td>:</td>
                            <td>1-25</td>
                        </tr>
                        <tr>
                            <th>2</th>
                            <td>Mahrojul Huruf</td>
                            <td>:</td>
                            <td>1-50</td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>Tajwid</td>
                            <td>:</td>
                            <td>1-25</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card shadow">
            <form action="{{ route('pengurus.insertNilaiKitab') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                <div class="card-header fs-6 fw-bold text-light text-center" style="background-color: #064635; border-top-left-radius: 5px; border-top-right-radius: 5px ">
                    INPUT NILAI KITAB MABADI FIQIH
                </div>
                <div class="card-body">
                    <div class="col">
                        <div class="mb-3 row">
                            <label for="user" class="col-sm-4 col-form-label mt-1">Nama Lengkap</label>
                            <i class="fa-solid fa-right-long col-sm-2 mt-3 text-center" style="font-size: 20px"></i>
                            <div class="col-sm-6 mt-2">
                                <select class="form-select rounded-3 @error('user') is-invalid @enderror" name="user" id="user_id">
                                    <option selected disabled value="{{ old('user') }}">{{ $user->name }}</option>
                                    @foreach ($user1 as $row)
                                        <option value="{{ $row->id }}">{{ $row->name}}</option>
                                    @endforeach
                                </select>
                                @error('user')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <small id="kelas" class="form-text text-dark fst-italic fw-bold" style="font-size: 12px">
                                    Wajib Pilih atau cari nama lebih dahulu
                                </small>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="kelancaran_membaca" class="col-sm-5 col-form-label mt-1">Kelancaran Membaca</label>
                            <i class="fa-solid fa-right-long col-sm-2 mt-3 text-center" style="font-size: 20px"></i>
                            <div class="col-sm-5 mt-2">
                                <input type="number" min="0" max="25" name="kelancaran_membaca" class="form-control @error('kelancaran_membaca') is-invalid @enderror" id="kelancaran_membaca" onkeyup="sum()" value="{{ old('kelancaran_membaca') }}" placeholder="1-25" style="color: black">
                                @error('kelancaran_membaca')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <small class="form-text text-dark fst-italic fw-bold" style="font-size: 12px">
                                    Batas Input Nilai 1-25
                                </small>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="wawancara" class="col-sm-5 col-form-label mt-1">Wawancara</label>
                            <i class="fa-solid fa-right-long col-sm-2 mt-3 text-center" style="font-size: 20px"></i>
                            <div class="col-sm-5 mt-2">
                                <input type="number" min="0" max="50" name="wawancara" class="form-control @error('wawancara') is-invalid @enderror" id="wawancara" onkeyup="sum()" value="{{ old('wawancara') }}" style="color: black" placeholder="1-50">
                                @error('wawancara')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <small class="form-text text-dark fst-italic fw-bold" style="font-size: 12px">
                                    Batas Input Nilai 1-50
                                </small>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="penempatan_tajwid" class="col-sm-5 col-form-label mt-1">Penempatan Tajwid</label>
                            <i class="fa-solid fa-right-long col-sm-2 mt-3 text-center" style="font-size: 20px"></i>
                            <div class="col-sm-5 mt-2">
                                <input type="number" min="0" max="25" name="penempatan_tajwid" class="form-control @error('penempatan_tajwid') is-invalid @enderror" id="penempatan_tajwid"onkeyup="sum()" value="{{ old('penempatan_tajwid') }}" placeholder="1-25" style="color: black">
                                @error('penempatan_tajwid')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <small class="form-text text-dark fst-italic fw-bold" style="font-size: 12px">
                                    Batas Input Nilai 1-25
                                </small>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="hasil" class="col-sm-5 col-form-label mt-1">Hasil Akhir</label>
                            <i class="fa-solid fa-right-long col-sm-2 mt-3 text-center" style="font-size: 20px"></i>
                            <div class="col-sm-5 mt-2">
                                <input type="number" name="hasil" class="form-control @error('hasil') is-invalid @enderror" id="hasil" readonly style="color: black; font-weight: 600">
                                @error('hasil')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('pengurus.nilaiAlquran') }}" type="button" class="btn btn-secondary">Kembali</a>
                            <input class="btn btn-primary" type="submit" value="Submit">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function sum() {
        var txtFirstNumberValue = document.getElementById('kelancaran_membaca').value;
        var txtSecondNumberValue = document.getElementById('wawancara').value;
        var txtThreeNumberValue = document.getElementById('penempatan_tajwid').value;
        var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue) + parseInt(txtThreeNumberValue);
        if (!isNaN(result)) {
            document.getElementById('hasil').value = result;
        }
}
</script>


@endsection
