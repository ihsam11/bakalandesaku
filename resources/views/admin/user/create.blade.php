@extends ('layouts.admin')

@section ('title', 'Halaman Tambah Pengguna')

@section ('content')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Halaman Tambah Pengguna</h4>
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
                    <a href="{{ url('admin/user') }}">
                        Pengguna
                    </a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="card-title text-white">
                    <strong><i class="fas fa-plus-circle"></i> &nbsp; Tambah Data Pengguna</strong>
                </h4>
            </div>
            <form method="POST" action="{{ url('admin/user') }}">
                @csrf
                <div class="card-body">


                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <div class="pull-right">
                                <a class="btn btn-secondary" href="{{ url('admin/user') }}"><i class="fas fa-arrow-left"></i> &nbsp; Kembali</a>
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
