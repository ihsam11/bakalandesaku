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
                        <strong><i class="fas fa-list"></i> &nbsp; Daftar Pengumuman</strong> 
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-6">
                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create">
                                <i class="fas fa-plus-circle"></i> &nbsp; Tambah Pengumuman
                            </button>
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
                                                    <th>JUDUL</th>
                                                    <th>KETERANGAN</th>
                                                    <th>AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($agendas as $list)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $list->title }}</td>
                                                        <td>{{ $list->description }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-warning" onclick="edit({{ $list->id }})">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-danger" onclick="delete({{ $list->id }})">
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

    @include('admin.post.broadcast.create')
    
   <div id="edit_form">
   
   </div> 

@endsection

@section('script')
    <script>
        $('#index').DataTable({

        });

        function edit(id) {
            $.ajax ({
                url: "{{ url('admin/broadcast') }}",
                type: 'POST',
                dataType: 'html',
                success: function (e) {
                    $('#edit_form').html(e.edit_form);
                }
            });
        }

    
        
    </script>
@endsection
