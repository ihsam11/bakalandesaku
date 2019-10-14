<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">        
                <h4 class="modal-title"><strong> <i class="fas fa-list"></i> &nbsp; Edit Topik Berita</strong></h4>
            </div>
            <form action="topic" method="POST">
                <div class="modal-body">
                        @csrf              
                        @method('PUT')           
                        <div class="form-group">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Masukkan Nama Topik" value="" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">Keterangan</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Masukkan Deskripsi Topik" value="" required></textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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