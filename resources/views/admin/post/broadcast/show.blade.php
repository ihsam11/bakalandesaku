<div class="modal-header bg-secondary">
	<h4 class="modal-title">
		<strong><i class="fas fa-eye"></i> &nbsp; Detail Pengumuman</strong>
	</h4>
</div>
<div class="modal-body">
	<div class="form-group">
		<label for="title">Judul Pengumuman</label>
		<span id="title" class="form-control">{{ $broadcast->title }}</span>
	</div>
	<div class="form-group">
		<label for="description">Keterangan Pengumuman</label>
		<span id="description" class="form-control">{{ $broadcast->description }}</span>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label for="date_start">Tanggal Tampil</label>
				<div class="row">
					<div class="col">
						<label for="">Tanggal Mulai</label>
						<span id="date_start" class="form-control">{{ $broadcast->date_start }}</span>
						

					</div>
					<div class="col">
						<label for="">Tanggal Selesai</label>						
						<span id="date_start" class="form-control">{{ $broadcast->date_finish }}</span>
					
					</div>
				</div>
			</div>			
		</div>
	</div>
</div>
<div class="modal-footer">
	<button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	<a class="btn btn-warning" href="broadcast/{{ $broadcast->id }}/edit">Edit</a>
	<button type="button" id="delete" class="btn btn-danger">Hapus</button>
	<form method="POST" action="broadcast/{{ $broadcast->id }" class="d-none">
		@csrf
		@method('DELETE')
	</form>
</div>