<div class="modal-header bg-secondary">
	<h4 class="modal-title">
		<strong><i class="fas fa-eye"></i> &nbsp; Detail Agenda</strong>
	</h4>
</div>
<div class="modal-body">
	<div class="form-group">
		<label for="title">Judul Agenda</label>
		<span id="title" class="form-control">{{ $agenda->title }}</span>
	</div>
	<div class="form-group">
		<label for="description">Keterangan Agenda</label>
		<span id="description" class="form-control">{{ $agenda->description }}</span>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label for="date_start">Tanggal Mulai</label>
				<span id="date_start" class="form-control">{{ date('d-M-y', strtotime($agenda->date_start)) }}</span>
			</div>
			<div class="form-group">
				<label for="date_finish">Tanggal Selesai</label>
				<span id="date_finish" class="form-control">{{ date('d-M-y', strtotime($agenda->date_finish)) }}</span>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label for="time_start">Pukul Mulai</label>
				<span id="time_start" class="form-control">{{ date('H:i', strtotime($agenda->time_start)) }}</span>
			</div>
			<div class="form-group">
				<label for="time_finish">Pukul Selesai</label>
				<span id="time_finish" class="form-control">{{ date('H:i', strtotime($agenda->time_finish)) }}</span>
			</div>		
		</div>
	</div>
</div>
<div class="modal-footer">
	<button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	<a class="btn btn-warning" href="agenda/{{ $agenda->id }}/edit">Edit</a>
	<button type="button" id="delete" class="btn btn-danger">Hapus</button>
	<form method="POST" action="agenda/{{ $agenda->id }}" class="d-none" id="frmDelete">
		@csrf
		@method('DELETE')
	</form>
</div>