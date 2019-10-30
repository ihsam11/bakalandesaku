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
                        <i class="fas fa-users"></i> &nbsp; Daftar Pengguna</strong> </div>
                </div>
                <div class="card-body">
                    <!-- <div class="row mb-4">
                        <div class="col-md-8 col-lg-6">
                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create" >
                                <i class="fas fa-plus-circle"></i> &nbsp; Tambah Data
                            </button>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    @if (session('message'))
                                        <div class="row">
                                            <div class="col">
                                                <div class="alert {{ session('alert') }}">
                                                    <i class="fas {{ session('icon') }}"></i>
                                                    {{ session('message') }}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="table-responsive">
                                        <table id="multi-filter-select" class="display table table-striped table-hover" >
                                            <thead>
                                                <tr>
                                                    <th>NIK</th>
                                                    <th>NAMA LENGKAP</th>
                                                    <th>E-MAIL</th>
                                                    <th>ROLE</th>
                                                    <th>AKSI</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>NIK</th>
                                                    <th>NAMA LENGKAP</th>
                                                    <th>ROLE</th>
                                                    <th>AKSI</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
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

    <div class="modal fade" id="show">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            </div>
        </div>
    </div>

    @include('admin.user.import')

@endsection

@section ('script')
    <script type="text/javascript">

        var users = $('#multi-filter-select').DataTable( {
            serverSide: true,
            processing: true,
            pageLength: 4,
             columnDefs: [
                { responsivePriority: 1, targets: 2 }
            ],
            ajax: "{{ url('admin/user/userdatatable') }}",
            columns: [
                { data: 'nik'},
                { data: 'name' },
                { data: 'email'},
                {
                    data: 'role',
                    searchable: false
                },
                {
                    data: 'id',
                    render: function (data, type, row) {
                        return appendButton(data)
                    }
                }
            ],
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

        function appendButton(id) {
            let open    = "<a class='btn btn-sm btn-warning' href='user/"+ id +"/edit'>";
            let icon    = "<i class='fas fa-edit'></i>";
            let close   = "</a>";

            return (open + icon + close);
        }

        function show(id) {
            $.get('user/' + id, function (data) {
                $('#show .modal-content').html('');
                $('#show .modal-content').html(data);
                $('#show').modal('show');
            });
        }
    </script>
@endsection

