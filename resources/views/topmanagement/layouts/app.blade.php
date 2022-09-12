<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Audit') }}</title>

    <!-- 
    <script  type="text/javascript" src="{{ asset('public/js/app.js') }}" ></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!--  <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">  -->
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
                  <a class="navbar-brand" href="#">
                      <b>
                        <img src="{{ asset('public/assets/images/logo-icon.png') }}" alt="homepage" class="dark-logo" />
                        <img src="{{ asset('public/assets/images/logo-light-icon.png') }}" alt="homepage" class="light-logo" />
                     </b>
                       <span style="display: none;">
                        <img src="{{ asset('public/assets/images/logo-text.png') }}" alt="homepage" class="dark-logo" />
                        <img src="{{ asset('public/assets/images/logo-light-text.png') }}" class="light-logo" alt="homepage" />
                     </span>
                  </a>
               </div>
               <!-- ============================================================== -->
               <!-- End Logo -->
               <!-- ============================================================== -->
               <div class="navbar-collapse">
                  <!-- ============================================================== -->
                  <!-- toggle and nav items -->
                  <!-- ============================================================== -->
                  <ul class="navbar-nav mr-auto mt-md-0">
                     <!-- This is  -->
                     <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                     <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                     <!-- ============================================================== -->
                     <!-- Comment -->
                     <!-- ============================================================== -->
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="mdi mdi-message"></i>
                           <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        </a>
                        <div class="dropdown-menu mailbox animated slideInUp">
                           <ul>
                              <li>
                                 <div class="drop-title">Notifications</div>
                              </li>
                              <li>
                                 <div class="message-center">
                                    <!-- Message -->
                                    <a href="#">
                                       <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                       <div class="mail-contnet">
                                          <h5>Luanch Admin</h5>
                                          <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> 
                                       </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                       <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                       <div class="mail-contnet">
                                          <h5>Event today</h5>
                                          <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> 
                                       </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                       <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                       <div class="mail-contnet">
                                          <h5>Settings</h5>
                                          <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> 
                                       </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                       <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                       <div class="mail-contnet">
                                          <h5>Pavan kumar</h5>
                                          <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> 
                                       </div>
                                    </a>
                                 </div>
                              </li>
                              <li>
                                 <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                              </li>
                           </ul>
                        </div>
                     </li>
                     <!-- ============================================================== -->
                     <!-- End Comment -->
                     <!-- ============================================================== -->
                     <!-- ============================================================== -->
                     <!-- Messages -->
                     <!-- ============================================================== -->
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="mdi mdi-email"></i>
                           <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        </a>
                        <div class="dropdown-menu mailbox animated slideInUp" aria-labelledby="2">
                           <ul>
                              <li>
                                 <div class="drop-title">You have 4 new messages</div>
                              </li>
                              <li>
                                 <div class="message-center">
                                    <!-- Message -->
                                    <a href="#">
                                       <div class="user-img"> <img src="{{ asset('public/assets/images/users/1.jpg') }}" alt="user" class="img-circle"> <span class="profile-status online"></span> </div>
                                       <div class="mail-contnet">
                                          <h5>Pavan kumar</h5>
                                          <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> 
                                       </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                       <div class="user-img"> <img src="{{ asset('public/assets/images/users/2.jpg') }}" alt="user" class="img-circle"> <span class="profile-status busy"></span> </div>
                                       <div class="mail-contnet">
                                          <h5>Sonu Nigam</h5>
                                          <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> 
                                       </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                       <div class="user-img"> <img src="{{ asset('public/assets/images/users/3.jpg') }}" alt="user" class="img-circle"> <span class="profile-status away"></span> </div>
                                       <div class="mail-contnet">
                                          <h5>Arijit Sinh</h5>
                                          <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> 
                                       </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                       <div class="user-img"> <img src="{{ asset('public/assets/images/users/4.jpg') }}" alt="user" class="img-circle"> <span class="profile-status offline"></span> </div>
                                       <div class="mail-contnet">
                                          <h5>Pavan kumar</h5>
                                          <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> 
                                       </div>
                                    </a>
                                 </div>
                              </li>
                              <li>
                                 <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                              </li>
                           </ul>
                        </div>
                     </li>
                     <!-- ============================================================== -->
                     <!-- End Messages -->
                     <!-- ============================================================== -->
                     <!-- ============================================================== -->
                     <!-- Messages -->
                     <!-- ============================================================== -->
                     <li class="nav-item dropdown mega-dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-view-grid"></i></a>
                        <div class="dropdown-menu animated slideInUp">
                           <ul class="mega-dropdown-menu row">
                              <li class="col-lg-3 col-xlg-2 m-b-30">
                                 <h4 class="m-b-20">CAROUSEL</h4>
                                 <!-- CAROUSEL -->
                                 <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                       <div class="carousel-item active">
                                          <div class="container"> <img class="d-block img-fluid" src="{{ asset('public/assets/images/big/img1.jpg') }}" alt="First slide"></div>
                                       </div>
                                       <div class="carousel-item">
                                          <div class="container"><img class="d-block img-fluid" src="{{ asset('public/assets/images/big/img2.jpg') }}" alt="Second slide"></div>
                                       </div>
                                       <div class="carousel-item">
                                          <div class="container"><img class="d-block img-fluid" src="{{ asset('public/assets/images/big/img3.jpg') }}" alt="Third slide"></div>
                                       </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                                 </div>
                                 <!-- End CAROUSEL -->
                              </li>
                              <li class="col-lg-3 m-b-30">
                                 <h4 class="m-b-20">ACCORDION</h4>
                                 <!-- Accordian -->
                                 <div id="accordion" class="nav-accordion" role="tablist" aria-multiselectable="true">
                                    <div class="card">
                                       <div class="card-header" role="tab" id="headingOne">
                                          <h5 class="mb-0">
                                             <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                             Collapsible Group Item #1
                                             </a>
                                          </h5>
                                       </div>
                                       <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                          <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high. </div>
                                       </div>
                                    </div>
                                    <div class="card">
                                       <div class="card-header" role="tab" id="headingTwo">
                                          <h5 class="mb-0">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                             Collapsible Group Item #2
                                             </a>
                                          </h5>
                                       </div>
                                       <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                          <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                       </div>
                                    </div>
                                    <div class="card">
                                       <div class="card-header" role="tab" id="headingThree">
                                          <h5 class="mb-0">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                             Collapsible Group Item #3
                                             </a>
                                          </h5>
                                       </div>
                                       <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                          <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              <li class="col-lg-3  m-b-30">
                                 <h4 class="m-b-20">CONTACT US</h4>
                                 <!-- Contact -->
                                 <form>
                                    <div class="form-group">
                                       <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> 
                                    </div>
                                    <div class="form-group">
                                       <input type="email" class="form-control" placeholder="Enter email"> 
                                    </div>
                                    <div class="form-group">
                                       <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-info">Submit</button>
                                 </form>
                              </li>
                              <li class="col-lg-3 col-xlg-4 m-b-30">
                                 <h4 class="m-b-20">List style</h4>
                                 <!-- List style -->
                                 <ul class="list-style-none">
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>
                                 </ul>
                              </li>
                           </ul>
                        </div>
                     </li>
                     <!-- ============================================================== -->
                     <!-- End Messages -->
                     <!-- ============================================================== -->
                  </ul>
                  <!-- ============================================================== -->
                  <!-- User profile and search -->
                  <!-- ============================================================== -->
                  <ul class="navbar-nav my-lg-0">
                     <!-- ============================================================== -->
                     <!-- Search -->
                     <!-- ============================================================== -->
                     <li class="nav-item hidden-sm-down search-box">
                        <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"></a>
                       
                     </li>
                     <!-- ============================================================== -->
                     <!-- Language -->
                     <!-- ============================================================== -->
                     <!-- ============================================================== -->
                     <!-- Profile -->
                     <!-- ============================================================== -->
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('public/assets/images/users/1.jpg') }}" alt="user" class="profile-pic" /></a>
                        <div class="dropdown-menu dropdown-menu-right scale-up">
                           <ul class="dropdown-user">
                              <li>
                                 <div class="dw-user-box">
                                    <div class="u-img"><img src="{{ asset('public/assets/images/users/1.jpg') }}" alt="user"></div>
                                    <div class="u-text">
                                       <h4>{{ Auth::user()->name }}</h4>
                                       <p class="text-muted">{{ Auth::user()->email }}</p>
                                       <a href="pages-profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                                    </div>
                                 </div>
                              </li>
                             
                              <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();
														document.getElementById('logout-form').submit();" class="" data-toggle="tooltip" title="Logout"><i class="ti--power"></i>Logout</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form></li>
                           </ul>
                        </div>
                     </li>
                  </ul>
               </div>
            </nav>
         </header>
        
