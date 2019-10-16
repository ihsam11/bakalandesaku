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
                            <button class="btn btn-sm btn-primary" id="do-create">
                                <i class="fas fa-plus-circle"></i> &nbsp; Tambah Topik
                            </button>
                        </div>
                        <div class="col-6 text-right">
                            <a class="btn btn-sm btn-secondary" href="{{ url('admin/bulletin') }}">
                                <i class="fas fa-list"></i> &nbsp; Daftar Posting Berita
                            </a>                            
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-12">                            
                            <div class="card">
                                <div class="card-body">        
                                    @if ( @session('message') )
                                        <div class="alert alert-success">                                        
                                            <i class="fas fa-check"></i>                                                
                                            {{ @session('message') }}
                                        </div>                            
                                    @endif
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
                                                @foreach ($topics as $list)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $list->name }}</td>
                                                        <td>{{ $list->description }}</td>
                                                        <td>
                                                            @if ( $list->post_count < 1)
                                                            <span>Belum Ada Post</span>                                                            
                                                            @else
                                                            <span>{{ $list->post_count }} Post</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <button class=" btn btn-sm btn-warning" id="do-edit" data-id="{{ $list->id }}">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <form action="javascript:void(0)" id="delete_form" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class=" btn btn-sm btn-danger" id="do-delete" data-id="{{ $list->id }}">
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

    @include('admin.post.topic.modal')
    

@endsection

@section('script')
    <script>
      $.ajaxSetup ({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
            }
        });     

        $('#index').DataTable ({


        });

        if ( $('modal form').length > 0 ) {
            $('modal form').validate ({
                rules: {
                    name: {
                        required: true
                    },
                    description: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: "Silahkan masukkan nama topik berita"
                    },
                    description: {
                        required: "Silahkan masukkan keterangan topik berita"
                    }
                },
                submitHandler: function (data) {                
                    $.ajax ({
url: "{{ url('admin/topic') }}",
type: "POST",
data: $('modal form').serialize(),
dataType: 'json',
success: function (response) {
        alert('Berhasil');

},
error: function () {
    alert('gagal');
}

                    });

                }

            })
        }

        $('body').on('click', '#do-create', function () {                        
            $('.modal-header').addClass('bg-primary').removeClass('bg-warning');
            $('.modal-title>strong').html('<i class="fas fa-plus-circle"></i> &nbsp; Tambah Data Topik');
            $('.modal').modal('show');            
        });

        $('body').on('click', '#do-edit', function () {
            var id = $(this).data('id');
            $.get ('/admin/topic/' + id + '/edit', function (data) {
                $('.modal-header').addClass('bg-warning').removeClass('bg-primary');                
                $('.modal-title>strong').html('<i class="fas fa-edit"></i> &nbsp; Edit Data Topik');
                $('.modal').modal('show');
            });
        });

        $('body').on('click', '#do-delete', function () {
            var id = $(this).data('id');
            $.post ('/admin/topic/'+ id, $('#delete_form').serialize());
        });        


    </script>
@endsection
