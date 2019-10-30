@extends('layouts.admin')

@section('title', 'Dashboard Page')

@section('content')

			<div class="content">
				<div class="panel-header bg-secondary-gradient">
					<div class="page-inner pt-5 pb-5">
						<h2 class="text-white pb-2 fw-bold">Selamat Datang, {{ Auth::user()->name }} !</h2>
						<h5 class="text-white op-7 mb-2">Berikut kami tampilkan record progress web terkini.</h5>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row row-card-no-pd mt--2">
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-interface-6 text-warning"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Berita</p>
												<h4 class="card-title">{{ $counts->bulletin }} Post</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-alarm-1 text-success"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Agenda</p>
												<h4 class="card-title">{{ $counts->agenda }} Post</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-photo-camera text-danger"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Foto</p>
												<h4 class="card-title">{{ $counts->photograph }} Foto</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-play-button-1 text-primary"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Video</p>
												<h4 class="card-title">{{ $counts->recording }} Klip</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="card">
								<div class="card-header">
									<div class="card-title fw-bold"><i class="la flaticon-clock-1 text-secondary"></i> &nbsp; Aktivitas Terkini</div>
								</div>
								<div class="card-body">
									@if ($activities) 
										<ol class="activity-feed">										
											@foreach ($activities as $list)
												<li class="feed-item feed-item-secondary">
													<time class="date" datetime="">{{ $list }}</time>
													<span class="text"> {{ $loop->iteration }}</span>
												</li>	
											@endforeach
										</ol>
									@else 
										<h3 class="text">Belum ada Aktivitas</h3>
									@endif
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card">
								<div class="card-header">
									<div class="card-title fw-bold"><i class="la flaticon-hands text-info"></i> &nbsp; Popular Post</div>	
								</div>
								<div class="card-body">									
										@foreach ($bulletins as $list)
										<div class="d-flex">
											<div class="avatar">
												<img src="{{ $list->image_path }}" alt="icon" class="img rounded-circle">
											</div>
											<div class="flex-1">
												<h6 class="fw-bold">{{ $list->title }}</h6>
											</div>
											<div class="flex-1 ">
												<h6 class="text-info fw-bold">{{ $list->viewer }}</h6>
											</div>
										</div>
										@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="http://www.bakalandesaku.com">
									Bakalandesaku.com
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ url('admin/help') }}">
									Bantuan
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Licenses
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						2019, made with <i class="fa fa-heart heart text-danger"></i> by <a href="http://themekita.com">ThemeKita</a>		
					</div>
				</div>
			</footer>
@endsection
