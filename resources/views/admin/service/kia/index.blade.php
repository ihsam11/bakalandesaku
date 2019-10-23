@extends('layouts.admin')

@section('title', 'Halaman Admin Layanan')

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Halaman Admin Layanan</h4>
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
                        <a href="{{ route('admin.service') }}">                            
                            Layanan       
                        </a>
                    </li>                    
                </ul>
            </div>        
            <div class="card">        
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
@endsection
