@extends('layouts.admin')

@section('title', 'Halaman Admin Pengguna')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Halaman Admin Pengguna</h4>
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
                            Pengguna
                        </a>
                    </li>                    
                </ul>
            </div>        
            <div class="card">        
                <div class="card-header">
                    <div class="card-title"><strong>
                        <i class="fas fa-list"></i> &nbsp; Daftar Pengguna</strong> </div>
                </div>
                <div class="card-body bg-disabled">
                    <div class="row mb-2">
                        <div class="col-md-8 col-lg-6">
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.profile.create') }}">
                                <i class="fas fa-plus"></i> &nbsp; Tambah Data
                            </a>
                            <button class="btn btn-sm btn-disabled" id="btnImpor">
                                <i class="fas fa-table"></i> &nbsp; Import dari Excel
                            </button>
                        </div>
                        <div class="col-md-8 col-lg-6">
                            <button class="btn btn-sm btn-success" >
                                <i class="fas fa-book"></i> &nbsp; Data Referensi
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Kategori</th>
                                            <th>Nama Lengkap</th>
                                            <th>Role</th>                                            
                                            <th>Aksi</th>                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama Lengkap</th>
                                            <th>Role</th>                                            
                                            <th>Aksi</th>  
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
    
@endsection

@section ('script') 

    <script>
    
        jQuery('document').on('ready', function () {

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
        });
    </script>
@endsection

