@extends('layouts.admin')

@section('title', 'Halaman Tambah Posting')

@section('content')
>
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Halaman Tambah Berita</h4>
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
                        <a href="{{ url('admin/news') }}">                            
                            Berita
                        </a>
                    </li>                    
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/news/create') }}">                            
                            Tambah Berita
                        </a>
                    </li>                    
                </ul>
            </div>        
            <div class="card">        
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <div class="card-title">
                                <strong><i class="fas fa-plus"></i> &nbsp; Tambah Berita</strong> 
                            </div>
                            
                        </div>
                        <div class="col-6">
                            <a href="{{ url('admin/news') }}" class="btn btn-sm btn-warning pull-right"><i class="fas fa-arrow-left"></i> Kembali</a>
                        
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-12">
                            <form action="{{ url('admin/news/store') }}" method="POST" id="formAdd">
                                <div class="form-group">                                    
                                    <label for="category" class="form-label">Kategori</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Pilih kategori berita</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul berita">
                                </div>
                                <div class="form-group">
                                    <label for="content" class="form-label">Konten</label>
                                    <textarea name="content" id="content" placeholder="Masukkan isi berita">
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="pic" class="form-label">Gambar Berita</label>
                                    <input type="file" class="form-control" id="pic" name="pic" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="comment" class="form-label">Keterangan Gambar</label>
                                    <textarea name="comment" id="comment" placeholder="keterangan gambar" class="form-control"></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col">
                        <button type="submit" class="btn btn-secondary">Simpan sebagai draft</button>
                        <button type="reset" class="btn btn-danger pull-right">Reset</button>
                        <button type="submit" class="btn btn-primary pull-right">Publish</button>
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endsection

@section('script')
    <script>
        $('#content').summernote({});

        $('button[type=submit]').on('click', function () {
            $('#formAdd')[0].submit();
        })

        $('button[type=reset]').on('click', function () {
            
            $('#formAdd')[0].reset();            
        })
    </script>

@endsection