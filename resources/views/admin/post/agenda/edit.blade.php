@extends ('layouts.admin')

@section ('title', 'Halaman Edit Agenda')

@section ('content')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Halaman Edit Agenda</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">                        
                    <a href="{{ route('admin.home') }}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">                            
                        Posting
                    </a>
                </li>                    
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/agenda') }}">                            
                        Agenda
                    </a>
                </li>                    
            </ul>
        </div>
        <div class="card">
            <div class="card-header bg-primary">                
                <h4 class="card-title text-white">
                    <strong><i class="fas fa-plus-circle"></i> &nbsp; Edit Data Agenda</strong>
                </h4>
            </div>
            <form method="POST" action="../{{ $agenda->id }}">                
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Judul Agenda</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Masukkan Judul Agenda" value="{{ $agenda->title }}">
                        @error('title')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Keterangan Agenda</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Masukkan Keterangan Agenda">{{ $agenda->description }}</textarea>
                        @error('description')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="date_start">Tanggal Mulai</label>
                                <input type="date" class="form-control @error('date_start') is-invalid @enderror" name="date_start" id="date_start" placeholder="Masukkan Tanggal Mulai" value="{{ $agenda->date_start }}">
                                @error('date_start')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                            </div>                            
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="date_finish">Tanggal Selesai</label>
                                <input type="date" class="form-control @error('date_finish') is-invalid @enderror" name="date_finish" id="date_finish" placeholder="Masukkan Tanggal Selesai" value="{{ $agenda->date_finish }}">
                                @error('date_finish')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                            </div>                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="time_start">Pukul Mulai</label>
                                <input type="time" class="form-control @error('time_start') is-invalid @enderror" name="time_start" id="time_start" placeholder="Masukkan Pukul Mulai" value="{{ $agenda->time_start }}">
                                @error('time_start')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="time_finish">Pukul Selesai</label>
                                <input type="time" class="form-control @error('time_finish') is-invalid @enderror" name="time_finish" id="time_finish" placeholder="Masukkan Pukul Selesai" value="{{ $agenda->time_finish }}">
                                @error('time_finish')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <div class="pull-right">
                                <a class="btn btn-secondary" href="../agenda"><i class="fas fa-arrow-left"></i> &nbsp; Kembali</a>
                                <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> &nbsp; Simpan</button>                        
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </form>                
        </div>
    </div>
</div>

@endsection

@section ('script')
    <script type="text/javascript">
        
    </script>
@endsection
