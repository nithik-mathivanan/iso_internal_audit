<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
   <!--  <script src="{{ asset('public/js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('public/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- This is a Animation CSS -->
    <link href="{{ asset('public/css/animate.css') }}" rel="stylesheet">

            <!-- This is a Custom CSS -->
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
    <link rel='stylesheet prefetch'
          href='https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css'>
    <link rel='stylesheet prefetch'
          href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css'>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
<link rel='stylesheet prefetch'
          href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css'>
    <!-- Styles -->
    <!-- <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">  -->
    <style type="text/css">
        
    @import url('https://fonts.googleapis.com/css?family=Playfair+Display:400,900|Poppins:400,500');

    img {
        max-width: 100%;
    }
    body
    {
        overflow: auto;
        background:url('{{asset('public/img/bg.jpeg')}}');
        background-repeat:no-repeat;
        background-position:center;
        background-size: cover;
    }

    label.required:after {content: " *"; color: red;}

    .app {
      background-color: #fff;
    /*  width: 330px;*/
      height: 570px;
      margin: 2em auto;
      border-radius: 5px;
      padding: 1em;
      position: relative;
      overflow: auto;
     /* box-shadow: 0 6px 31px -2px rgba(0, 0, 0, .3);*/
    }

    a {
        text-decoration: none;
        color: #0c2242;
    }

    p {
        font-size: 13px;
        color: #333;
        line-height: 2;
    }
        .light {
            text-align: right;
            color: #fff;
        }
            .light a {
                color: #fff;
            }

    .bg {
        width: 400px;
        height: 550px;
    /*    background: #0c2242;*/
        position: absolute;
        top: -5em;
        left: 0;
        right: 0;
        margin: auto;
        background-image: url("background.jpg");
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        clip-path: ellipse(69% 46% at 48% 46%);
    }

    form {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        width: 100%;
        text-align: center;
        padding: 2em;
    }

    header {
        width: 220px;
        height: 220px;
        margin: 1em auto;
      }

    form input {
        width: 100%;
        padding: 13px 15px;
        margin: 0.7em auto;
        border-radius: 100px;
        border: none;
        background: rgb(255,255,255,0.3);
        font-family: 'Poppins', sans-serif;
        outline: none;
        color: #fff;
    }
    input::placeholder {
        color: #fff;
        font-size: 13px;
    }

    .inputs {
        margin-top: -4em;
    }
    .error {
        color: white;
    }
    footer {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 2em;
        text-align: center;
    }

    button {
        width: 100%;
        padding: 13px 15px;
        border-radius: 100px;
        border-color: #0c2242; 
        display: block;
        background: #0c2242;
        font-family: 'Poppins', sans-serif;
        color: #fff;
    }
    @media screen and (max-width: 640px) {

            header {
                width: 90%;
                height: 80px;
            }

            body {
                overflow: scroll;
            }
            .app {
                width: 100%;
                height: 100vh;
                border-radius: 0;
            }

            .bg {
                top: -7em;
                width: 450px;
                height: 95vh;
            }
           
            .inputs {
                margin: 0;
            }
            input, button {
                padding: 18px 15px;
            }
        }
    </style>
</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

<script src="{{ asset('public/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('public/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js'></script>
 <script src="{{ asset('public/plugins/bower_components/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
    <script src="{{ asset('public/plugins/bower_components/custom-select/custom-select.min.js') }}"></script>
    <script src="{{ asset('public/plugins/bower_components/bootstrap-select/bootstrap-select.min.js') }}"></script>
@yield('script')
</body>
</html>
