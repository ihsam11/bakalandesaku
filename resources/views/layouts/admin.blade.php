<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.themekita.com/demo-millenium/millenium/examples/demo2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Oct 2018 03:50:15 GMT -->
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>@yield('title')</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('img/logo-99.png') }}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ asset('js/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{ asset('css/fonts.min.css') }}']}
			/*,active: function() {
				sessionStorage.fonts = true;
			}*/
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" media="screen" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" media="screen" href="{{ asset('css/millenium.min.css') }}">

	<!-- Summernote -->
	<link rel="stylesheet" href="{{ asset('css/summernote-bs4.css') }}">

	<!-- DateRange Picker -->
	<link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">


	<!-- CSS Just for demo purpose, don't include it in your project -->

		<style>
			.logo > img {
				width: 35px;
				height: 40px;
			}
			.logo > h4 {
				display:inline;
				margin-left: 10px;
			}
		</style>
</head>

<body data-background-color="bg3">
	<div class="wrapper">
	    <div class="main-header">
	      <!-- Logo Header -->
	      <div class="logo-header" data-background-color="dark2">
	        <a href="index.html" class="logo">
	          <img src="{{ asset('img/logo-99.png') }}" alt="Bakalan Desa Logo" class="navbar-brand">
						<h4 class="text-white"><strong>Admin Page</strong></h4>
	        </a>
	        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
	          <span class="navbar-toggler-icon"><i class="icon-menu"></i></span>
	        </button>
	        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
	        <div class="nav-toggle">
	          <button class="btn btn-toggle toggle-sidebar"><i class="icon-menu"></i></button>
	        </div>
	      </div>
	      <!-- End Logo Header -->

	      <!-- Navbar Header -->
	      <nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">

	        <div class="container-fluid">
	          <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
