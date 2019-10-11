<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/logo.png')}}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}"/>
    {{-- <link rel="stylesheet" href="{{ asset('css/docs.theme.min.css') }}"/> --}}
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body style="overflow-x: hidden">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm fixed-top">
        <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('img/logo.png')}}" style="height: 60px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNalakab" aria-controls="navbarNalakab" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNalakab">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">
                        <i class="fa fa-home fa-lg" aria-hidden="true"></i> Beranda
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="ProfilDesa" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profil Desa</a>
                    <div class="dropdown-menu" aria-labelledby="ProfilDesa">
                        <a class="dropdown-item" href="{{ url('/penduduk') }}">Penduduk</a>
                        <a class="dropdown-item" href="{{ url('/infrastruktur') }}">Infrastruktur</a>
                        <a class="dropdown-item" href="{{ url('/pendidikan') }}">Pendidikan</a>
                        <a class="dropdown-item" href="#">Kesehatan</a>
                        <a class="dropdown-item" href="#">Industri</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="Berita" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Berita</a>
                    <div class="dropdown-menu" aria-labelledby="Berita">
                        <a class="dropdown-item" href="#">Agenda</a>
                        <a class="dropdown-item" href="#">Pembangunan</a>
                        <a class="dropdown-item" href="#">Kegiatan</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pengumuman</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="Organisasi" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Organisasi</a>
                    <div class="dropdown-menu" aria-labelledby="Organisasi">
                        <a class="dropdown-item" href="#">BPD</a>
                        <a class="dropdown-item" href="#">LPMD</a>
                        <a class="dropdown-item" href="#">Karang Taruna</a>
                        <a class="dropdown-item" href="#">Linmas</a>
                        <a class="dropdown-item" href="#">PKK</a>
                        <a class="dropdown-item" href="#">Posyandu</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Layanan</a>
                </li>                
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>                    
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.home') }}">                                                    
                                <i class="fa fa-gear"></i> Admin Page
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i>   {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
    </nav>

        @yield('content')
        

<footer class="navbar-nav navbar-dark bg-dark mt-5" style="padding: 40px;">
    <div class="container">
        <div class="row justify-content-between m-auto">
            <div class="card-transparent text-white" style="width: 20rem;">
                <h4 class="card-title">Bakalan Desaku</h4>
                <hr class="border-warning"/>
                <div class="card-body">
                <p class="card-text">Desa Bakalan adalah salah satu desa berkembang di Kecamatan Bululawang, Kabupaten Malang.</p>
                </div>
            </div>
            <div class="card-transparent text-white" style="width: 20rem;">
                <h4 class="card-title">Ikuti Kami</h4>
                <hr class="border-warning"/>
                <div class="card-body">
                <p class="card-text">
                    <i class="fa fa-facebook-square"> Facebook</i>
                </p>
                <p class="card-text">
                    <i class="fa fa-twitter-square"> Twitter</i>
                </p>
                </div>
            </div>
            <div class="card-transparent text-white" style="width: 20rem;">
                <h4 class="card-title">Kontak Kami</h4>
                <hr class="border-warning"/>
                <div class="card-body">
                <p class="card-text">Jl. Raya Bakalan, Dusun Bakalan 01, Desa Bakalan, Kec. Bululawang, Malang, Jawa Timur 65171</p>
                </div>
            </div>
        </div>
            <br>
        <hr class="border-warning">
        <div class="row text-white justify-content-center mb-1">
            &copy; <script>document.write(new Date().getFullYear());</script> Nalakab <br>
        </div>
        <div class="row text-white justify-content-center">
            <p>Website ini dibuat oleh Rohmat Hidayat & M Ihsan.</p>
        </div>
    </div>
</footer>



<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('js/jquery.lettering.js') }}"></script>
<script src="{{ asset('js/jquery.textillate.js') }}"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>
<script>
AOS.init();
</script>
@yield('script')
</div>
</body>
</html>
