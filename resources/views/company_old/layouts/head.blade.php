<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Audit') }}</title>

    <!-- 
    <script  type="text/javascript" src="{{ asset('js/app.js') }}" ></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!--  <link href="{{ asset('css/app.css') }}" rel="stylesheet">  -->
      <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
      <title>ISO supporter | Non Confrence Page</title>
      
      <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
   
      <link href="{{ asset('css/style.css') }}" rel="stylesheet">
     
      <link href="{{ asset('css/colors/blue.css') }}" id="theme" rel="stylesheet">
    
</head>
<body>
    <main class="py-4">
            @yield('content')
        </main>
    </div>





		
      
      <script src="{{ asset('plugins/jquery/jquery.min.js') }}" ></script>
    
      <script src="{{ asset('plugins/bootstrap/js/popper.min.js') }}" ></script>
      <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}" ></script>
    
      <script src="{{ asset('js/jquery.slimscroll.js') }}" ></script>
   
      <script src="{{ asset('js/waves.js') }}" ></script>
  
      <script src="{{ asset('js/sidebarmenu.js') }}" ></script>
     
      <script src="{{ asset('plugins/sticky-kit-master/dist/sticky-kit.min.js') }}" ></script>
      <script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}" ></script>
     
      <script src="{{ asset('js/custom.min.js') }}" ></script>
      <script src="{{ asset('js/validation.js') }}" ></script>
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
      <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}" ></script>
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
      <script src="{{ asset('plugins/styleswitcher/jQuery.style.switcher.js') }}" ></script>
      <script>
         $(document).ready(function() {
             $(".dataTables_filter").removeAttr("top");
         });
      </script>
</body>
</html>
