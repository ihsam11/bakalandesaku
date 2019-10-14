@extends('layouts.admin')

@section('title', 'Halaman Pengguna')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Halaman Pengguna</h4>
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
                        <a href="{{ url('admin/user') }}">                            
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
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-8 col-lg-6">
                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create" >
                                <i class="fas fa-plus-circle"></i> &nbsp; Tambah Data
                            </button>
                            <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#import" id="btnImpor">
                                <i class="fas fa-table"></i> &nbsp; Import dari Excel
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
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
                                                    <td>
                                                        <button class="btn btn-sm btn-primary">
                                                            <i class="fas fa-cog"></i>
                                                        </button>
                                                    </td>
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
        </div>
    </div>

    @include('admin.user.create')

    @include('admin.user.import')

@endsection

@section ('script') 
    <script>
        $('#multi-filter-select').DataTable( {
            "pageLength": 4,
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
    </script>
@endsection