<!-- 	            <li class="nav-item dropdown hidden-caret">
	              <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope"></i></a>
	              <ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
	                <li>
	                  <div class="dropdown-title d-flex justify-content-between align-items-center">
	                    Messages
	                    <a href="#" class="small">Mark all as read</a>
	                  </div>
	                </li>
	                <li>
	                  <div class="message-notif-scroll scrollbar-outer">
	                    <div class="notif-center">
	                      <a href="#">
	                        <div class="notif-img"><img src="}" alt="Img Profile"></div>
	                        <div class="notif-content">
	                          <span class="subject">Jimmy Denis</span>
	                          <span class="block">How are you ?</span>
	                          <span class="time">5 minutes ago</span>
	                        </div>
	                      </a>
	                      <a href="#">
	                        <div class="notif-img"><img src="" alt="Img Profile"></div>
	                        <div class="notif-content">
	                          <span class="subject">Chad</span>
	                          <span class="block">Ok, Thanks !</span>
	                          <span class="time">12 minutes ago</span>
	                        </div>
	                      </a>
	                      <a href="#">
	                        <div class="notif-img"><img src="" alt="Img Profile"></div>
	                        <div class="notif-content">
	                          <span class="subject">Jhon Doe</span>
	                          <span class="block">Ready for the meeting today...</span>
	                          <span class="time">12 minutes ago</span>
	                        </div>
	                      </a>
	                    </div>
	                  </div>
	                </li>
	                <li>
	                  <a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i> </a>
	                </li>
	              </ul>
	            </li> -->
	            <!-- <li class="nav-item dropdown hidden-caret">
	              <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                <i class="fa fa-bell"></i>
	                <span class="notification"></span>
	              </a>
	              <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
	                <li><div class="dropdown-title">You have 4 new notification</div></li>
	                <li>
	                  <div class="notif-scroll scrollbar-outer">
	                    <div class="notif-center">
	                      <a href="#">
	                        <div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
	                        <div class="notif-content">
	                          <span class="block">New user registered</span>
	                          <span class="time">5 minutes ago</span>
	                        </div>
	                      </a>
	                      <a href="#">
	                        <div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
	                        <div class="notif-content">
	                          <span class="block">Rahmad commented on Admin</span>
	                          <span class="time">12 minutes ago</span>
	                        </div>
	                      </a>
	                      <a href="#">
	                        <div class="notif-img">
	                          <img src="" alt="Img Profile">
	                        </div>
	                        <div class="notif-content">
	                          <span class="block">Reza send messages to you</span>
	                          <span class="time">12 minutes ago</span>
	                        </div>
	                      </a>
	                      <a href="#">
	                        <div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
	                        <div class="notif-content">
	                          <span class="block">Farrah liked Admin</span>
	                          <span class="time">17 minutes ago</span>
	                        </div>
	                      </a>
	                    </div>
	                  </div>
	                </li>
	                <li><a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a></li>
	              </ul>
	            </li> -->
	            <li class="nav-item dropdown hidden-caret">
	              <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
	                <div class="avatar-sm"><img src="{{ asset('img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle"></div>
	              </a>
	              <ul class="dropdown-menu dropdown-user animated fadeIn">
	                <div class="dropdown-user-scroll scrollbar-outer">
	                  <li>
	                    <div class="user-box">
	                      <div class="avatar-lg"><img src="{{ asset('img/profile.jpg') }}" alt="image profile" class="avatar-img rounded"></div>
	                      <div class="u-text">
	                        <h4>{{ Auth::user()->name }}</h4>
	                        <p class="text-muted">{{ Auth::user()->email }}</p>
	                      </div>
	                    </div>
	                  </li>
	                  <li>
	                    <div class="dropdown-divider"></div>
	                    <a class="dropdown-item" href="{{ url('/') }}">Halaman Utama</a>
	                    <div class="dropdown-divider"></div>
	                    <a class="dropdown-item" href="{{ url('admin/setting') }}">Pengaturan Akun</a>
	                    <div class="dropdown-divider"></div>
	                    <a class="dropdown-item" href="{{ route('logout') }}"
	                                onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
							Logout</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
	                  </li>
	                </div>
	              </ul>
	            </li>
	          </ul>
	        </div>
	      </nav>
	      <!-- End Navbar -->
	    </div>

		<!-- Sidebar -->
		<div class="sidebar" data-background-color="dark2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
				<div class="user">
					<div class="avatar-sm float-left mr-2">
					<img src="{{ asset('img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
					</div>
					<div class="info">
					<a aria-expanded="true">
						<span>
						{{ Auth::user()->name }}
						<span class="user-level">Administrator</span>
						</span>
					</a>
					<div class="clearfix"></div>

					</div>
				</div>
				<ul class="nav nav-secondary" id="nav">
					<li class="nav-item">
					<a href="{{ route('admin.home') }}" aria-expanded="false">
						<i class="fas fa-home"></i>
						<p>Beranda</p>
					</a>
					</li>
					<li class="nav-item">
						<a href="{{ url('admin/user') }}" class="collapsed" aria-expanded="false">
							<i class="fas fa-user"></i>
							<p>Pengguna</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="#posting" data-toggle="collapse">
							<i class="fas fa-pen-alt"></i>
							<p>Posting</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="posting">
							<ul class="nav nav-collapse">
								<li><a href="{{ url('admin/bulletin') }}"> <span class="sub-item"> Berita </span> </a></li>
								<li><a href="{{ url('admin/agenda') }}"> <span class="sub-item"> Agenda </span> </a></li>
								<li><a href="{{ url('admin/broadcast') }}"> <span class="sub-item"> Pengumuman </span> </a></li>
								<li><a href="#"> <span class="sub-item"> Komentar </span> </a></li>
							</ul>
						</div>
					</li>
					<li class="nav-item ">
						<a href="#gallery" data-toggle="collapse">
							<i class="fas fa-compact-disc"></i>
							<p>Galeri</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="gallery">
							<ul class="nav nav-collapse">
								<li><a href="{{ url('admin/photograph') }}"> <span class="sub-item"> Foto </span> </a></li>
								<li><a href="{{ url('admin/recording') }}"> <span class="sub-item"> Video </span> </a></li>

							</ul>

						</div>
					</li>
					<li class="nav-item ">
						<a href="#service" data-toggle="collapse">
							<i class="fas fa-concierge-bell"></i>
							<p>Layanan</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="service">
							<ul class="nav nav-collapse">
								<li><a href="{{ url('admin/kk') }}"> <span class="sub-item"> KK </span> </a></li>
								<li><a href="{{ url('admin/kia') }}"> <span class="sub-item"> KIA </span> </a></li>
								<li><a href="{{ url('admin/kis') }}"> <span class="sub-item"> KIS </span> </a></li>
								<li><a href="{{ url('admin/ktp') }}"> <span class="sub-item"> KTP </span> </a></li>
								<li><a href="{{ url('admin/letters') }}"> <span class="sub-item"> Surat-Surat </span> </a></li>
							</ul>
						</div>
					</li>
					<li class="nav-item ">
						<a href="#" aria-expanded="false">
							<i class="fas fa-cog"></i>
							<p>Pengaturan</p>
						</a>
					</li>
					<li class="nav-item ">
						<a href="#" aria-expanded="false">
							<i class="fas fa-question-circle"></i>
							<p>Bantuan</p>
						</a>
					</li>
				</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			@yield('content')
		</div>

	</div>
	<!--   Core JS Files   -->
	<script src="{{ asset('js/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('js/popper.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>

	<!-- jQuery UI -->
	<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('js/jquery.ui.touch-punch.min.js') }}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ asset('js/jquery.scrollbar.min.js') }}"></script>

	<!-- Moment JS -->
	<script src="{{ asset('js/moment.min.js') }}"></script>

	<!-- Chart JS -->
	<script src="{{ asset('js/chart.min.js') }}"></script>

	  <!-- jQuery Sparkline -->
	  <script src="{{ asset('js/jquery.sparkline.min.js') }}"></script>

	  <!-- Chart Circle -->
	  <script src="{{ asset('js/circles.min.js') }}"></script>

	  <!-- Datatables -->
	  <script src="{{ asset('js/datatables.min.js') }}"></script>

	  <!-- Bootstrap Notify -->
	  <script src="{{ asset('js/bootstrap-notify.min.js') }}"></script>

	  <!-- Bootstrap Toggle -->
	  <script src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>

	  <!-- jQuery Vector Maps -->
	  <script src="{{ asset('js/jquery.vmap.min.js') }}"></script>
	  <script src="{{ asset('js/jquery.vmap.world.js') }}"></script>

	  <!-- Google Maps Plugin -->
	  <script src="{{ asset('js/gmaps.js') }}"></script>

	  <!-- Dropzone -->
	  <script src="{{ asset('js/dropzone.min.js') }}"></script>

	  <!-- Fullcalendar -->
	  <script src="{{ asset('js/fullcalendar.min.js') }}"></script>

	  <!-- DateTimePicker -->
	  <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>

	  <!-- Bootstrap Tagsinput -->
	  <script src="{{ asset('js/bootstrap-tagsinput.min.js') }}"></script>

	  <!-- Bootstrap Wizard -->
	  <script src="{{ asset('js/bootstrapwizard.js') }}"></script>

	  <!-- jQuery Validation -->
	  <script src="{{ asset('js/jquery.validate.min.js') }}"></script>

	  <!-- Date RangePicker -->
	  <script src="{{ asset('js/daterangepicker.min.js') }}"></script>

	  <!-- Summernote -->
	  <script src="{{ asset('js/summernote-bs4.min.js') }}"></script>

	  <!-- Select2 -->
	  <script src="{{ asset('js/select2.full.min.js') }}"></script>

	  <!-- Sweet Alert -->
	  <script src="{{ asset('js/sweetalert.min.js') }}"></script>

		<!-- Millenium JS -->
	  <script src="{{ asset('js/millenium.min.js') }}"></script>


	@yield('script')

</body>

</html>