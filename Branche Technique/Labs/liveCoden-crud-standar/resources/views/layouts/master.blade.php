<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  
    {{-- get Links --}}
    @include('layouts.links')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    {{-- get navbar --}}
    @include('layouts.navigation')


    {{-- get sidebar --}}
    @include('layouts.sidebar')

    <main class="content-wrapper">
        {{-- get content --}}
        @yield('content')
    </main>

    <div>
        @include('layouts.footer')
    </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

{{-- get script linkd --}}
@include('layouts.scripts')
</body>
</html>