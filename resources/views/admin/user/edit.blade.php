@extends ('layouts.admin')

@section ('title', 'Halaman Edit Pengguna')

@section ('content')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Halaman Edit Pengguna</h4>
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
                    <a href="{{ url('admin/agenda') }}">
                        Pengguna
                    </a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header bg-warning">
                <h4 class="card-title text-white">
                    <strong><i class="fas fa-edit"></i> &nbsp; Edit Data Pengguna</strong>
                </h4>
            </div>
            <form method="POST" action="../{{ $user->id }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <span class="form-control form-disabled">{{ $user->nik }}</span>
                            </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                               <label for="name">Nama Lengkap</label>
                               <span class="form-control form-disabled">{{ $user->name }}</span>
                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" type="text" name="email">
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                                <label for="role">Role Pengguna</label>
                                <select name="role" id="role" class="form-control ">
                                    @foreach ($roles as $list)
                                        <option value="{{ $list->id }}" @if ($list->id == $user->role_id) selected @endif >{{ $list->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                           <div class="form-group">
                                <label for="opassword">Password Lama</label>
                                <input class="form-control @if(session('status')) is-invalid @endif" type="password" name="opassword">
                                @if(session('status'))
                                    <div class="alert alert-danger mt-2">

                                    {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="npassword">Password Baru</label>
                                        <input class="form-control @error('npassword') is-invalid @enderror" type="password" name="npassword">
                                        @error('npassword')
                                            <div class="alert alert-danger mt-2">

                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="vpassword">Verifikasi Password Baru</label>
                                        <input class="form-control" type="password" name="vpassword">
                                        @error('vpassword')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}

                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
