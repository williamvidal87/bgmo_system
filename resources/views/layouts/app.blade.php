<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('image/logo/norsu2.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('image/logo/norsu2.png') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="{{ asset('datatable/buttons.dataTables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('datatable/jquery.dataTables.min.css') }}" rel="stylesheet" />
  
    <link rel="stylesheet" type="text/css" href="{{ asset('toast/toast.css') }}">
    <!-- End layout styles -->
    
    @livewireStyles
    <!-- Scripts -->
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
  </head>
  <body>
    
    {{-- @include('layouts.shared.header') --}}
    
    
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      
      @include('layouts.shared.header')
      
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        
        @include('layouts.shared.main_nav')
        
        
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            {{ $slot }}
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          @include('layouts.shared.footer')
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="datatable/jquery.dataTables.min.js"></script>
    <script src="datatable/dataTables.buttons.min.js"></script>
    <script src="datatable/jszip.min.js"></script>
    <script src="datatable/pdfmake.min.js"></script>
    <script src="datatable/vfs_fonts.js"></script>
    <script src="datatable/buttons.html5.min.js"></script>
    <script src="datatable/buttons.print.min.js"></script>
    
    <!--toast -->
    <script type="text/javascript" src="toast/toast.js"></script>
    <!--sweet alert -->
    <script type="text/javascript" src="swal/sweetalert.js"></script>
    <!-- End custom js for this page -->
    
    @livewireScripts
    @stack('admin-table-scripts')
    @stack('client-table-scripts')
    @stack('inventory-table-scripts')
    @stack('borrowing-request-table-scripts')
    @stack('requesting-service-table-scripts')
    
    @stack('equipment-borrowing-table-scripts')
    @stack('request-service-table-scripts')
      
  </body>
</html>