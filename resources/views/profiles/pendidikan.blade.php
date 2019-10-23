@extends('layouts.app')
@section('title', 'Pendidikan di Desa Bakalan')

@section('content')
    <div class="container" style="margin-top:100px;">
        <div class="row">
            <h2 class="display-5">Pendidikan di Desa Bakalan</h1>
        </div>
        <hr class="border-warning"/>
        <ul class="nav nav-tabs justify-content-between" id="Tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="tk-tab" data-toggle="tab" href="#tk" role="tab" aria-controls="tk" aria-selected="true">Taman Kanak-kanak (TK)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="sd-tab" data-toggle="tab" href="#sd" role="tab" aria-controls="sd" aria-selected="true">Sekolah Dasar (SD)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="smp-tab" data-toggle="tab" href="#smp" role="tab" aria-controls="smp" aria-selected="true">Sekolah Menengah Pertama (SMP)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="sma-tab" data-toggle="tab" href="#sma" role="tab" aria-controls="sma" aria-selected="true">Sekolah Menengah Atas (SMA)</a>
            </li>
          </ul>
          <div class="tab-content" id="TabsContent">
            <div class="tab-pane fade show active" id="tk" role="tabpanel" aria-labelledby="tk-tab">
                <div class="row mt-4">
                    <div class="col-lg-5">
                        <img class="img-responsive rounded-lg" src="{{ asset('img/99.JPG')}}" style="height: 300px;">
                    </div>
                    <div class="col-lg-7" style="height: 300px;">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia maiores quae est id dolor repudiandae placeat modi facere ipsam, excepturi temporibus, provident, nam similique quia dolore nemo vitae earum iste?
                        <button class="btn btn-outline-primary d-flex align-self-end">Baca Selengkapnya</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="sd" role="tabpanel" aria-labelledby="sd-tab">
                <div class="row mt-4">
                    <div class="col-lg-5">
                        <img class="img-responsive rounded-lg" src="{{ asset('img/99.JPG')}}" style="height: 300px;">
                    </div>
                    <div class="col-lg-7" style="height: 300px;">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia maiores quae est id dolor repudiandae placeat modi facere ipsam, excepturi temporibus, provident, nam similique quia dolore nemo vitae earum iste?
                        <button class="btn btn-outline-primary d-flex align-self-end">Baca Selengkapnya</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="smp" role="tabpanel" aria-labelledby="smp-tab">
                <div class="row mt-4">
                    <div class="col-lg-5">
                        <img class="img-responsive rounded-lg" src="{{ asset('img/99.JPG')}}" style="height: 300px;">
                    </div>
                    <div class="col-lg-7" style="height: 300px;">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia maiores quae est id dolor repudiandae placeat modi facere ipsam, excepturi temporibus, provident, nam similique quia dolore nemo vitae earum iste?
                        <button class="btn btn-outline-primary d-flex align-self-end">Baca Selengkapnya</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="sma" role="tabpanel" aria-labelledby="sma-tab">
                <div class="row mt-4">
                    <div class="col-lg-5">
                        <img class="img-responsive rounded-lg" src="{{ asset('img/99.JPG')}}" style="height: 300px;">
                    </div>
                    <div class="col-lg-7" style="height: 300px;">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia maiores quae est id dolor repudiandae placeat modi facere ipsam, excepturi temporibus, provident, nam similique quia dolore nemo vitae earum iste?
                        <button class="btn btn-outline-primary d-flex align-self-end">Baca Selengkapnya</button>
                    </div>
                </div>
            </div>
          </div>             
    </div>
@endsection