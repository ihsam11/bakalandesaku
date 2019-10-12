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
                        <a href="{{ route('admin.user') }}">                            
                            Posting Berita
                        </a>
                    </li>                    
                </ul>
            </div>        
            <div class="card">        
                <div class="card-header">
                    <div class="card-title">
                        <strong><i class="fas fa-list"></i> &nbsp; Daftar Posting Berita</strong> 
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-6">
                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create">
                                <i class="fas fa-plus-circle"></i> &nbsp; Tambah Berita
                            </button>
                        </div>
                        <div class="col-6 text-right">
                            <a class="btn btn-sm btn-success" href="{{ url('admin/topic') }}">
                                <i class="fas fa-list"></i> &nbsp; Daftar Topik
                            </a>                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">                            
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">                                    
                                        <table class="table table-striped" id="index">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>KATEGORI</th>
                                                    <th>JUDUL</th>
                                                    <th>TANGGAL POSTING</th>
                                                    <th>VIEWER</th>
                                                    <th>AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bulletin as $list)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $list->topic }}</td>
                                                    <td>{{ $list->title }}</td>
                                                    <td>{{ $list->created_at }}</td>
                                                    <td>{{ $list->viewer }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#edit">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i>
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

    @include('admin.post.bulletin.create', [ 'topic' => $topic ])

@endsection

@section('script')
    <script>
        $('#index').DataTable({

        });
    </script>
@endsection
