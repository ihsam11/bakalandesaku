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
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/topic') }}">                            
                            Topik Berita
                        </a>
                    </li>                    
                </ul>
            </div>        
            <div class="card">        
                <div class="card-header">
                    <div class="card-title">
                        <strong><i class="fas fa-hashtag"></i> &nbsp; Daftar Topik Berita</strong> 
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col">
                            <a class="btn btn-sm btn-primary" href="topic/create">
                                <i class="fas fa-plus-circle"></i> &nbsp; Tambah Topik
                            </a>
                            <a class="btn btn-sm btn-secondary" href="/admin/bulletin">
                                <i class="fas fa-list"></i> &nbsp; Daftar Posting Berita
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
                                                    <th>KETERANGAN</th>
                                                    <th>JUMLAH POST</th>
                                                    <th>AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>           
                                                @foreach ( $topics as $list)                                     
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $list->name }}</td>
                                                    <td>{{ $list->description }}</td>
                                                    <td>
                                                        @if ($list->post_count > 0)
                                                        <strong> {{ $list->post_count }} </strong> Post
                                                        @else
                                                        Belum Ada Post
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-warning btn-sm" href="topic/{{ $list->id }}/edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>                                                        
                                                        <form method="POST" action="topic/{{ $list->id }}" class="d-inline">
                                                            @csrf 
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm" type="submit">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
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
        </div>
    </div>    

@endsection

@section ('script')
    <script type="text/javascript">
        $('#index').DataTable ({

        });

    </script>

@endsection

