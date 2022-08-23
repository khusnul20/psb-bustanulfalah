@extends("sb_admin.app")
@section('title', 'Profil Admin' )

@section('content')


<div class="text-center">
    <h5 class="text-dark fw-bold">Profil Admin</h5>
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <div class="text-center">
                @if (Auth::guard('admin')->user()->image)
                    <img src="{{ asset('upload/admin/'.Auth::guard('admin')->user()->image) }}" class="img-profile rounded" alt="image" width="150px" height="170">
                @else
                    <img src="https://i.postimg.cc/gk2pZxXw/logoku-removebg-preview.png" alt="{{ Auth::guard('admin')->user()->image }}" class="img-profile " width="150px" height="160">
                @endif

            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4 g-2 p-3" style="border-style: dotted; border-width: 2px; border-color: rgba(128, 128, 128, 0.363)">
        <div class="col-lg-6">
            <div class="d-flex p-2" style=" border-style: solid; border-radius: 1rem; border-width: 2px; border-color: rgba(124, 123, 123, 0.61)">
                <div class="vstack gap-0">
                    <div class="text-gray-600 lh-1">Nama Lengkap:</div>
                    <div class="text-dark font-weight-bold">{{ Auth::user()->name }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="d-flex p-2" style=" border-style: solid; border-radius: 1rem; border-width: 2px; border-color: rgba(124, 123, 123, 0.61)">
                <div class="vstack gap-0">
                    <div class="text-gray-600 lh-1">Email:</div>
                    <div class="text-dark font-weight-bold">{{ Auth::user()->email }}</div>
                </div>
            </div>
        </div>
        <div class="col">
            {{-- <a class="btn btn-outline-primary" href="/user/editprofile/{{ Auth::user()->id }}" role="button" >Edit Profil Siswa</a> --}}
            <a class="btn btn-outline-primary" role="button" data-bs-toggle="modal" data-bs-target="#editAdmin-{{ Auth::user()->id }}">Edit Profil Admin</a>
        </div>
    </div>
</div>


<!-- Edit Data Santri -->
@foreach ($admin as $data)
<div class="modal fade" id="editAdmin-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form action="/admin/updateprofileAdmin/{{ $data->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="text-center text-dark fw-bold">Edit Profil Admin</h5>
                <hr class="bg-dark">
                <div class="col">
                    <label for="name" class="form-label text-dark fw-bold">Nama Lengkap :</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror text-dark" id="name" required value="{{ Auth::user()->name }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col mt-2">
                    <label for="email" class="form-label text-dark fw-bold">Email :</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror text-dark" id="email" required value="{{ Auth::user()->email }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3">
                        @if (Auth::guard('admin')->user()->image)
                            <img src="{{ asset('upload/admin/'.$data->image) }}" alt="image" width="100px">
                        @else
                            <img src="https://i.postimg.cc/gk2pZxXw/logoku-removebg-preview.png" alt="{{ Auth::guard('admin')->user()->image }}" class="img-profile " width="100px">
                        @endif
                    </div>
                    <div class="col mt-3">
                        <label for="image" class="form-label text-dark fw-bold">Upload Foto</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <input class="btn btn-primary" type="submit" value="Simpan">
            </div>
        </div>
    </div>
</form>
</div>
@endforeach



@endsection
