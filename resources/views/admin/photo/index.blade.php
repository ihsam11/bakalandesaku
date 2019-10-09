@extends('layouts.admin')

@section('title', 'Photo Page')

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Halaman Users</h4>
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
                            Users                        
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
