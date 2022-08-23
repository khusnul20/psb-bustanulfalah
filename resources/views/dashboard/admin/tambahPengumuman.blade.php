@extends("sb_admin.app")
@section('title', 'Admin | Pengumuman' )
@section('pengumuman', 'active' )


@section('content')
<h4 class="text-center fw-bold text-dark">Tambah Pengumuman</h4>
<div class="row justify-content-center">
    <div class="col-lg-11 mt-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.insertPengumuman') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="tanggal" class="form-label text-dark fw-bold">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal">
                        @error('tanggal')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pukul" class="form-label text-dark fw-bold">Pukul</label>
                        <input type="time" class="form-control" name="pukul" id="pukul">
                        @error('pukul')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pengumuman" class="form-label text-dark fw-bold">Pengumuman</label>
                        <input type="text" class="form-control" name="pengumuman" id="pengumuman">
                        @error('pengumuman')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi" class="form-label text-dark fw-bold">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" placeholder="Isi keterangan pengumuman disini" id="deskripsi" style="height: 100px"></textarea>
                        {{-- <input type="text" class="form-control" name="deskripsi" id="deskripsi"> --}}
                        @error('deskripsi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" value="Submit">Simpan</button>
                        <a href="{{ route('admin.pengumuman') }}" class="btn btn-secondary" type="submit" >Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
