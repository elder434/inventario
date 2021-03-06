<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{asset('/cork/assets/img/favicon.ico')}}"/> 
    <link href="{{asset('/cork/assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('/cork/assets/js/loader.js')}}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('/cork/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/cork/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('/cork/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/cork/plugins/table/datatable/dt-global_style.css')}}">
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- css de pagina -->
    @yield('css')

</head>
<body class="bg-light text-dark table-bordered">
    <!-- header -->
    @include('layouts.partials.header')
     <!-- contenido de la pagina -->
                @yield('contend')
            
        

     <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
     <script src="{{asset('/cork/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
     <script src="{{asset('/cork/bootstrap/js/popper.min.js')}}"></script>
     <script src="{{asset('/cork/bootstrap/js/bootstrap.min.js')}}"></script>
     <script src="{{asset('/cork/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
     <script src="{{asset('/cork/assets/js/app.js')}}"></script>
     <script>
         $(document).ready(function() {
             App.init();
            });
            </script>
     <script src="{{asset('/cork/assets/js/custom.js')}}"></script>
     <!-- END GLOBAL MANDATORY SCRIPTS -->
     <!-- js de cada pagina -->
     @yield('js')


<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('/cork/plugins/table/datatable/datatables.js')}}"></script>
    <script>
        $('#zero-config').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Mostrando p??gina _PAGE_ de _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Buscar...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 
        });
    </script>

<!-- END PAGE LEVEL SCRIPTS -->

</body>
</html>