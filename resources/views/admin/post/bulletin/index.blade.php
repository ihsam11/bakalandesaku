@extends('layouts.admin')

@section('title', 'Halaman Posting Berita')


@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Halaman Posting Berita</h4>
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
                        <a href="{{ url('admin/bulletin') }}">
                            Posting Berita
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <strong><i class="fas fa-newspaper"></i> &nbsp; Daftar Posting Berita</strong>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col">
                            <a class="btn btn-sm btn-primary" href="bulletin/create">
                                <i class="fas fa-plus-circle"></i> &nbsp; Tambah Berita
                            </a>
                            <a class="btn btn-sm btn-secondary" href="/admin/topic">
                                <i class="fas fa-list"></i> &nbsp; Daftar Topik Berita
                            </a>
                        </div>
                    </div>
                    @if ( session('message') )
                    <div class="row">
                        <div class="col">
                            <div class="alert {{ session('alert') }}">
                                <i class="fas {{ session('icon') }}"></i> &nbsp;
                                {{ session('message') }}
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center" id="index">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>KATEGORI</th>
                                                    <th>JUDUL BERITA</th>
                                                    <th>TANGGAL POST</th>
                                                    <th>VIEWER</th>
                                                    <th>AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ( $bulletins as $list )
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $list->topic }}</td>
                                                    <td>{{ $list->title }}</td>
                                                    <td>{{ $list->created_at }}</td>
                                                    <td>{{ $list->viewer }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-secondary" onclick="show({{ $list->id }})">
                                                            <i class="fas fa-eye"></i>
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

    <div class="modal fade" id="show">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            </div>
        </div>
    </div>

@endsection

@section ('script')
    <script type="text/javascript">
        $('#index').DataTable ({

        });

        function show(id) {
            $.get('bulletin/'+ id, function (data) {
                $('#show .modal-content').html('');
                $('#show .modal-content').html(data);
                $('#show').modal('show');
            });
        }

    </script>

@endsection

