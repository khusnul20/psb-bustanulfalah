@extends("sb_admin.app")
@section('title', 'Admin | Profile' )



@section('content')

<div class="contariner" style="margin-top: 60px">
    <div class="row justify-content-center">
        <div class="col-lg-5" >
            <form action="{{ route('admin.create') }}" method="post" class="px-2" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="card shadow">
                    <div class="card-body bg-light rounded">
                        {{-- <h5 class="fw-bold text-center mt-4">CREATE ACCOUNT </h5> --}}
                        <main class="form-register p-4">
                            <div class="mb-3">
                                <label for="image" class="form-label">Upload Image</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" required>
                                @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <input class="btn btn-primary" type="submit" value="Submit">
                                {{-- <small class="d-block text-center mt-3">Already register?<a href="{{ route('admin.login') }}">Login</a></small> --}}
                            </div>
                        </main>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
