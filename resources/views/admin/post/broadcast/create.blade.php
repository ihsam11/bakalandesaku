@extends ('layouts.admin')

@section ('title', 'Halaman Tambah Pengumuman')

@section ('content')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Halaman Tambah Pengumuman</h4>
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
            <div class="card-header bg-primary">                
                <h4 class="card-title text-white">
                    <strong><i class="fas fa-plus-circle"></i> &nbsp; Tambah Data Pengumuman</strong>
                </h4>
            </div>
            <form method="POST" action="../broadcast">                
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="title">Judul Pengumuman</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Masukkan Judul Pengumuman" value="{{ old('title') }}">
                                @error('title')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Keterangan Pengumuman</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Masukkan Keterangan Pengumuman">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>                            
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="active_range">Waktu Aktif</label>
                                <input type="text" name="active_range" id="active_range" class="form-control  @error('active_range') is-invalid @enderror" placeholder="Masukkan Waktu Aktif Pengumuman">
                                @error('active_range')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <div class="pull-right">
                                <a class="btn btn-secondary" href="../broadcast"><i class="fas fa-arrow-left"></i> &nbsp; Kembali</a>
                                <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> &nbsp; Simpan</button>                        
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </form>                
        </div>
    </div>
</div>

@endsection

@section ('script')
    <script type="text/javascript">
        $('#active_range').daterangepicker ({

        });
    </script>
@endsection
