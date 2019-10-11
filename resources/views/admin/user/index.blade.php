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
                            <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#import" id="btnImpor">
                                <i class="fas fa-table"></i> &nbsp; Import dari Excel
                            </button>
                        </div>
                        <div class="col-md-8 col-lg-6 text-right">
                            <button class="btn btn-sm btn-success" id="btnRefs">
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
                                            <th>NO</th>
                                            <th>NIK</th>
                                            <th>NAMA LENGKAP</th>
                                            <th>E-MAIL</th>                                            
                                            <th>AKSI</th>                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>NO</th>
                                            <th>NIK</th>
                                            <th>NAMA LENGKAP</th>
                                            <th>E-MAIL</th>                                            
                                            <th>AKSI</th>   
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($user as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nik }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td></td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>

    <div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="/user/import" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <label>Pilih file excel</label>
                        <div class="form-group">
                            <input type="file" name="file" required="required">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </form>
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

