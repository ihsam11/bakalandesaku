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
                    <div class="card-title">
                        <strong><i class="fas fa-list"></i> &nbsp; Daftar Posting</strong> 
                    </div>
                </div>
                <div class="card-body bg-disabled" data-background-color="bg2">
                    <div class="row mb-4">
                        <div class="col-6">
                            <a class="btn btn-sm btn-primary" href="/admin/news/create">
                                <i class="fas fa-plus"></i> &nbsp; Tambah Posting
                            </a>
                        </div>
                        <div class="col-6 text-right">
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#listCategory">
                                <i class="fas fa-list"></i> &nbsp; Daftar Kategori
                            </button>                            
                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addCategory">
                                <i class="fas fa-plus-circle"></i> &nbsp; Tambah Kategori
                            </button>                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">                            
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-responsive table-stripped" id="index">
                                        <thead class="">
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Judul</th>
                                            <th>Tanggal Posting</th>
                                            <th>Viewer</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
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
    </div>    

    @include('admin.post.category.index');

    @include('admin.post.category.create');

@endsection

@section('script')
    <script>
        $('#index').DataTable({

        });

    
        
    </script>
@endsection
