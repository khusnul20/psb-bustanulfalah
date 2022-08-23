<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PSB BUFA | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">

</head>
<body style="background-image: linear-gradient(to left, #4ca2cd,#67b26f);">
    <div class="contariner" style="margin-top: 120px">
        <div class="row justify-content-center">
            <div class="col-lg-6" >
                <form action="{{ route('pengurus.create') }}" method="post" class="px-2" autocomplete="off" enctype="multipart/form-data">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session()->has('fail'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('fail') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @csrf
                    <div class="card shadow">
                        <div class="card-body bg-light rounded">
                            <div class="text-center">
                                <h5 class="fw-bold text-center mt-2">CREATE ACCOUNT </h5>
                            </div>
                            <hr>
                            <div class="container">
                                <div class="row mt-3">
                                    <div class="col-sm">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required value="{{ old('name') }}">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm">
                                        <label for="jabatan" class="form-label">Jabatan</label>
                                        <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" required value="{{ old('jabatan') }}">
                                        @error('jabatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm">
                                        <label for="image" class="form-label">Upload Image</label>
                                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" required>
                                        @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm">
                                        <label for="email" class="mb-1">Email</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" required value="{{ old('email') }}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm">
                                        <label for="password" class="mb-1">Password</label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mt-3">
                                        <button class="w-100 btn btn-lg text-light" style="background-color: rgb(28, 163, 187); border-radius: 15px" type="submit">Register</button>
                                        <small class="d-block text-center mt-3">Already register?<a href="{{ route('pengurus.login') }}">Login</a></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
