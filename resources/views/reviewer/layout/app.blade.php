<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Reviewer') }}</title>
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/assets/images/favicon.png') }}">
<title>ISO supporter | Non Confrence Page</title>
<link href="{{ asset('public/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('public/assets/css/colors/blue.css') }}" id="theme" rel="stylesheet">
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
</style>
</head>
<body class="mini-sidebar">
	<div class='notifications top-right'>
		@if(Session::has('success')) 
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
				{{ Session::get('success') }}
			</div>
		@endif
		@if(Session::has('error')) 
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
				{{ Session::get('error') }}
			</div>
		@endif
	</div>
	<div id="app">
		<header class="topbar">
			<nav class="navbar top-navbar navbar-expand-md navbar-light">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.html">
						<b><img src="{{ asset('public/assets/images/logo-icon.png') }}" alt="homepage" class="dark-logo" />
						<img src="{{ asset('public/assets/images/logo-light-icon.png') }}" alt="homepage" class="light-logo" /></b>
						<span>
							<img src="{{ asset('public/assets/images/logo-text.png') }}" alt="homepage" class="dark-logo" /><img src="{{ asset('public/assets/images/logo-light-text.png') }}" class="light-logo" alt="homepage" />
						</span>
					</a>
				</div>
				<div class="navbar-collapse">
					<ul class="navbar-nav mr-auto mt-md-0">
						<li class="nav-item">
							<a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a>
						</li>
						<li class="nav-item m-l-10">
							<a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> 
						</li>
					</ul>
					<ul class="navbar-nav my-lg-0">
						<li class="nav-item hidden-sm-down search-box">
							<a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)">
							</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('public/assets/images/users/1.jpg') }}" alt="user" class="profile-pic" /></a>
							<div class="dropdown-menu dropdown-menu-right scale-up">
								<ul class="dropdown-user">
									<li>
										<div class="dw-user-box">
											<div class="u-img"><img src="{{ asset('public/assets/images/users/1.jpg') }}" alt="user">
											</div>
											<div class="u-text">
												<h4>{{ Auth::user()->name }}</h4>
												<p class="text-muted">{{ Auth::user()->email }}</p>
											</div>
										</div>
									</li>
									<li role="separator" class="divider"></li>
									<li>
										<a href="{{ route('logout') }}"  onclick="event.preventDefault();
										document.getElementById('logout-form').submit();" class="" data-toggle="tooltip" title="Logout"><i class="ti--power"></i>Logout</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
										</form>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<aside class="left-sidebar">
			<div class="scroll-sidebar" >
				<div class="user-profile">
					<div class="profile-img">
						<img src="{{ asset('public/assets/images/users/1.jpg') }}" alt="user" />
						
					</div>

					<?php
					$id= Auth::user()->id;
					?>
					<div class="profile-text">
						<h5>{{ Auth::user()->name }}</h5>
						<a href="{{ route('logout') }}"  onclick="event.preventDefault();
						document.getElementById('logout-form').submit();" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
						<div class="dropdown-menu animated flipInY">
							<a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
							<a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
							<a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
							<div class="dropdown-divider"></div>
							<a href="{{ route('logout') }}"  onclick="event.preventDefault();
							document.getElementById('logout-form').submit();" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
							<a href="{{ route('logout') }}" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
						</div>
					</div>
				</div>
				
				<nav class="sidebar-nav">
					<ul id="sidebarnav">
						<li class="nav-devider"></li>
						<li>
							<a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class=" fa fa-address-book-o"></i><span class="hide-menu">Reviewer </span>
							</a>
							<ul aria-expanded="false" class="collapse">
								<li><a href="{{ route('reviewer-document') }}">Approved Document</a></li>						
							</ul>
						</li>
					</ul>
						
						
					</ul>
				</nav>
			</div>
		</aside>

		<main class="py-4">
			@yield('content')
		</main>
	</div>
	<footer class="footer">
		© 2021 ISO Supporter
	</footer>
		<script src="{{ asset('public/assets/plugins/jquery/jquery.min.js') }}" ></script>
		<script src="{{ asset('public/assets/plugins/bootstrap/js/popper.min.js') }}" ></script>
		<script src="{{ asset('public/assets/plugins/bootstrap/js/bootstrap.min.js') }}" ></script>
		<script src="{{ asset('public/assets/js/jquery.slimscroll.js') }}" ></script>
		<script src="{{ asset('public/assets/js/waves.js') }}" ></script>
		<script src="{{ asset('public/assets/js/sidebarmenu.js') }}" ></script>
		<script src="{{ asset('public/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}" ></script>
		<script src="{{ asset('public/assets/plugins/sparkline/jquery.sparkline.min.js') }}" ></script>
		<script src="{{ asset('public/assets/js/custom.min.js') }}" ></script>
		<script src="{{ asset('public/assets/js/validation.js') }}" ></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.js"></script>
		<script>
		! function(window, document, $) {
		"use strict";
		$("input,select,textarea").not("[type=submit]").jqBootstrapValidation(), $(".skin-square input").iCheck({
		checkboxClass: "icheckbox_square-green",
		radioClass: "iradio_square-green"
		}), $(".touchspin").TouchSpin(), $(".switchBootstrap").bootstrapSwitch();
		}(window, document, jQuery);
		</script>
		<!-- This is data table -->
		<script src="{{ asset('public/assets/plugins/datatables/jquery.dataTables.min.js') }}" ></script>
		<script>
		$(document).ready(function() {
		$('#myTable').DataTable();
		$(document).ready(function() {
		var table = $('#example').DataTable({
		"columnDefs": [{
		"visible": false,
		"targets": 2
		}],
		"order": [
		[2, 'asc']
		],
		"displayLength": 25,
		"drawCallback": function(settings) {
		var api = this.api();
		var rows = api.rows({
		page: 'current'
		}).nodes();
		var last = null;
		api.column(2, {
		page: 'current'
		}).data().each(function(group, i) {
		if (last !== group) {
		$(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
		last = group;
		}
		});
		}
		});
		// Order by the grouping
		$('#example tbody').on('click', 'tr.group', function() {
		var currentOrder = table.order()[0];
		if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
		table.order([2, 'desc']).draw();
		} else {
		table.order([2, 'asc']).draw();
		}
		});
		});
		});
		$('#example23').DataTable({
		dom: 'Bfrtip',
		buttons: [
		'copy', 'csv', 'excel', 'pdf', 'print'
		]
		});
		</script>
		<script src="{{ asset('public/assets/plugins/styleswitcher/jQuery.style.switcher.js') }}" ></script>
		<script>
		$(document).ready(function() {
		$(".dataTables_filter").removeAttr("top");
		});
		</script>
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