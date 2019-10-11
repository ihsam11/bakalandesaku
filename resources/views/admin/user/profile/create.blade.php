@extends ('layouts.admin')

@section ('title', 'Halaman Tambah Data Penduduk')

@section ('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Halaman Tambah Data Penduduk</h4>
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
                            Pengguna
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.user') }}">                            
                            Tambah Data Penduduk
                        </a>
                    </li>
                </ul>
            </div>        
            <div class="card">        
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <div class="card-title"><strong>
                                <i class="fas fa-list"></i> &nbsp; Tambah Data Penduduk</strong> </div>
                        </div>
                        <div class="col-6 pull-right">
                            <a href="/admin/user" class="btn btn-sm btn-warning"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-disabled">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <form method="POST" action="/admin/profile" id="formAdd">
                                @csrf 
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="kk">No KK</label>
                                            <input type="text" class="form-control" id="kk" placeholder="Masukkan nomor KK" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nik">NIK</label>
                                            <input type="text" class="form-control" id="nik" placeholder="Masukkan nomor NIK" required>
                                            
                                        </div>
                                    </div>
                                </div>                                
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="kk" placeholder="Masukkan nama">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nik">NIK</label>
                                            <input type="text" class="form-control" id="nik" placeholder="Masukkan nomor NIK">
                                            
                                        </div>
                                    </div>
                                </div>                                
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="kk">No KK</label>
                                            <input type="text" class="form-control" id="kk" placeholder="Masukkan nomor KK">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nik">NIK</label>
                                            <input type="text" class="form-control" id="nik" placeholder="Masukkan nomor NIK">
                                            
                                        </div>
                                    </div>
                                </div>                                
                            </form>
                        </div>  
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    
    <script>
        
            $('[type=submit]').on('click', function () {                
                alert('hello');
            });

            $('[type=reset]').on('click', function () {
                // $('#formAdd').reset();
                alert('reset');
            });
    </script>

@endsection