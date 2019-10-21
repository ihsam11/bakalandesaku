@extends('layouts.app')
@section('title', 'My Profile')

@section('style')
<link rel="stylesheet" href="{{ asset('css/smart_wizard.css') }}">
@endsection

@section('content')
<div class="container" style="margin-top:100px;">
    <div class="text-center">
        <h2 class="display-5">Edit Profile</h2>
        <p class="text-secondary"><em>* Isi data dengan sebenar-benarnya sesuai <mark>KTP</mark> anda. Data ini akan digunakan untuk menu layanan.</em></p>
    </div><strong>
    <div class="card-header" id="smartwizard">
        <ul>
            <li class="nav-item w-25">
                <a class="nav-link" href="#step1">Step 1 (Data Pribadi)</a>
            </li>
            <li class="nav-item w-25">
                <a class="nav-link" href="#step2">Step 2 (Data Keluarga)</a>
            </li>
            <li class="nav-item w-25">
                <a class="nav-link" href="#step3">Step 3 (Konfirmasi)</a>
            </li>
        </ul>
    <div class="card-body">
        <div id="step1">
            <div class="row">
                <div class="col-md-4">
                    <img class="img-rounded rounded-circle mb-2 mx-auto d-block" width="200" height="200" id="foto" src="http://placehold.it/200x200" alt="Foto">
                    <div class="custom-file mx-auto w-75 d-block mb-3" id="customFile">
                        <label class="custom-file-label" for="UploadImg">
                            Upload Image
                        </label>
                        <input type="file" class="custom-file-input" id="UploadImg" aria-describedby="fileHelp">
                    </div>
                </div>
                <div class="col-md-8 my-auto">
                    <div class="row">                  
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="nik">NOMOR INDUK KEPENDUDUKAN *</label>
                            <input type="text" name="nik" id="nik" class="form-control" value="{{ $profile->nik }}" aria-invalid="true">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">NAMA LENGKAP *</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $profile->name }}">
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="religion">AGAMA</label>
                            <input type="text" name="religion" id="religion" class="form-control" value="{{ $profile->religion }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="education">PENDIDIKAN</label>
                            <input type="text" name="education" id="education" class="form-control" value="{{ $profile->education }}">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <fieldset class="form-group">
                            <legend for="gender" class="col-form-label">JENIS KELAMIN *</legend>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="laki-laki" name="gender" class="custom-control-input">
                                <label class="custom-control-label" for="laki-laki">Laki-laki</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="perempuan" name="gender" class="custom-control-input">
                                <label class="custom-control-label" for="perempuan">Perempuan</label>
                            </div>
                        </fieldset>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>TEMPAT & TANGGAL LAHIR *</label>
                        <div class="input-group">
                        <input type="text" name="birth_place" id="birth_place" class="form-control col-4" value="{{ $profile->birth_place }}">
                        <input type="date" name="birth_date" id="birth_date" class="form-control col-8" value="{{ $profile->birth_date }}">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar-times-o" aria-hidden="true"></i>
                            </span>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>STATUS KAWIN *</label>
                        <input type="text" name="marriage" id="marriage" class="form-control" value="{{ $profile->marriage }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>PEKERJAAN *</label>
                        <input type="text" name="work" id="work" class="form-control" value="{{ $profile->work }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <label>ALAMAT *</label>
                    <div class="row">
                        <div class="col-md-5 mb-1">
                            <input type="text" name="address" id="address" class="form-control" value="{{ $profile->address }}">
                        </div>
                        <div class="input-group col-md-2 mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text">RT</span>
                            </div>
                            <input type="text" name="rt" id="rt" class="form-control" value="{{ $profile->rt }}">
                        </div>
                        <div class="input-group col-md-2 mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text">RW</span>
                            </div>
                            <input type="text" name="rw" id="rw" class="form-control" value="{{ $profile->rw }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="citizenship">KEWARGANEGARAAN</label>
                        <input type="text" name="citizenship" id="citizenship" class="form-control" value="{{ $profile->citizenship }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="blood_type">GOL. DARAH</label>
                        <input type="text" name="blood_type" id="blood_type" class="form-control" value="{{ $profile->blood_type }}">
                    </div>
                </div>
            </div>
        </div>
        <div id="step2">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="kk_id">NO. KARTU KELUARGA *</label>
                        <input type="text" name="kk_id" id="kk_id" class="form-control" value="{{ $profile->kk_id }}">
                    </div>
                </div>
            </div>
            <div class="row justify-content-around">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="lineage">HUB. DALAM KELUARGA *</label>
                        <input type="text" name="lineage" id="lineage" class="form-control" value="{{ $profile->lineage }}" aria-invalid="true">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="father_name">NAMA AYAH *</label>
                        <input type="text" name="father_name" id="father_name" class="form-control" value="{{ $profile->father_name }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="mother_name">NAMA AYAH *</label>
                        <input type="text" name="mother_name" id="mother_name" class="form-control" value="{{ $profile->mother_name }}">
                    </div>
                </div>
            </div>
        </div>
        <div id="step3">
            <div class="row">
                <div class="col-md-6">
                    <div class="card border-primary">
                        <div class="card-header">
                            DATA PRIBADI
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                <p class="h6">
                                    <small class="h6 text-muted">___NIK : </small>
                                    <strong>{{ $profile->nik }}</strong>
                                </p>
                                <p class="h6">
                                    <small class="h6 text-muted">NAME : </small>
                                    <strong>{{ $profile->name }}</strong>
                                </p>
                                <p class="h6">
                                    <small class="h6 text-muted">Tempat/Tgl Lahir : </small>
                                    <strong>{{ $profile->birth_place.', '.tanggal($profile->birth_date) }}</strong>
                                </p>
                                <p class="h6">
                                    <small class="h6 text-muted">Jenis Kelamin : </small>
                                    <strong>{{ $profile->gender }}</strong>
                                </p>
                                <p class="h6">
                                    <small class="h6 text-muted">Gol Darah : </small>
                                    <strong>{{ $profile->blood_type }}</strong>
                                </p>
                                <p class="h6">
                                    <small class="h6 text-muted">ALAMAT : </small>
                                    <strong>{{ $profile->address }}</strong>
                                    <small class="h6 text-muted">___RT/RW : </small>
                                    <strong>{{ $profile->rt.'/'.$profile->rw }}</strong>
                                </p>
                                <p class="h6">
                                    <small class="h6 text-muted">AGAMA : </small>
                                    <strong>{{ $profile->religion }}</strong>
                                </p>
                                <p class="h6">
                                    <small class="h6 text-muted">STATUS PERKAWINAN : </small>
                                    <strong>{{ $profile->marriage }}</strong>
                                </p>
                                <p class="h6">
                                    <small class="h6 text-muted">PEKERJAAN : </small>
                                    <strong>{{ $profile->work }}</strong>
                                </p>
                                <p class="h6">
                                    <small class="h6 text-muted">KEWARGANEGARAAN : </small>
                                    <strong>{{ $profile->citizenship }}</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border-primary mt-2">
                                <div class="card-header">
                                    DATA KELUARGA
                                </div>
                                <div class="card-body">
                                    <div class="card-text">
                                        <p class="h6">
                                            <small class="h6 text-muted">NO. KK : </small>
                                            <strong>{{ $profile->kk_id }}</strong>
                                        </p>
                                        <p class="h6">
                                            <small class="h6 text-muted">STATUS HUBUNGAN : </small>
                                            <strong>{{ $profile->lineage }}</strong>
                                        </p>
                                        <p class="h6">
                                            <small class="h6 text-muted">NAMA AYAH : </small>
                                            <strong>{{ $profile->father_name }}</strong>
                                        </p>
                                        <p class="h6">
                                            <small class="h6 text-muted">NAMA IBU : </small>
                                            <strong>{{ $profile->mother_name }}</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <img class="img-rounded rounded-circle my-2 mx-auto d-block" width="200" height="200" id="confirm" src="http://placehold.it/200x200" alt="Foto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</strong></div>
@endsection
@section('script')
<script src="{{ asset('js/jquery.smartWizard.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#smartwizard').smartWizard({
            showStepURLhash: false,
        });
    });
    $("form").validate({
    rules: {
        name: "required"
    }
});
</script>
<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#foto').attr('src', e.target.result);
      $('#confirm').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$("#UploadImg").change(function() {
  readURL(this);
});
</script>
@endsection