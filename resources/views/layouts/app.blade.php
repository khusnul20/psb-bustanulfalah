<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!--  CSS -->
        <link rel="stylesheet" href="/css/style.css">
        <link rel="icon" href="/img/logo.png" type="image/gif" sizes="16x16">

        <title>PSB BUFA | Blog </title>
    </head>
    <body>

        <div id="app">
            <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light shadow p-2 mb-5 bg-body">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="https://i.postimg.cc/Qd2Pfmbr/logo.png" alt="" width="60px" class="d-inline-block align-text-button">
                        <span class="fw-bold p-1-lg fs-5 text-light">PONPES BUSTANUL FALAH</span>
                    </a>
                    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        {{-- <ul class="navbar-nav me-auto">

                        </ul> --}}

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto ">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('user.login'))
                                    <li class="nav-item">
                                        <a href="{{ route('user.login') }}" class="btn me-md-2 button-nav" type="button">{{ __('Login') }}</a>

                                    </li>
                                @endif

                                @if (Route::has('user.register'))
                                    <li class="nav-item ">
                                        <a href="{{ route('user.register') }}" class="btn me-md-2 button-nav2" type="button">{{ __('Daftar') }}</a>
                                    </li>
                                @endif
                            @else
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main>
                @yield('content')
            </main>
        </div>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
