@extends ('layouts.admin')

@section ('title', 'Halaman Edit Pengumuman')

@section ('content')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Halaman Edit Pengumuman</h4>
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
            <div class="card-header bg-warning">
                <h4 class="card-title text-white">
                    <strong><i class="fas fa-edit"></i> &nbsp; Edit Data Pengumuman</strong>
                </h4>
            </div>
            <form method="POST" action="../{{ $broadcast->id }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Judul Pengumuman</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Masukkan Judul Pengumuman" value="{{ $broadcast->title }}">
                        @error('title')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Keterangan Pengumuman</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Masukkan Keterangan Pengumuman">{{ $broadcast->description }}</textarea>
                        @error('description')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <div class="pull-right">
                                <a class="btn btn-secondary" href="{{url('admin/broadcast')}}"><i class="fas fa-arrow-left"></i> &nbsp; Kembali</a>
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

    </script>
@endsection
