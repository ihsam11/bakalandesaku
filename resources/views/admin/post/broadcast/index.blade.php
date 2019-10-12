@extends('layouts.admin')

@section('title', 'Halaman Admin Posting')

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Halaman Admin Posting</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">                        
                        <a href="{{ route('admin.home') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.user') }}">                            
                            Posting
                        </a>
                    </li>                    
                </ul>
            </div>        
            <div class="card">        
                <div class="card-header">
                    <ul class="nav nav-pills nav-secondary">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Agenda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pengumuman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pengumuman</a>
                        </li>
                    </ul>
                    <div class="card-title">
                        <!-- <strong><i class="fas fa-list"></i> &nbsp; Daftar Pengguna</strong>  -->
                    </div>
                </div>
                <div class="card-body bg-disabled">
                    <div class="row mb-2">
                        <div class="col-md-8 col-lg-6">
                            <button class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                                <i class="fas fa-plus"></i> &nbsp; Tambah Data
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#" onclick="add('news')">Berita</a></li>                                
                                <li><a href="#" onclick="add('agenda')">Agenda</a></li>                                
                                <li><a href="#" onclick="add('announcement')">Announcement</a></li>                                
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">                            
                            <textarea name="" id="" cols="30" rows="10" class="summernote"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script>
        $('#multi-filter-select').DataTable( {
            "pageLength": 5,
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select class="form-control"><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                            );

                        column
                        .search( val ? '^'+val+'$' : '', true, false )
                        .draw();
                    } );

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        });

        $('.summernote').summernote({
            placeholder: 'Millenium',
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
            tabsize: 2,
            height: 300
        });
    </script>
@endsection
