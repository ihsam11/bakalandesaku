@extends('layouts.admin')

@section('title', 'Halaman Admin Slider')

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Halaman Admin Slider</h4>
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
                        <a href="{{ url('admin/slider') }}">                            
                            Slider           
                        </a>
                    </li>                    
                </ul>
            </div>        
            <div class="card">                        
                <div class="card-header">
                    <div class="card-title"><i class="fas fa-list"></i> Daftar Slider</div>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                            <button class="btn btn-sm btn-primary">
                                <i class="fas fa-plus"></i> &nbsp; Tambah Slider
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table table-responsive">
                            <tbody>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
