@extends('layouts.app')
@section('title', 'Kegiatan Desa Bakalan')

@section('content')
<div class="container" style="margin-top:100px;">
    <div class="row">
        <h2 class="display-5">Kegiatan</h1>
    </div>
    <hr class="border-warning"/>
    <div class="row justify-content-around">
        @foreach ($kegiatan as $item)
        <div class="col-auto mb-3">
            <div class="card" style="width: 20rem;">
            <img class="card-img-top rounded-lg" src="{{ asset('img/perangkat.jpeg') }}" alt="">
            <div class="card-body">
                <h4 class="card-title">{{ $item->title }}</h4>
                <p class="card-text">
                    {{ str_limit(strip_tags($item->content), 100) }}
                    @if (strlen(strip_tags($item->content)) > 100)
                    <a href="#" id="readmore" data-judul="{{ $item->title }}" data-konten="{{ $item->content }}" data-toggle="modal" data-target="#konten" class="badge badge-info">
                        Selengkapnya
                    </a>
                    @endif
                </p>
            </div>
            <div class="card-footer">
                <p class="text-muted">Posted by {{ $item->user_id }}</p>
                <small class="text-muted">Last updated at {{ \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() }}</small>
            </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
      
<!-- Modal -->
<div class="modal fade" id="konten" tabindex="-1" role="dialog" aria-labelledby="KontenModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="KontenModal">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
$('#konten').on('show.bs.modal', function (e) {
    var judul = $(e.relatedTarget).data('judul');
    var konten = $(e.relatedTarget).data('konten');
    $(this).find('.modal-title').html(judul);
    $(this).find('.modal-body').html(konten);
    
});
</script>
@endsection