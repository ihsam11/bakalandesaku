@extends('layouts.app')

@section('title', 'Selamat Datang di Website Desa Bakalan')

@section('content')
    
<div id="carouselId" class="carousel slide" data-ride="carousel" style="margin-top: 87px;">
    <ol class="carousel-indicators">
        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
        <li data-target="#carouselId" data-slide-to="1"></li>
        <li data-target="#carouselId" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img src="{{ asset('img/view_1.jpeg')}}" alt="First slide" style="height:558px; width:100%; object-fit: cover;">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/old.JPG')}}" alt="First slide" style="height:558px; width:100%; object-fit: cover;">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/view_2.JPG')}}" alt="First slide" style="height:558px; width:100%; object-fit: cover;">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container" style="margin-top:60px;">
    <div class="row" style="margin-top:50px;">
        <h1 class="display-4">Sejarah Singkat</h1>
    </div>
    <hr class="border-warning"/>
    <div class="row">
        <div class="col-lg-6 mb-4">
            <img class="img-fluid rounded-lg" src="{{ asset('img/barongan.jpeg')}}" alt="First slide">
        </div>
        <div class="col-lg-6">
                <p> Menelusuri sejarah terwujudnya Desa Bakalan yang bersumber dari peninggalan, situs sejarah atau temuan benda-benda purbakala lainnya untuk dipakai sebagai petunjuk dasar penentuan Kapan Cikal Bakal bedah alas Bakalan adalah sulit untuk dibuktikan karena bukti-bukti tersebut sampai saat ini tidak pernah ditemukan sehingga bahan-bahan atau sumber-sumber lain yang dipakai adalah cerita dari para pinisepuh / pendahulu & para leluhur desa. Dari sumber tersebut dipercayai bahwa cikal bakal Bakalan bermula dari suatu tempat / lokasi yang disebut tanah <b>EMBAK</b> (tanah yang berair serta berlumpur).</p>
                <p>Konon disuatu tempat sumber air &  tanah yang berair serta berlumpur datanglah seseorang dari suku jawa yang mendiami &  mendirikan pesanggrahan di tempat tersebut untuk mulai mbakali / babat / membuka alas di sekitar aliran sumber air tersebut.</p>
                <p>Dari cerita sumber-sumber yang dipercaya bahwa orang tersebut tidak diketahui namanya, dari mana asalnya & wafatnya dimana. Tetapi di tempat tersebut & sekarang masih ada terdapat sebuah pohon / wit kembang suko, maka oleh orang-orang sekitar orang tersebut terkenal / diberi nama <b>SUKO</b> atau <b>MBAH SUKO</b>.
                </p>
                <p>Dipercayai oleh penduduk sekitar bahwa tempat itu bukanlah sebuah makam / punden, tetapi merupakan tempat peristirahatan / pesanggrahan yang juga digunakan sebagai tempat / altar acara ritual menanam & panen padi. Ritual Acara menanam & panen padi disebut <b>SADRAN</b>, sedangkan tempat untuk ritual disebut <b>SADRANAN</b>. Dalam perkembangannya Sadranan juga dipergunakan untuk acara tasyakuran / kirim doa untuk para leluhur pada acara bersih desa, atau syukuran hajat perorangan.
                </p>
                <p>Mbah Suko dipercayai sebagai orang yang wiwiti / mbakali bedah krawang desa. Dari kata Embak yang berarti tanah berair & berlumpur serta kata Mbakali yang berarti memulai,  maka daerah tersebut diberi nama <b>MBAKALAN</b>. Kata mbakalan sendiri dalam perkembangan ejaannya disebut <b>BAKALAN</b>.
                </p>
                <p>Dari Cerita Alm Bapak <b>Mustam Kertoardjo</b>, seseorang yang pernah menjabat sebagai Carik s/d Petinggi ke-2 pada tahun 1926 – 1966.  maka diperoleh informasi bahwa beliau lahir pada tahun 1895 M & merupakan generasi ke-5 dari penelusuran silsilah ke belakang, maka diperkirakan bahwa Mbah Suko telah melakukan bedah krawang sekitar abad 17 M.</p>
        </div>
    </div>
    <div class="row" style="margin-top:50px;">
        <h1 class="display-4">Struktur Organisasi</h1>
    </div>
    <hr class="border-warning"/>
    <div class="row mb-3">
        <div class="card w-100 border-primary p-3">
            <div class="card-header d-flex justify-content-center">
                <div class="hovereffect rounded-lg" style="width:190px; height:190px;" ontouchstart="" ontouchend="">
                    <img class="img-responsive" src="{{ asset('img/petinggi.jpeg') }}" alt="">
                    <div class="overlay">
                        <p>
                            <b>Abdul Halim</b>
                            <br/><br/>
                            Kepala Desa
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-body row d-flex justify-content-between">
                <div class="card col-md-8 border-warning">
                    <div class="card-header d-flex justify-content-center">
                        <div class="hovereffect rounded-lg" style="width:190px; height:190px;" ontouchstart="" ontouchend="">
                            <img class="img-responsive" src="{{ asset('img/sekdes.jpeg') }}" alt="">
                            <div class="overlay">
                                <p>
                                    <b>Abdul Gofar</b>
                                    <br/><br/>
                                    Sekretaris Desa
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-around" style="height: 100%;">
                        <div class="hovereffect my-3 rounded-lg" style="width:190px; height:190px;" ontouchstart="" ontouchend="">
                            <img class="img-responsive" src="{{ asset('img/-.jpeg') }}" alt="">
                            <div class="overlay">
                                <p>
                                    <b>Sandi Cahyadi</b>
                                    <br/><br/>
                                    Kaur TU & Umum
                                </p>
                            </div>
                        </div>
                        <div class="hovereffect my-3 rounded-lg" style="width:190px; height:190px;" ontouchstart="" ontouchend="">
                            <img class="img-responsive" src="{{ asset('img/keuangan.jpeg') }}" alt="">
                            <div class="overlay">
                                <p>
                                    <b>Khusnul Khotimah</b>
                                    <br/><br/>
                                    Kaur Keuangan
                                </p>
                            </div>
                        </div>
                        <div class="hovereffect my-3 rounded-lg" style="width:190px; height:190px;" ontouchstart="" ontouchend="">
                            <img class="img-responsive" src="{{ asset('img/-.jpeg') }}" alt="">
                            <div class="overlay">
                                <p>
                                    <b>Suwito</b>
                                    <br/><br/>
                                    Kaur Perencana an
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-md-3">
                    <div class="d-flex flex-column bd-highlight mb-3">
                        <div class="card-body d-flex justify-content-center">
                            <div class="hovereffect rounded-lg" style="width:190px; height:190px;" ontouchstart="" ontouchend="">
                                <img class="img-responsive" src="{{ asset('img/-.jpeg') }}" alt="">
                                <div class="overlay">
                                    <p>
                                        <b>M. Rifai</b>
                                        <br/><br/>
                                        Kasi Pemerintah an
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <div class="hovereffect rounded-lg" style="width:190px; height:190px;" ontouchstart="" ontouchend="">
                                <img class="img-responsive" src="{{ asset('img/-.jpeg') }}" alt="">
                                <div class="overlay">
                                    <p>
                                        <b>M. Mas'ud</b>
                                        <br/><br/>
                                        Kasi Kesejahtera an
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <div class="hovereffect rounded-lg" style="width:190px; height:190px;" ontouchstart="" ontouchend="">
                                <img class="img-responsive" src="{{ asset('img/pelayanan.jpeg') }}" alt="">
                                <div class="overlay">
                                    <p>
                                        <b>Miftahul Adzib</b>
                                        <br/><br/>
                                        Kasi Pelayanan
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body mx-auto p-2">
            <div class="row justify-content-around">
                    <div class="col-auto mb-3">
                        <div class="hovereffect rounded-lg" style="width:190px; height:190px;" ontouchstart="" ontouchend="">
                            <img class="img-responsive" src="{{ asset('img/bakalan01.jpeg') }}" alt="">
                            <div class="overlay">
                                <p>
                                    <b>Hasan Bisri</b>
                                    <br/><br/>
                                    Kasun Bakalan 01
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto mb-3">
                        <div class="hovereffect rounded-lg" style="width:190px; height:190px;" ontouchstart="" ontouchend="">
                            <img class="img-responsive" src="{{ asset('img/-.jpeg') }}" alt="">
                            <div class="overlay">
                                <p>
                                    <b>Moch Machrus</b>
                                    <br/><br/>
                                    Kasun Bakalan 02
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto mb-3">
                        <div class="hovereffect rounded-lg" style="width:190px; height:190px;" ontouchstart="" ontouchend="">
                            <img class="img-responsive" src="{{ asset('img/-.jpeg') }}" alt="">
                            <div class="overlay">
                                <p>
                                    <b>Belum Ada</b>
                                    <br/><br/>
                                    Kasun Jamuran
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto mb-3">
                        <div class="hovereffect rounded-lg" style="width:190px; height:190px;" ontouchstart="" ontouchend="">
                            <img class="img-responsive" src="{{ asset('img/banjarsari01.jpeg') }}" alt="">
                            <div class="overlay">
                                <p>
                                    <b>Umar Ma'syum</b>
                                    <br/><br/>
                                    Kasun Banjarsari 01
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto mb-3">
                        <div class="hovereffect rounded-lg" style="width:190px; height:190px;" ontouchstart="" ontouchend="">
                            <img class="img-responsive" src="{{ asset('img/-.jpeg') }}" alt="">
                            <div class="overlay">
                                <p>
                                    <b>Abd Halim</b>
                                    <br/><br/>
                                    Kasun Banjarsari 02
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto mb-3">
                        <div class="hovereffect rounded-lg" style="width:190px; height:190px;" ontouchstart="" ontouchend="">
                            <img class="img-responsive" src="{{ asset('img/-.jpeg') }}" alt="">
                            <div class="overlay">
                                <p>
                                    <b>Belum Ada</b>
                                    <br/><br/>
                                    Kasun Kebonjati
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row justify-content-between" style="margin-top:50px;">
        <h1 class="display-4">Foto & Video</h1>
        <span class="align-self-end">
            <button class="btn btn-outline-primary">Lihat semua
                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
            </button>
        </span>
    </div>
    <hr class="border-warning"/>
    <div class="row">
        <div class="col-md-8" style="height: 380px;">
            <img class="img-responsive rounded-lg" src="{{ asset('img/DSC_3508.JPG') }}" alt="" style="width:100%; height:100%; object-fit:cover;">
        </div>
        <div class="col-md-4">
            <div class="row justify-content-between">
                <div class="col-md-6" style="height: 180px;">
                    <img class="img-responsive rounded-lg" src="{{ asset('img/DSC_3508.JPG') }}" alt="" style="width:100%; height:100%; object-fit:cover;">
                </div>
                <div class="col-md-6" style="height: 180px;">
                    <img class="img-responsive rounded-lg" src="{{ asset('img/DSC_3508.JPG') }}" alt="" style="width:100%; height:100%; object-fit:cover;">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6" style="height: 180px;">
                    <img class="img-responsive rounded-lg" src="{{ asset('img/DSC_3508.JPG') }}" alt="" style="width:100%; height:100%; object-fit:cover;">
                </div>
                <div class="col-md-6" style="height: 180px;">
                    <img class="img-responsive rounded-lg" src="{{ asset('img/DSC_3508.JPG') }}" alt="" style="width:100%; height:100%; object-fit:cover;">
                </div>
            </div>
        </div>
    </div>        
</div>
@endsection
@section('script')
<script>
$(function(){
    $('#structure').orgChart();
});
</script>
@endsection