<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
               <!-- User profile -->
               <div class="user-profile">
                  <!-- User profile image -->
                  <div class="profile-img">
                     <img src="{{ asset('public/assets/images/users/profile.png') }}" alt="user" />
                     <!-- this is blinking heartbit-->
                     <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                  </div>
                  <!-- User profile text-->
                  <div class="profile-text">
                     <h5>{{ Auth::user()->name }}</h5>
                     <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                     <a href="{{ route('logout') }}"  onclick="event.preventDefault();
														document.getElementById('logout-form').submit();" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
                     <div class="dropdown-menu animated flipInY">
                        <!-- text-->
                        <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                        <!-- text-->
                        <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                        <!-- text-->
                        <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                       <a href="{{ route('logout') }}"  onclick="event.preventDefault();
														document.getElementById('logout-form').submit();" class="" data-toggle="tooltip" title="Logout"><i class="ti--power"></i>Logout</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
                        <!-- text-->
                     </div>
                  </div>
               </div>
               <!-- End User profile text-->
               <!-- Sidebar navigation-->
               <nav class="sidebar-nav">
                  <ul id="sidebarnav">
                     <li class="nav-devider"></li>
                     <li>
                        <a class=" waves-effect waves-dark" href="annual-audit.html" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
                     </li>

					
					<li>
                        <a class=" waves-effect waves-dark" href="{{ route('viewauditprogram') }}" aria-expanded="false"><span class="hide-menu">Audit Program</span></a>
                        
                     </li>
				<li>
                        <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class=" fa fa-address-book-o"></i><span class="hide-menu">Audit Plan</span></a>
                        <ul aria-expanded="false" class="collapse">
                           <li><a href="{{ route('top_auditplan') }}">View Audit Plan</a></li>
                          
                         
                        </ul>
                     </li>
                  </ul>
               </nav>
               <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
         </aside>
        
<main class="py-4">
            @yield('content')
        </main>
    </div>





			<footer class="footer">
               © 2021 ISO Supporter
            </footer>
  
         </div>
      
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
      <!-- ============================================================== -->
      <!-- Style switcher -->
      <!-- ============================================================== -->
      <script src="{{ asset('public/assets/plugins/styleswitcher/jQuery.style.switcher.js') }}" ></script>
      <script>
         $(document).ready(function() {
             $(".dataTables_filter").removeAttr("top");
         });
      </script>
</body>
</html>
