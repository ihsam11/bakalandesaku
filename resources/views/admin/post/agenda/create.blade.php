<div class="modal fade" id="create">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">                        
                <h4 class="modal-title"> <i class="fas fa-list"></i> &nbsp; Tambah Agenda</h4>
            </div>
            <form action="agenda" method="POST">
                <div class="modal-body">
                    @csrf                         
                    <div class="form-group">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Masukkan Judul Agenda">
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">Keterangan</label>
                        <textarea class="form-control" name="description" id="description" placeholder="Masukkan Keterangan Agenda"></textarea>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="date_start" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control" name="date_start" id="date_start" placeholder="Masukkan Tanggal Mulai">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="date_finish" class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control" name="date_finish" id="date_finish" placeholder="Masukkan Tanggal Selesai">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="time_start" class="form-label">Pukul Mulai</label>
                                <input type="time" class="form-control" name="time_start" id="time_start" placeholder="Masukkan Pukul Mulai">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="time_finish" class="form-label">Pukul Selesai</label>
                                <input type="time" class="form-control" name="time_finish" id="time_finish" placeholder="Masukkan Pukul Selesai">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="close" data-dismiss="modal" class="btn btn-secondary"> Tutup</button>        
                    <button type="submit" class="btn btn-primary"> Simpan</button>        
                </div>
            </form>

        </div>
        
    </div>

</div>