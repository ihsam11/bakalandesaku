@extends('layouts.admin')

@section('title', 'Setting Roles Page')

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Halaman Setting Roles</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">                        
                        <a href="{{ url('admin') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/users') }}">                            
                            Master Data                        
                        </a>
                    </li>                    
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/users') }}">
                            Roles                        
                        </a>
                    </li>                    
                </ul>
            </div>        
            <div class="card">        
                <div class="card-header">
                    <div class="card-title">
                        List Roles
                    </div>
                </div>                
                <div class="card-body">
                    <div class="row col-sm-12 col-md-12 col-lg-12 mb-2 text-right">                        
                        <button class="btn btn-primary text-right" data-toggle="modal" data-target="#modalAddList">
                            <i class="fas fa-plus-circle"></i>                                                         
                            Add More
                        </button>
                    </div>
                    <div class="row col-sm-12 col-md-12 col-lg-12">
                        <table class="table table-striped table-head-bg-success">
                            <thead>
                                <th>No.</th>
                                <th>Role</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($roles as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td></td>
                                    <td>
                                        <button class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>                      
                                @endforeach      
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="modalAddList" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h4 class="modal-title" id="exampleModalLabel">
            <i class="fas fa-plus-circle"></i> Tambah Data Role</h4>
        <button type="button bg-white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formAddRole" action="{{ url('admin/roles/store') }}">            
            @csrf
            @method('POST')
            <div class="form-group form-show-validation row">
                <label for="name" class="col-lg-3 col-md-3 col-sm-4 text-right">Role Name <span class="required-label">*</span></label>
                <div class="col-lg-9 col-md-9 col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Role Name" required>
                </div>
            </div>                
            <div class="form-group form-show-validation row">
                <label for="description" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Description<span class="required-label">*</span></label>
                <div class="col-lg-9 col-md-9 col-sm-8">
                    <textarea class="form-control" id="description" placeholder="Enter Role Description" name="description" required></textarea>
                </div>
            </div>            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-rounded send-button"><i class="fas fa-save"></i> &nbsp Simpan</button>
        <button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal"><i class="fas fa-times"></i> &nbsp Tutup</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
    <script>
		$("#formAddRole").validate({
			validClass: "success",
			rules: {
				name: {required: true},
				description: {required: true},				
			},
			highlight: function(element) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');                
                $('.send-button').attr('disabled', true);
			},
			success: function(element) {
				$(element).closest('.form-group').removeClass('has-error').addClass('has-success');                
                $('.send-button').attr('disabled', false);
			},
		});

        $('.send-button').on('click', function() {
            $('#formAddRole').submit();
        });
    </script>
@endsection
