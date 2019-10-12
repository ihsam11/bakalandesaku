<div class="modal fade" id="create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">        
                <h4 class="modal-title"> <i class="fas fa-list"></i> &nbsp; Tambah Kategori</h4>
                <button type="button" class="close" data-dismiss="modal"> &times; </button>
            </div>
            <form action="topic/store" method="POST">
                <div class="modal-body">
                        @csrf                         
                        <div class="form-group">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('error') is-invalid @enderror" name="name" id="name" placeholder="Masukkan Nama Topik">
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">Keterangan</label>
                            <textarea class="form-control @error('error') is-invalid @enderror" name="description" id="description" placeholder="Masukkan Deskripsi Topik"></textarea>
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