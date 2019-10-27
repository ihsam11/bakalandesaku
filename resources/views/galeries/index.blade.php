@extends('layouts.app')
@section('title', 'Galeri Foto & Video')

@section('content')
<div class="container" style="margin-top:100px;">
    <div class="row" style="margin-top:50px;">
        <h2 class="display-5">Galeri Foto & Video</h1>
    </div>
    <hr class="border-warning"/>
    <ul class="nav nav-pills mb-2" id="Tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="foto-tab" data-toggle="tab" href="#foto" role="tab" aria-controls="foto" aria-selected="true">Foto</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="video-tab" data-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="true">Video</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="foto" role="tabpanel" aria-labelledby="foto-tab">
            <div class="card shadow rounded-lg">
                <div class="card-header d-flex justify-content-between">
                    <div class="hovereffect rounded-lg mb-2" style="width:200px; height:200px;" ontouchstart="" ontouchend="">
                        <img class="img-responsive" src="{{ asset('img/-.jpeg') }}" alt="">
                        <div class="overlay">
                            <a class="info" href="" data-toggle="modal" data-target="#modelId">foto</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
            <div class="card shadow rounded-lg">
                <div class="card-header d-flex justify-content-between">
                    <div class="hovereffect rounded-lg mb-2" style="width:200px; height:200px;" ontouchstart="" ontouchend="">
                        <img class="img-responsive" src="{{ asset('img/-.jpeg') }}" alt="">
                        <div class="overlay">
                            <a class="info" href="" data-toggle="modal" data-target="#modelId">video</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                Body
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection