<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> @yield('title') </title>
  @include('layouts.links')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper" id="app">
    
      <!-- Preloader -->
      {{-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/logo.png" alt="AdminLTELogo" height="60" width="60">
      </div> --}}
    <div>
        @include('layouts.nav')
        @include('layouts.sidebar')
    </div>
    <main>
        @yield('content')
    </main>
 


    
    
      {{-- <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside> --}}
      <!-- /.control-sidebar -->

      <div>
        @include('layouts.footer')
      </div>

      @include('layouts.linksScript')
    </div>
    <!-- ./wrapper -->
    
    
    </body>
    </html>
    