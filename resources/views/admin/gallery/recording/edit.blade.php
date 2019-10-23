@extends('layouts.admin')

@section('title', 'Halaman Edit Video')

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Halaman Edit Video</h4>
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
                        <a href="{{ url('admin/recording') }}">
                            Video
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-header bg-primary">
                    <div class="card-title text-white">
                        <strong><i class="fas fa-plus-circle"></i> &nbsp; Edit Video</strong>
                    </div>
                </div>
                <form action="../{{ $recording->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body ">
                        <div class="form-group">
                            <label for="url">URL Video</label>
                            <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        http://www.youtube.com/embed/
                                    </span>
                                    <input type="text" name="url" id="url" class="form-control @error('url') is-invalid @enderror col-4" value="{{ $recording->url }}" placeholder="Masukkan kode video">
                                </div>
                                @error('url')
                                    <div class="alert alert-danger mt-2 col-4">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Keterangan</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror col-8" placeholder="Masukkan keterangan video">{{ $recording->description }}</textarea>
                            @error('description')
                                <div class="alert alert-danger mt-2 col-8">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                      <div class="form-check">
                            <label class="form-check-label" for="display">
                                <input type="checkbox" name="display" id="display" value="1" @if ($recording->display > 0) checked @endif>
                                <span class="form-check-sign">Ditampilkan</span>
                            </label>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                <a href="{{ url('admin/recording') }}" class="btn btn-warning">Kembali</a>
                            </div>
                            <div class="col text-right">
                                <button class="btn btn-danger" type="reset">Reset</button>
                                <button class="btn btn-primary" type="submit">Simpan</button>
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
            $.get('/recording/'+id, function (data) {
                $('#show .modal-content').html(data);
                $('#show').modal('show');
            });
        }
    </script>
@endsection
