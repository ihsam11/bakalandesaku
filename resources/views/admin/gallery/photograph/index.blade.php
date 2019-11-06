@extends('layouts.admin')

@section('title', 'Halaman Galeri Foto')

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Halaman Galeri Foto</h4>
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
                <div class="card-header">
                    <div class="card-title">
                        <strong><i class="fas fa-camera-retro"></i> &nbsp; Galeri Foto</strong>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fas fa-plus-circle"></i>&nbsp; Upload Foto</button>
                                <div class="dropdown-menu">
                                    <a href="photograph/create" class="dropdown-item">Single Upload</a>
                                    <a href="#" data-toggle="modal" data-target="#create" class="dropdown-item">Multiple Upload</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <span class="pull-right">

                            {{ $photographs->links() }}
                            </span>
                        </div>
                    </div>
                    <div class="media-items row">
                        @foreach ($photographs as $list)
                        <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                            <div class="media-item">
                                <div class="media-image">
                                    <img src="{{ $list->path }}" alt="Gambar" height="200" width="200">
                                </div>
                                <div class="media-description">
                                    <p>{{ $list->title }}</p>
                                    <a href="photograph/{{ $list->id }}/edit" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                        <form action="../admin/photograph/{{ $list->id }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger" ><i class="fas fa-trash"></i></button>
                                        </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-primary"><i class="fas fa-plus-circle"></i>&nbsp; Upload Foto</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <form action="photograph/store_multiple" class="dropzone" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="dz-message" data-dz-message>
                                    <div class="icon">
                                        <i class="flaticon-file"></i>
                                    </div>
                                    <h4 class="message">Drag and Drop file foto nya disini</h4>
                                </div>
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ url('admin/photograph') }}" class="btn btn-secondary">Tutup</a>
                </div>
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

        // $(document).on('click', '.delete', function() {
        //     swal({
        //         title: 'Anda Yakin?',
        //         text: "Data yang telah dihapus tidak dapat dikembalikan!",
        //         type: 'warning',
        //         buttons:{
        //             confirm: {
        //                 text : 'Setuju !',
        //                 className : 'btn btn-success'
        //             },
        //             cancel: {
        //                 visible: true,
        //                 text : 'Tidak, kembali!',
        //                 className: 'btn btn-danger'
        //             }
        //         }
        //     }).then((willDelete) => {
        //         if (willDelete) {
        //             swal("Foto telah berhasil dihapus !", {
        //                 icon: "success",
        //                 buttons: false
        //             });
        //             $('.frmDelete').submit();
        //         } else {
        //             swal("Foto tidak dihapus!", {
        //                 icon: "success",
        //                 buttons : {
        //                     confirm : {
        //                         className: 'btn btn-success'
        //                     }
        //                 }
        //             });
        //         }
        //     });
        // });
    </script>
@endsection
