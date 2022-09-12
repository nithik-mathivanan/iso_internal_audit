<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
	<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">
	<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/android-icon-192x192.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
  
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
	<meta name="theme-color" content="#ffffff">

	<title>ISO</title>
	<!-- Bootstrap Core CSS -->
	<link href="{{ asset('public/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
	<link rel='stylesheet prefetch'
		  href='https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css'>
	<link rel='stylesheet prefetch'
		  href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css'>

	<!-- This is Sidebar menu CSS -->
	<link href="{{ asset('public/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">

	<link href="{{ asset('public/plugins/bower_components/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
	<link href="{{ asset('public/plugins/bower_components/sweetalert/sweetalert.css') }}" rel="stylesheet">

	<!-- This is a Animation CSS -->
	<link href="{{ asset('public/css/animate.css') }}" rel="stylesheet">

			<!-- This is a Custom CSS -->
	<link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
	<!-- color CSS you can use different color css from css/colors folder -->
	<!-- We have chosen the skin-blue (default.css) for this starter
	   page. However, you can choose any other skin from folder css / colors .
	   -->
	<link href="{{ asset('public/css/colors/default.css') }}" id="theme" rel="stylesheet">
	<link href="{{ asset('public/plugins/froiden-helper/helper.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('public/css/magnific-popup.css') }}">
	<link href="{{ asset('public/css/custom-new.css') }}" rel="stylesheet">

	<link href="{{ asset('public/css/rounded.css') }}" rel="stylesheet">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('public/plugins/bower_components/bootstrap-select/bootstrap-select.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/plugins/bower_components/custom-select/custom-select.css') }}">
