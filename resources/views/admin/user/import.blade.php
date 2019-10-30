<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="/user/import" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h4 class="modal-title" id="exampleModalLabel">
                        <strong><i class="fas fa-table"></i> &nbsp; Import Excel </strong></h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Pilih file excel</label>
                        <input type="file" name="file" required="required" class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </div>
        </form>
    </div>
</div>