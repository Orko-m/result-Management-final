<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title') - AMS</title>
    <link rel="apple-touch-icon" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}">
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">--}}
    <link href="{{asset('public/admin/assets/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/dashboard-ecommerce.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/charts/chart-apex.css') }}">


    <!-- BEGIN: Custom CSS-->1
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/style.css') }}">
    <!-- END: Custom CSS-->

    <!---- Start  Fontawosome --->
    <link rel="stylesheet" href="{{ asset('app-assets/fonts/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('app-assets/fonts/font-awesome/css/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('app-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">

    <!---- End  Fontawosome --->
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

@include('employee.header')


@include('employee.sidebar')



<div class="app-content content">
    @yield('content')
</div>

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

@include('admin.footer')


<!-- BEGIN: Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script  src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script  src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script  src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script  src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js')}}"></script>
<script  src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
<script  src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script  src="{{ asset('app-assets/vendors/js/tables/datatable/jszip.min.js')}}"></script>
<script  src="{{ asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
<script  src="{{ asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
<script  src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
<script  src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
<script  src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')}}"></script>
<script  src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
<script  src="{{ asset('app-assets/js/scripts/tables/table-datatables-basic.min.js')}}"></script>
<!-- END: Page JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
{{--<script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>--}}
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('app-assets/js/core/app-menu.js')}}"></script>
<script src="{{ asset('app-assets/js/core/app.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
<!-- END: Page JS-->
<script src="{{ asset('app-assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('app-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>

</body>
<!-- END: Body-->

</html>
