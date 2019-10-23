@extends ('layouts.admin')

@section ('title', 'Halaman Edit Posting Berita')

@section ('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">                
                <h4 class="page-title">Halaman Edit Posting Berita</h4>
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
            <div class="page-body">
                <div class="card">
                    <div class="card-header bg-primary">
                        <div class="card-title text-white">
                            <strong><i class="fas fa-edit"></i> &nbsp; Edit Posting Berita</strong>
                        </div>
                    </div>
                    <form method="POST" action="../{{ $bulletin->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body"> 
                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <label class="form-check-label" for="display">                                    
                                            <input type="checkbox" name="display" id="display" value="1" @if ($bulletin->display > 0) checked @endif>
                                            <span class="form-check-sign">Tampilkan di Halaman Utama</span>
                                        </label>

                                    </div>                                    
                                    <div class="form-group">
                                        <label for="topic_id">Kategori Berita</label>
                                        <select name="topic_id" id="topic_id" class="form-control @error('topic_id') is-invalid @enderror" required>
                                            <option value="">Pilih Kategori Berita</option>
                                            @foreach ($topics as $list) 
                                                @if ($bulletin->topic_id == $list->id)
                                                    <option value="{{ $list->id }}" selected="">{{ $list->name }}</option>
                                                @else
                                                    <option value="{{ $list->id }}">{{ $list->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('topic_id')
                                            <div class="alert alert-danger mt-2" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-center">    
                                        <div class="form-group">
                                            <div class="input-file input-file-image">
                                                <label for="image" class="  label-input-file btn btn-default btn-round">
                                                    <span class="btn-label">
                                                        <i class="fa fa-file-image"></i>
                                                    </span>
                                                    Upload Gambar Berita
                                                </label>
                                                <img class="img-upload-preview" width="300" height="100" src="{{ $bulletin->image_path }}" alt="preview">
                                                <input type="file" class="form-control form-control-file @error('image_path') is-invalid @enderror" id="image" name="image" accept="image/*" required>
                                            </div>
                                            @error('image_path')
                                                <div class="alert alert-danger mt-2" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>                           

                            <div class="form-group">
                                <label for="title">Judul Berita</label>
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan Judul Berita" required value="{{ $bulletin->title }}">  
                                @error('title')
                                    <div class="alert alert-danger mt-2" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content">Konten</label>
                                <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror" required>{{ $bulletin->content }}</textarea>
                                @error('content')
                                    <div class="alert alert-danger mt-2" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#list"><i class="fas fa-list"></i> &nbsp; Daftar Berita </button>
                                </div>
                                <div class="col">                                    
                                    <div class="pull-right">
                                        <a href="/admin/bulletin" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> &nbsp;Kembali</a>                                      
                                        <button class="btn btn-primary" type="submit" role="button"><i class="fas fa-save"></i> &nbsp; Simpan</button>
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
                    <h4 class="modal-title text-white"><strong><i class="fas fa-list"></i> &nbsp; Daftar Berita</strong></h4>
                </div>
                <div class="modal-body">                    
                    @foreach ( $bulletins as $list )

                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section ('script')
    <script type="text/javascript">  
        $('#content').summernote({
            placeholder: 'Masukkan Konten Berita',
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
            tabsize: 1.5,
            height: 300
        });

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
                        required: "Nama Topik TIdak Boleh Kosong"
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

