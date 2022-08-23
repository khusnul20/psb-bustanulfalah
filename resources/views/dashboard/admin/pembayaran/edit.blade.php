@extends("sb_admin.app")
@section('title', 'Edit Data Santri' )

@section('content')
<h4 class="text-center fw-bold text-dark">Edit Data Santri</h4>
<div class="row justify-content-center">
    <div class="col-lg-11 mt-4">
        <div class="card">
            <div class="card-body">
                <form action="/admin/update/{{ $pembayaran->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $pembayaran->name }}">
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            @if ($pembayaran->foto)
                                <img src="{{ asset('upload/bukti/'.$pembayaran->foto) }}" alt="image" width="100px">
                            @endif
                        </div>
                        <div class="col-md-9 mb-3">
                            <label for="foto">Upload Foto</label>
                            <input type="file" class="form-control" name="foto" id="foto" value="{{ $pembayaran->foto }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" value="Submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
