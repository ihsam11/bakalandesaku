<div class="modal-header bg-secondary">
    <h4 class="modal-title"><strong><i class="fas fa-eye"></i> &nbsp; Detail Berita</strong></h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Tampil Di Headline</label>
                <span class="form-control">
                    @if ($bulletin->display > 0)
                        <span class="text-success"><i class="fas fa-check"></i> &nbsp; Ya</span>
                    @else
                        <span class="text-danger"><i class="fas fa-times"></i> &nbsp; Tidak</span>
                    @endif
                </span>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <span class="form-control">{{ $bulletin->topic }}</span>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>Penulis</label>
                <span class="form-control">{{ $bulletin->uploader }}</span>
            </div>
            <div class="form-group">
                <label>Tanggal Upload</label>
                <span class="form-control">{{ $bulletin->post_date }}</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label>Judul</label>
        <span class="form-control">{{ $bulletin->title }}</span>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="form-group">
                <label>Konten</label>
                <div class="form-control">
                    <span style="display: block;height: 25em;overflow-y: auto;padding: 0 2em 0 0;height: 30;">
                    {!! $bulletin->content !!}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label>Gambar</label>
                <div class="thumbnail">
                    <img src="{{ $bulletin->image_path }}" width="100%">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
    <a href="bulletin/{{ $bulletin->id }}/edit" class="btn btn-warning">Edit</a>
    <form action="bulletin/{{ $bulletin->id }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin?')">Hapus</button>
    </form>
</div>