<div class="modal fade" id="create">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">                        
                <h4 class="modal-title"> <i class="fas fa-list"></i> &nbsp; Tambah Berita</h4>
            </div>
            <div class="modal-body">
                <form action="/news/create" method="POST">
                    @csrf                         
                    <div class="form-group row">                        
                        <label for="category" class="col-2">Kategori</label>     
                        <div class="col-10">
                            <select name="category" id="category" class="form-control">
                                <option value="">Pilih Kategori Berita</option>
                                @foreach ($topic as $list)
                                    <option value="{{ $list->id }}">{{ $list->name }}</option>
                                @endforeach
                            </select>           
                        </div>                 
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="close" data-dismiss="modal" class="btn btn-secondary"> Tutup</button>        
                <button type="submit" class="btn btn-primary"> Simpan</button>        
            </div>

        </div>
        
    </div>

</div>