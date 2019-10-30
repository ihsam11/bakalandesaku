@extends('layouts.admin')

@section('title', 'Halaman Galeri Video')

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Halaman Galeri Video</h4>
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
                            Galeri
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/recording') }}">
                            Video
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <strong><i class="fas fa-video"></i> &nbsp; Galeri Video</strong>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-primary" href="recording/create"><i class="fas fa-plus-circle"></i>&nbsp; Tambah Video</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>KETERANGAN</th>
                                            <th>URL</th>
                                            <th>TANGGAL UPLOAD</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recordings as $list)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $list->description }}</td>
                                            <td>{{ $list->url }}</td>
                                            <td>
                                                <span class="badge badge-primary">
                                                    <strong>
                                                        {{ date('d M Y', strtotime($list->created_at)) }}
                                                    </strong>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="recording/{{ $list->id }}/edit" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                <form action="recording/{{ $list->id }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                                </form>
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
            $.get('/recording/'+id, function (data) {
                $('#show .modal-content').html(data);
                $('#show').modal('show');
            });
        }
    </script>
@endsection
