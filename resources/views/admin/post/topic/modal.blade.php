<div class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">        
                <h4 class="modal-title"><strong> <i class="fas fa-list"></i> &nbsp; Tambah Topik Berita</strong></h4>
            </div>
            <form action="javascript:void(0)">
                <div id="message"></div>
                <div class="modal-body">                    
                    @csrf               
                    <input type="hidden" name="id" value="">          
                    <div class="form-group">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Topik" value="{{ old('name') }}">
                        @error('name') 
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">Keterangan</label>
                        <textarea class="form-control" name="description" id="description" placeholder="Masukkan Deskripsi Topik" value="{{ old('description') }}"></textarea>
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    </div>                    
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary"> Tutup</button>        
                    <button type="submit" class="btn btn-primary" value="create"> Simpan</button>        
                </div>
            </form>
        </div>
    </div>
</div>