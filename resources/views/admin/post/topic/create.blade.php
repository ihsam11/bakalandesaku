@extends ('layouts.admin')

@section ('title', 'Halaman Tambah Topik')

@section ('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">                
                <h4 class="page-title">Halaman Tambah Topik Berita</h4>
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
                        <a href="{{ url('admin/bulletin') }}">                            
                             Berita
                        </a>
                    </li>                    
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/topic') }}">                            
                            Topik 
                        </a>
                    </li>                    
                </ul>
            </div>
            <div class="page-body">
                <div class="card">
                    <div class="card-header bg-primary">
                        <div class="card-title text-white">
                            <strong><i class="fas fa-plus-circle"></i> &nbsp; Tambah Data Topik</strong>
                        </div>
                    </div>
                    <form method="POST" action="../topic">
                        @csrf
                        <div class="card-body col-12">
                            <div class="form-group">
                                <label for="name">Nama Topik</label>
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukkan Nama Topik">
                                @error('name')
                                    <div class="alert alert-danger mt-2 text-danger" role="alert">
                                        <i class="fas fa-times"></i> &nbsp; {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Keterangan</label>
                                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Masukkan Keterangan Topik">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger mt-2 text-danger" role="alert">
                                        <i class="fas fa-times"></i> &nbsp; {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                    @if (!(is_null($topics->first())))                                    
                                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#list"><i class="fas fa-list"></i> &nbsp; Daftar Topik </button>
                                    @endif
                                </div>
                                <div class="col">                                    
                                    <div class="pull-right">
                                        <a href="/admin/topic" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> &nbsp;Kembali</a>
                                        &nbsp;
                                        <button type="submit" class="btn btn-primary" id="send"><i class="fas fa-save"></i> &nbsp; Simpan</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>                
            </div>                
            </div>
        </div>        
    </div>

    <div class="modal fade" id="list">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title text-white"><strong><i class="fas fa-list"></i> &nbsp; Daftar Topik </strong></h4>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">  
                        <table class="table">   
                            <thead>
                                <tr>    
                                    <th>Topik</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>        
                            <tbody> 
                                @foreach ( $topics as $list )                                
                                    <tr>    
                                        <td> {{ $list->name }} </td>
                                        <td> {{ $list->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>                    
                        </table>
                    </div>                      
                </div>
                <div class="modal-footer">
                    <button class="btn-secondary btn" type="button" data-dismiss="modal">  Tutup</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section ('script')
    <script type="text/javascript">  

            $('#send').on('click', function () {
                $('form').validate({
                    rules: {
                        name: {
                            required: true
                        },
                        description: {
                            required: true
                        }
                    },
                    message: {
                        name: {
                            required: "Nama Topik Tidak Boleh Kosong"
                        },
                        description: {
                            required: "Keterangan Topik Tidak Boleh Kosong"
                        }
                    },
                    highlight: function(element) {
                        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                    },
                    success: function(element) {
                        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');                        
                    },
                });                                

            });    
        

    </script>
    
@endsection