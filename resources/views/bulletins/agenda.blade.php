@extends('layouts.app')
@section('title', 'Agenda Desa Bakalan')

@section('content')
<div class="container" style="margin-top:100px;">
    <div class="row">
        <h2 class="display-5">Agenda Desa</h2>
    </div>
    <hr class="border-warning"/>
    <table class="table" id="agenda" style="width:100%;">
        <thead class="thead-light bg-info">
            <tr>
                <th scope="col">NO</th>
                <th scope="col">JUDUL</th>
                <th scope="col">URAIAN</th>
                <th scope="col">TANGGAL MULAI</th>
                <th scope="col">PERKIRAAN SELESAI</th>
                <th scope="col">POSTED BY</th>
            </tr>
        </thead>
    </table>
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
<script>
$(document).ready(function() {
    var user = $('#agenda').DataTable( {
        processing: true,
        serverSide: true,
        responsive: true,
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: 1 },
        ],
        ajax: "{{ url('agenda/agendatable') }}",
        columns: [
            { data: 'id' },
            { data: 'title' },
            { data: 'description' },
            { data: 'date_start' },
            { data: 'date_finish' },
            { data: 'user_id', },
        ]
    });
});
</script>
@endsection