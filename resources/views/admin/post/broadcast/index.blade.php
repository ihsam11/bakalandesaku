@extends('layouts.admin')

@section('title', 'Halaman Pengumuman')

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Halaman Pengumuman</h4>
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
                        <a href="#">
                            Posting
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/broadcast') }}">
                            Pengumuman
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <strong><i class="fas fa-bullhorn"></i> &nbsp; Daftar Pengumuman</strong>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-6">
                            <a class="btn btn-sm btn-primary" href="broadcast/create">
                                <i class="fas fa-plus-circle"></i> &nbsp; Tambah Pengumuman
                            </a>
                        </div>
                    </div>
                    @if (session('message'))
                        <div class="row">
                            <div class="col">
                                <div class="alert {{ session('alert') }}">
                                    <i class="fas {{ session('icon') }}"></i> &nbsp; {{ session('message') }}
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="index">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>JUDUL</th>
                                                    <th>KETERANGAN</th>
                                                    <th>TANGGAL DIBUAT</th>
                                                    <th>AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($broadcasts as $list)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $list->title }}</td>
                                                        <td>{{ $list->description }}</td>
                                                        <td>{{ $list->created_at }}</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-secondary" type="button" onclick="show({{ $list->id }})">
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
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script>
        $('#index').DataTable({

        });

        function show(id) {
            $.get('broadcast/'+ id, function (data) {
                $('#show .modal-content').html('');
                $('#show .modal-content').html(data);
                $('#show').modal('show');
            });
        }


    </script>
@endsection
