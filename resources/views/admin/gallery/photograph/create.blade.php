@extends('layouts.admin')

@section('title', 'Halaman Upload Foto')

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Halaman Upload Foto</h4>
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
                <div class="card-header bg-primary">
                    <div class="card-title text-white">
                        <strong><i class="fas fa-plus-circle"></i> &nbsp; Upload Foto</strong>
                    </div>
                </div>
                <form action="photograph/store" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="topic">Kategori</label>
                                    <select name="topic" id="topic" class="form-control @error('topic') is-invalid @enderror">
                                        @foreach ($topics as $list)
                                        <option value="{{ $list->id }}">{{ $list->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('topic')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">Judul</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}">
                                    @error('topic')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Keterangan</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"></textarea>
                                    @error('description')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="file">Upload Foto</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                <a href="../photograph" class="btn btn-warning">Kembali</a>

                            </div>
                            <div class="col text-right">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="show">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#index').DataTable({

        });

        function show(id) {
            $.get('/photograph/'+id, function (data) {
                $('#show .modal-content').html(data);
                $('#show').modal('show');
            });
        }
    </script>
@endsection
