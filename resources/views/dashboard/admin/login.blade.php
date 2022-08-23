{{-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PSB BUFA | ADMIN</title>
    <link rel="icon" href="/img/logo.png" type="image/gif" sizes="16x16">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body style="background-color: rgb(40, 119, 97);">
    <div class="container" style="margin-top: 105px">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card-body bg-light rounded">
                    <main class="form-signin ">
                        <form action="{{ route('admin.check') }}" method="post" class="p-4">

                            @csrf
                            <div class="text-center">
                                <img class="mb-3" src="https://i.postimg.cc/Qd2Pfmbr/logo.png" alt="" width="100">
                            </div>
                            <h5 class="text-center mb-3 fw-bold text-dark">Administrator PSB Buffa</h5>
                            <div class="form-floating">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter email address" required autocomplete="email" autofocus value="{{ old('email') }}">
                                <label for="email">Email address</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <div class="form-floating">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="password">Password</label>

                            </div>
                            <button class="w-100 btn btn-lg text-light" type="submit" style="background-color: rgb(40, 119, 97); border-radius: 15px">Login</button>
                            <small class="d-block text-center mt-3">Belum Registrasi?<a href="{{ route('admin.register') }}">Registerasi dulu</a></small>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </div>
</body>
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="/vendor/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body style="background-color: rgb(40, 119, 97)">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg" style="margin-top: 100px">
                    <div class="card-body p-0">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 mt-4 mb-4">
                                <div class="p-2 mt-4 mb-4">
                                    <form class="user" action="{{ route('admin.check') }}" method="post">
                                        <div class="text-center ">
                                            <img class="mb-3" src="https://i.postimg.cc/Qd2Pfmbr/logo.png" alt="" width="100">
                                        </div>
                                        <div class="text-center mb-3">
                                            <h5 class=" font-weight-bold text-dark">Administrator PSB Buffa</h5>
                                        </div>
                                        @if (session()->has('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        @if (session()->has('fail'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ session('fail') }}
                                            </div>
                                        @endif
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control   form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan email..." autofocus value="{{ old('email') }}" required>
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control  form-control-user" id="exampleInputPassword" placeholder="Password" required>
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-user btn-block fs-6 text-light" style="background-color: rgb(40, 119, 97)">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
