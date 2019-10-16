@extends('layouts.admin')

@section('title', 'Halaman Galeri Foto')

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Halaman Galeri Foto</h4>
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
                        <a href="{{ url('admin/photograph') }}">                            
                            Foto
                        </a>
                    </li>                    
                </ul>
            </div>        
            <div class="card">        
                <div class="card-header">
                    <div class="card-title">
                        <strong><i class="fas fa-list"></i> &nbsp; Daftar Foto</strong> 
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-6">
                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create">
                                <i class="fas fa-plus-circle"></i> &nbsp; Tambah Foto
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
                                                @foreach ($topics as $list)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $list->name }}</td>
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

    @include('admin.post.topic.create')
    
   <div id="edit_form">
   
   </div> 

@endsection

@section('script')
    <script>
        $('#index').DataTable({

        });

        function edit(id) {
            $.ajax ({
                url: "{{ url('admin/photograph') }}",
                type: 'POST',
                dataType: 'html',
                success: function (e) {
                    $('#edit_form').html(e.edit_form);
                }
            });
        }

    
        
    </script>
@endsection
