<div class="modal fade" id="create">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">                        
                <h4 class="modal-title">
                    <strong> <i class="fas fa-list"></i> &nbsp; Tambah Berita </strong></h4>
            </div>
            <form action="news" method="POST">
                <div class="modal-body">
                    @csrf                         
                    <div class="form-group row">                        
                        <label for="category" class="col-2">Kategori</label>     
                        <div class="col-10">
                            <select name="category" id="category" class="form-control col-6">
                                <option value="">Pilih Kategori Berita</option>
                                @foreach ($topic as $list)
                                    <option value="{{ $list->id }}">{{ $list->name }}</option>
                                @endforeach
                            </select>           
                        </div>                 
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Masukkan Judul Berita">
                    </div>
                    <div class="form-group">
                        <label for="content" class="form-label">Konten</label>
                        <textarea class="form-control" name="content" id="content" placeholer="Masukkan Konten Berita"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="display" class="form-label">Jadikan Headline</label>
                        <div class="">
                            <input type="checkbox" class="form-control" name="display" id="display" value="true">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary"> Tutup</button>        
                    <button type="submit" class="btn btn-primary"> Simpan</button>        
                </div>
            </form>
        </div>        
    </div>
</div>