 @php
 defined('BASEPATH') OR exit('No direct script access allowed');
 @endphp

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width,initial-scale=1">
     <title>@php echo $title;@endphp</title>
     <!-- Favicon icon -->
     <link rel="icon" type="image/png" sizes="16x16" href="{{APP_ASSETS}}images/favicon.ico">
     <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
     <!-- Datetimepicker -->
     <link href="{{APP_ASSETS}}plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
     <!-- Pignose Calender -->
     <link href="{{APP_ASSETS}}plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
     <!-- Chartist -->
     <link rel="stylesheet" href="{{APP_ASSETS}}plugins/chartist/css/chartist.min.css">
     <link rel="stylesheet" href="{{APP_ASSETS}}plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
     <!-- Data Table -->
     <link href="{{APP_ASSETS}}plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
     <link href="{{APP_ASSETS}}plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="{{APP_ASSETS}}plugins/sweetalert2/dist/sweetalert2.min.css">
     <!-- FontAwesome -->
     <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
     <!-- Custom Stylesheet -->
     <link href="{{APP_ASSETS}}css/style.css" rel="stylesheet">
 </head>

 <body>
     <!-- Preloader  -->
     <div id="preloader">
         <div class="loader">
             <svg class="circular" viewBox="25 25 50 50">
                 <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
             </svg>
         </div>
     </div>

     <div id="main-wrapper">
         <div class="nav-header">
             <div class="brand-logo" style="vertical-align: middle;">
                 <a href="<?php echo base_url() ?>">
                     <!-- <b class="logo-abbr"><img src="{{APP_ASSETS}}images/bintan.png" alt="" sizes="100x100">Lapsithar</b> -->
                     <!-- <img src="{{APP_ASSETS}}images/bintan.png" alt="" style="max-height: 25px; max-width: 25px;"> -->
                     <span class="brand-title" style="color: white;">
                         LAPSITHAR
                     </span>
                 </a>
             </div>
         </div>
         <!-- Header  -->
         <div class="header">
             <div class="header-content clearfix">
                 <div class="nav-control">
                     <div class="hamburger">
                         <span class="toggle-icon"><i class="icon-menu"></i></span>
                     </div>
                 </div>
                 <div class="header-left">
                     <div class="input-group icons">
                         <div class="input-group-prepend">
                             <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                         </div>
                         <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                         <div class="drop-down animated flipInX d-md-none">
                             <form action="#">
                                 <input type="text" class="form-control" placeholder="Search">
                             </form>
                         </div>
                     </div>
                 </div>
                 <div class="header-right">
                     <ul class="clearfix">
                         <li class="icons dropdown">
                             <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                 <span class="activity active"></span>
                                 <img src="{{APP_ASSETS}}images/user/1.png" height="40" width="40" alt="">
                             </div>
                             <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                 <div class="dropdown-content-body">
                                     <ul>
                                         <li>
                                             <a href="<?php echo base_url('Userprofile') ?>"><i class="icon-user"></i> <span>Profile</span></a>
                                         </li>
                                         <li><a href="<?php echo base_url('Auth/logout') ?>"><i class="icon-key"></i> <span>Logout</span></a></li>
                                     </ul>
                                 </div>
                             </div>
                         </li>
                     </ul>
                 </div>
             </div>
         </div>
         <div class="nk-sidebar">
             <div class="nk-nav-scroll">
                 <ul class="metismenu" id="menu">
                     <!-- <li class="nav-label">Dashboard</li> -->
                     <li>
                         <a href="<?php echo base_url('Userpage') ?>" aria-expanded="false">
                             <i class="icon-speedometer menu-icon"></i><span class="nav-text"> Dashboard</span>
                         </a>
                     </li>
                     <!-- <li class="nav-label">Users</li> -->
                 </ul>
             </div>
         </div>
         @yield('content')
         <div class="footer">
             <div class="copyright">
                 <p>Copyright &copy; 2020 Diskominfo All Right Reserved<span class="float-right"> Lapsithar v.1.0</span></p>
             </div>
         </div>
     </div>
     <!-- @section('javascript') -->
     <script src="{{APP_ASSETS}}plugins/jquery/jquery.min.js"></script>
     <script src="{{APP_ASSETS}}plugins/common/common.min.js"></script>
     <script src="{{APP_ASSETS}}js/custom.min.js"></script>
     <script src="{{APP_ASSETS}}js/settings.js"></script>
     <script src="{{APP_ASSETS}}js/gleek.js"></script>
     <script src="{{APP_ASSETS}}js/styleSwitcher.js"></script>

     <!-- Chartjs -->
     <script src="{{APP_ASSETS}}plugins/chart.js/Chart.bundle.min.js"></script>
     <!-- Circle progress -->
     <script src="{{APP_ASSETS}}plugins/circle-progress/circle-progress.min.js"></script>
     <!-- Datamap -->
     <script src="{{APP_ASSETS}}plugins/d3v3/index.js"></script>
     <script src="{{APP_ASSETS}}plugins/topojson/topojson.min.js"></script>
     <script src="{{APP_ASSETS}}plugins/datamaps/datamaps.world.min.js"></script>
     <!-- Morrisjs -->
     <script src="{{APP_ASSETS}}plugins/raphael/raphael.min.js"></script>
     <script src="{{APP_ASSETS}}plugins/morris/morris.min.js"></script>

     <!-- Pignose Calender -->
     <script src="{{APP_ASSETS}}plugins/moment/moment.min.js"></script>
     <script src="{{APP_ASSETS}}plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
     <script src="{{APP_ASSETS}}plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
     <script src="{{APP_ASSETS}}plugins/pg-calendar/js/pignose.calendar.min.js"></script>
     <!-- ChartistJS -->
     <script src="{{APP_ASSETS}}plugins/chartist/js/chartist.min.js"></script>
     <script src="{{APP_ASSETS}}plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>

     <script src="{{APP_ASSETS}}js/dashboard/dashboard-1.js"></script>

     <script src="{{APP_ASSETS}}plugins/tables/js/jquery.dataTables.min.js"></script>
     <script src="{{APP_ASSETS}}plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
     <script src="{{APP_ASSETS}}plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js" type="text/javascript"></script>
     <script type="text/javascript" src="{{APP_ASSETS}}plugins/sweetalert2/dist/sweetalert2.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>

     <!-- <script type="text/javascript">
            $('#tanggal').datetimepicker({
            format: 'YYYY-MM-DD HH:MM:SS',
            sideBySide: true
        });
    </script> -->
     <script type="text/javascript">
         $('#tanggal').bootstrapMaterialDatePicker({
             format: 'YYYY-MM-DD hh:mm:ss',
             sideBySide: true
         });
     </script>

     <script type="text/javascript">
         $('#start').datepicker({
             format: 'yyyy-mm-dd'
         });
     </script>

     <script type="text/javascript">
         $('#end').datepicker({
             format: 'yyyy-mm-dd'
         });
     </script>


 </body>

 </html>