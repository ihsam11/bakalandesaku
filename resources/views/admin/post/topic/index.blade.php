@extends('layouts.admin')

@section('title', 'Halaman Topik Berita')

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Halaman Topik Berita</h4>
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
                        <strong><i class="fas fa-list"></i> &nbsp; Daftar Topik Berita</strong> 
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-6">
                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create">
                                <i class="fas fa-plus-circle"></i> &nbsp; Tambah Topik
                            </button>
                        </div>
                        <div class="col-6 text-right">
                            <a class="btn btn-sm btn-success" href="{{ url('admin/bulletin') }}">
                                <i class="fas fa-list"></i> &nbsp; Daftar Posting Berita
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
                                                    <th>KETERANGAN</th>
                                                    <th>JUMLAH POST</th>
                                                    <th>AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($topics as $list)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $list->name }}</td>
                                                        <td>{{ $list->description }}</td>
                                                        <td>{{ $list->post_count }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger" id="#delete">
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

    @include('admin.post.topic.create')
    
    @include('admin.post.topic.edit')

@endsection

@section('script')
    <script>
        $('#index').DataTable({

        });

    
        
    </script>
@endsection
