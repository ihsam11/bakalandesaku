<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="referrer" content="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/logo-99.png')}}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    @yield('style')
</head>
<body style="overflow-x: hidden">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm fixed-top">
        <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('img/logo-99.png')}}" style="height: 60px;">
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
                        <a class="dropdown-item" href="{{ url('/kesehatan') }}">Kesehatan</a>
                        <a class="dropdown-item" href="{{ url('/industri') }}">Industri</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="Berita" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Berita</a>
                    <div class="dropdown-menu" aria-labelledby="Berita">
                        <a class="dropdown-item" href="{{ url('/agenda') }}">Agenda Desa</a>
                        <a class="dropdown-item" href="{{ url('/pembangunan') }}">Pembangunan</a>
                        <a class="dropdown-item" href="{{ url('/kegiatan') }}">Kegiatan</a>
                        <a class="dropdown-item" href="{{ url('/pengumuman') }}">Pengumuman</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/galeri">Galeri</a>
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
                    <a class="nav-link disabled" href="#">Layanan</a>
                </li>                
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest                    
                    <li class="nav-item">
                        <a class="nav-link disabled" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>                    
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @auth
                            @if( Auth::user()->role_id == 2)
                            <a class="dropdown-item" href="{{ url('profile/'.Auth::user()->id.'/edit') }}">
                                <i class="fa fa-gear"></i> Edit Profile
                            </a>
                            @else
                            <a class="dropdown-item" href="{{ route('admin.home') }}">
                                <i class="fa fa-gear"></i> Admin Page
                            </a>
                            <a class="dropdown-item" href="{{ url('profile/'.Auth::user()->id.'/edit') }}">
                                <i class="fa fa-gear"></i> Edit Profile
                            </a>
                            @endif
                            @endauth
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
            <div class="card-transparent text-white" style="width: 25rem;">
                <h4 class="card-title">Kritik & Saran</h4>
                <hr class="border-warning"/>
                <div class="card-body row">
                    <div class="col-6">
                        <div class="card-title text-center"><strong>Rohmat Hidayat</strong></div>
                        <div class="card-text d-flex justify-content-around mb-3">
                            <a href="http://facebook.com/devusion" class="text-white">
                                <i class="fa fa-facebook fa-2x"></i>
                            </a>
                            <a href="http://instagram.com/rohmathdy" class="text-white">
                                <i class="fa fa-instagram fa-2x"></i>
                            </a>
                        </div>
                        <div class="card-text d-flex justify-content-around">
                            <a href="http://linkedin.com/in/rohmat-hidayat-38648a140" class="text-white">
                                <i class="fa fa-linkedin fa-2x"></i>
                            </a>
                            <a href="https://wa.me/6285755667699" class="text-white">
                                <i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card-title text-center"><strong>Muhammad Ikhsan</strong></div>
                        <div class="card-text d-flex justify-content-around mb-3">
                            <a href="#" class="text-white">
                                <i class="fa fa-facebook fa-2x"></i>
                            </a>
                            <a href="#" class="text-white">
                                <i class="fa fa-twitter fa-2x"></i>
                            </a>
                        </div>
                        <div class="card-text d-flex justify-content-around">
                            <a href="#" class="text-white">
                                <i class="fa fa-linkedin fa-2x"></i>
                            </a>
                            <a href="#" class="text-white">
                                <i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
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
            <p>Website ini dibuat oleh 
                <a href="https://wa.me/6285755667699" class="text-white">
                <i class="fa fa-whatsapp" aria-hidden="true"> Rohmat Hidayat</i>
                </a> &                 
                <a href="https://wa.me/6285777937334" class="text-white">
                    <i class="fa fa-whatsapp" aria-hidden="true"> Muhammad Ikhsan</i>
                </a>
            </p>
        </div>
    </div>
</footer>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('js/jquery.lettering.js') }}"></script>
<script src="{{ asset('js/jquery.textillate.js') }}"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>
@yield('script')
</div>
</body>
</html>
