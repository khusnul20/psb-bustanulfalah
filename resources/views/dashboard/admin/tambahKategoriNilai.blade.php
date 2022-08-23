@extends("sb_admin.app")
@section('title', 'Tambah Kategori Nilai' )

@section('content')
<h4 class="text-center fw-bold text-dark">Tambah Kategori Nilai</h4>
<div class="row justify-content-center">
    <div class="col-lg-11 mt-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.insertKategoriNilai') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label text-dark fw-bold">Nama</label>
                        <input type="text" class="form-control" name="name" id="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kriteria_nilai" class="form-label text-dark fw-bold">Kategori Nilai</label>
                        <input type="text" class="form-control" name="kriteria_nilai" id="kriteria_nilai">
                        @error('kriteria_nilai')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" value="Submit">Simpan</button>
                        <a href="{{ route('admin.nilai') }}" class="btn btn-secondary" type="submit" >Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