<link rel="stylesheet" href="{{ asset('public/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css">

	<style>
	   :root {
			/*--header_color: #62637b;*/
			--sidebar_color: #0c2242;
			--link_color: #ffffff;
			--sidebar_text_color: #cbcbcb;
		}
		.menu-footer,.menu-copy-right{
			border-top: 1px solid #2f3544;
			background: var(--sidebar_color);
		}
		.navbar-header {
			background: var(--header_color);
		}
		.content-wrapper .sidebar #side-menu>li:hover{
			background: var(--sidebar_color);
		}
		.sidebar-nav .notify {
			margin: 0 !important;
		}
		.sidebar .notify .heartbit {
			border: 5px solid var(--header_color) !important;
			top: -23px !important;
			right: -15px !important;
		}
		.sidebar .notify .point {
			background-color: var(--header_color) !important;
			top: -13px !important;
		}

		.navbar-top-links > li > a {
			color: var(--link_color);
		}
		/*Right panel*/
		.right-sidebar .rpanel-title {
			background: var(--header_color);
		}
		/*Bread Crumb*/
		.bg-title .breadcrumb .active {
			color: var(--header_color);
		}
		/*Sidebar*/
		.sidebar {
			background: var(--sidebar_color);
			box-shadow: 1px 0px 20px rgba(0, 0, 0, 0.08);
		}
		.sidebar .label-custom {
			background: var(--header_color);
		}
		#side-menu li a, #side-menu > li:not(.user-pro) > a {
			color: var(--sidebar_text_color);
			border-left: 0 solid var(--sidebar_color);
		}
		#side-menu > li > a:hover,
		#side-menu > li > a:focus {
			background: rgba(0, 0, 0, 0.07);
		}
		#side-menu > li > a.active {
			/* border-left: 3px solid var(--header_color); */
			color: var(--link_color);
			background: var(--header_color);
		}
		#side-menu > li > a.active i {
			color: var(--link_color);
		}
		#side-menu ul > li > a:hover {
			color: var(--link_color);
		}
		#side-menu ul > li > a.active, #side-menu ul > li > a:hover {
			color: var(--header_color);
		}
		.sidebar #side-menu .user-pro .nav-second-level a:hover {
			color: var(--header_color);
		}
		.nav-small-cap {
			color: var(--sidebar_text_color);
		}
		/* .content-wrapper .sidebar .nav-second-level li {
			background: #444859;
		}
		@media (min-width: 768px) {
			.content-wrapper #side-menu ul,
			.content-wrapper .sidebar #side-menu > li:hover,
			.content-wrapper .sidebar .nav-second-level > li > a {
				background: #444859;
			}
		} */

		/*themecolor*/
		.bg-theme {
			background-color: var(--header_color) !important;
		}
		.bg-theme-dark {
			background-color: var(--sidebar_color) !important;
		}
		/*Chat widget*/
		.chat-list .odd .chat-text {
			background: var(--header_color);
		}
		/*Button*/
		.btn-custom {
			background: var(--header_color);
			border: 1px solid var(--header_color);
			color: var(--link_color);
		}
		.btn-custom:hover {
			background: var(--header_color);
			border: 1px solid var(--header_color);
		}
		/*Custom tab*/
		.customtab li.active a,
		.customtab li.active a:hover,
		.customtab li.active a:focus {
			border-bottom: 2px solid var(--header_color);
			color: var(--header_color);
		}
		.tabs-vertical li.active a,
		.tabs-vertical li.active a:hover,
		.tabs-vertical li.active a:focus {
			background: var(--header_color);
			border-right: 2px solid var(--header_color);
		}
		/*Nav-pills*/
		.nav-pills > li.active > a,
		.nav-pills > li.active > a:focus,
		.nav-pills > li.active > a:hover {
			background: var(--header_color);
			color: var(--link_color);
		}

		.admin-panel-name{
			background: var(--header_color);
		}

		/*fullcalendar css*/
		.fc th.fc-widget-header{
			background: var(--sidebar_color);
		}

		.fc-button{
			background: var(--header_color);
			color: var(--link_color);
			margin-left: 2px !important;
		}

		.fc-unthemed .fc-today{
			color: #757575 !important;
		}

		.user-pro{
			background-color: var(--sidebar_color);
		}


		.top-left-part{
			background: var(--sidebar_color);
		}

		.notify .heartbit{
			border: 5px solid var(--sidebar_color);
		}

		.notify .point{
			background-color: var(--sidebar_color);
		}
		.dropdown-menu.mailbox{
			padding-top: 0;
		}
		.invalid-feedback{color: #ef6060;}
	</style>

	<style>
		.sidebar .notify  {
		margin: 0 !important;
		}
		.sidebar .notify .heartbit {
		top: -23px !important;
		right: -15px !important;
		}
		.sidebar .notify .point {
		top: -13px !important;
		}
		.top-notifications .message-center .user-img{
			 margin: 0 0 0 0 !important;
		 }
		/* .content-wrapper .sidebar #side-menu>li>.active {
			background: transparent;
		}
		.content-wrapper .sidebar #side-menu>li>.active:hover {
			background: #272d36;
		} */
	</style>


</head>
<body class="fix-sidebar">
 <div class='notifications top-right'></div>
<!-- Preloader -->
<div class="preloader">
	<div class="cssload-speeding-wheel"></div>
</div>
<div id="wrapper">
	<!-- Left navbar-header -->
	<div class="navbar-default sidebar" role="navigation">
	<!-- /.navbar-header -->
	<div class="top-left-part">
		<a class="logo hidden-xs hidden-sm text-center" href="#">
		<img src="{{asset('public/img/iso.png')}}" alt="logo" class=" logo"/>  
		</a>
	</div>
	<div class="sidebar-nav navbar-collapse slimscrollsidebar">

		<!-- .User Profile -->
		<ul class="nav" id="side-menu">
			<li class="sidebar-search hidden-sm hidden-md hidden-lg">
				<!-- input-group -->
				<div class="input-group custom-search-form">
					<input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
							<button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
							</span> </div>
				<!-- /input-group -->
			</li>

			 <li class="user-pro hidden-sm hidden-md hidden-lg">
				
					<a href="#" class="waves-effect"> <span class="hide-menu">s
							<span class="fa arrow"></span></span>
					</a>
		   
				<ul class="nav nav-second-level">
				   
					<li role="separator" class="divider"></li>
					<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
														document.getElementById('logout-form').submit();"
						><i class="fa fa-power-off"></i>Logout</a>

					</li>
				</ul>
			</li>


			<li class="user-pro hidden-sm hidden-md hidden-lg">
			 
					<a href="#" class="waves-effect"><img src="" alt="user-img" class="img-circle"> <span class="hide-menu">{{ Auth::user()->name }}
							<span class="fa arrow"></span></span>
					</a>
			
				<ul class="nav nav-second-level">
				   
					<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
														document.getElementById('logout-form').submit();"
						><i class="fa fa-power-off"></i> Logout</a>

					</li>
				</ul>
			</li>

			<li><a href="{{ route('superadmin.login') }}" class="waves-effect"><i class="icon-speedometer fa-fw"></i> <span class="hide-menu">Dashboard </span></a> </li>

			<li><a href="{{ route('modules') }}" class="waves-effect"><i class="icon-calculator fa-fw"></i> <span class="hide-menu">Modules </span></a> </li>

			<li><a href="{{ route('package') }}" class="waves-effect"><i class="icon-calculator fa-fw"></i> <span class="hide-menu">Packages </span></a> </li>
		   
		   <li><a href="{{ route('company') }}" class="waves-effect"><i class="icon-layers fa-fw"></i> <span class="hide-menu">Companies </span></a> </li>

		   <li><a href="{{ route('invoice') }}" class="waves-effect"><i class="icon-printer fa-fw"></i> <span class="hide-menu">Invoices </span></a> </li>

		   <li><a href="{{ route('document.index') }}" class="waves-effect"><i class="fa fa-file"></i> <span class="hide-menu">Document name Management </span></a> </li>

			<li><a href="{{ route('document-template.index') }}" class="waves-effect"><i class="fa fa-edit"></i> <span class="hide-menu">Default templates management</span></a> </li>

			<li><a href="{{ route('department')}}" class="waves-effect"><i class="fa fa-building-o"></i> <span class="hide-menu">Department Management</span></a> </li>
			<li><a href="{{ route('designation') }}" class="waves-effect"><i class="icon-docs fa-fw"></i> <span class="hide-menu">Designation Management</span></a> </li>

			<li><a href="{{ route('standard') }}" class="waves-effect"><i class="fa fa-stack-exchange"></i> <span class="hide-menu">Standard Management</span></a> </li>
			<li><a href="{{ route('scope') }}" class="waves-effect"><i class="fa fa-crosshairs"></i> <span class="hide-menu">Scope Management</span></a> </li>



			<li><a href="{{ route('superadmin') }}" class="waves-effect"><i class="fa fa-user fa-fw"></i> <span class="hide-menu">Super Admin</span></a> </li>

		  <!--  <li><a href="#" class="waves-effect"><i class="fa fa-question-circle"></i> <span class="hide-menu">Admin FAQ </span></a> </li>

		   <li><a href="#" class="waves-effect"><i class="fa fa-cogs fa-fw"></i> <span class="hide-menu">Front Settings </span></a> </li>

		   <li><a href="#" class="waves-effect"><i class="icon-settings fa-fw"></i> <span class="hide-menu">Settings </span></a> </li> -->
			   

		</ul>

		 <div class="menu-footer">
			<div class="menu-user row">
				<div class="col-lg-4 m-b-5">
					<div class="btn-group dropup user-dropdown">

							<img aria-expanded="false" data-toggle="dropdown" src="{{asset('public/img/default-profile-3.png')}}" alt="user-img" class="img-circle dropdown-toggle h-30 w-30">
						<ul role="menu" class="dropdown-menu">
							<li><a class="bg-inverse"><strong class="text-info"></strong></a></li>
						   
							<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
																document.getElementById('logout-form').submit();"
								><i class="fa fa-power-off"></i> Logout</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>

						</ul>
					</div>
				</div>

			   

			  

			</div>

			<div class="menu-copy-right">
				<a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="ti-angle-double-right ti-angle-double-left"></i> <span class="collapse-sidebar-text">Collapse Sidebar</span></a>
			</div>

		</div>

		</div>
		
  </div>
	  <div id="page-wrapper" class="row">
		<div class="container-fluid">

	   @yield('content')
	   <div class="right-sidebar">
	<div class="slimscrollright" id="right-sidebar-content">

	</div>
</div>
	  </div>
	</div>

</div>


  

<!-- jQuery -->
<script src="{{ asset('public/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('public/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js'></script>

<!-- Sidebar menu plugin JavaScript -->
<script src="{{ asset('public/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
<!--Slimscroll JavaScript For custom scroll-->
<script src="{{ asset('public/js/jquery.slimscroll.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('public/js/waves.js') }}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{ asset('public/plugins/bower_components/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('public/js/custom.js') }}"></script>
<script src="{{ asset('public/js/jasny-bootstrap.js') }}"></script>
<script src="{{ asset('public/plugins/froiden-helper/helper.js') }}"></script>
<script src="{{ asset('public/plugins/bower_components/toast-master/js/jquery.toast.js') }}"></script>

 <script src="{{ asset('public/plugins/bower_components/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
	<script src="{{ asset('public/plugins/bower_components/custom-select/custom-select.min.js') }}"></script>
	<script src="{{ asset('public/plugins/bower_components/bootstrap-select/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('public/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ asset('public/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
	<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
	<script src="{{ asset('public/js/datatables/buttons.server-side.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.js"></script>
	<script>
  @if(Session::has('success'))
	 $('.top-right').notify({
		message: { text: "{{ Session::get('success') }}" }
	  }).show();
	 @php
	   Session::forget('success');
	 @endphp
  @endif


  @if(Session::has('info'))
	  $('.top-right').notify({
		message: { text: "{{ Session::get('info') }}" },
		type:'info'
	  }).show();
	  @php
		Session::forget('info');
	  @endphp
  @endif


  @if(Session::has('warning'))
	  $('.top-right').notify({
		message: { text: "{{ Session::get('warning') }}" },
		type:'warning'
	  }).show();
	  @php
		Session::forget('warning');
	  @endphp
  @endif


  @if(Session::has('error'))
	  $('.top-right').notify({
		message: { text: "{{ Session::get('error') }}" },
		type:'danger'
	  }).show();
	  @php
		Session::forget('error');
	  @endphp
  @endif

</script>

  @yield('script')
</body>
</html>
