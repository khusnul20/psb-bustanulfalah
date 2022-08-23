@extends("sb_admin.app")
@section('title', 'Tambah Kelas' )

@section('content')
<h4 class="text-center fw-bold text-dark">Tambah Data Kelas</h4>
<div class="row justify-content-center">
    <div class="col-lg-11 mt-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.insertKelas') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="kelas" class="form-label text-dark fw-bold">Kelas</label>
                        <input type="text" class="form-control" name="kelas" id="kelas">
                        @error('kelas')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="madrasah" class="form-label text-dark fw-bold">Madrasah</label>
                        <input type="text" class="form-control" name="madrasah" id="madrasah">
                        @error('madrasah')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" value="Submit">Simpan</button>
                        <a href="{{ route('admin.kelas') }}" class="btn btn-secondary" type="submit" >Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
