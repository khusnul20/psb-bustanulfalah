@extends("sb_user.app")
@section('title', 'User | Profil' )


@section('content')

    <div class="text-center">
        <h5 class="text-dark fw-bold">Profil Santri</h5>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <div class="text-center">
                    <img src="{{ asset('upload/image/'.Auth::guard('web')->user()->image) }}" class="img-profile rounded" alt="image" width="150px" height="170">
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
            <div class="col-lg-6 mt-2">
                <div class="d-flex p-2" style=" border-style: solid; border-radius: 1rem; border-width: 2px; border-color: rgba(124, 123, 123, 0.61)">
                    <div class="vstack gap-0">
                        <div class="text-gray-600 lh-1">Tempat Lahir:</div>
                        <div class="text-dark font-weight-bold">{{ Auth::user()->tempatLahir }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="d-flex p-2" style=" border-style: solid; border-radius: 1rem; border-width: 2px; border-color: rgba(124, 123, 123, 0.61)">
                    <div class="vstack gap-0">
                        <div class="text-gray-600 lh-1">Tanggal Lahir:</div>
                        <div class="text-dark font-weight-bold">{{ Carbon\Carbon::parse(Auth::user()->tanggalLahir)->translatedFormat('d F Y') }}</div>
                    </div>
                </div>
            </div>
            <div class="col">
                {{-- <a class="btn btn-outline-primary" href="/user/editprofile/{{ Auth::user()->id }}" role="button" >Edit Profil Siswa</a> --}}
                <a class="btn btn-outline-primary" role="button" data-bs-toggle="modal" data-bs-target="#editDataSantri-{{ Auth::user()->id }}">Edit Profil Santri</a>
            </div>
        </div>
    </div>


    <!-- Edit Data Santri -->
@foreach ($user as $data)
<div class="modal fade" id="editDataSantri-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="/user/updateprofile/{{ $data->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="text-center text-dark">Edit Profil Santri</h5>
                    <hr class="bg-dark">
                    <div class="col">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required value="{{ Auth::user()->name }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col mt-2">
                        <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempatLahir" class="form-control @error('tempatLahir') is-invalid @enderror" id="tempatLahir" required value="{{ Auth::user()->tempatLahir }}">
                        @error('tempatLahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col mt-2">
                        <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggalLahir" class="form-control @error('tanggalLahir') is-invalid @enderror" id="tanggalLahir" required value="{{ Auth::user()->tanggalLahir }}">
                        @error('tanggalLahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col mt-2">
                        <div class="row">
                            <div class="col-md-3 mt-4">
                                @if ($data->image)
                                <img src="{{ asset('upload/image/'.$data->image) }}" alt="image" width="100px">
                                @endif
                            </div>
                            <div class="col">
                                <div class="mt-2">
                                    <label for="image" class="form-label text-dark">Upload Foto</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>
                                <div class="mt-2">
                                    <label for="emial" class="form-label">Email </label>
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" required value="{{ Auth::user()->email }}">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
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
