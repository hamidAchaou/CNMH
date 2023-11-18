<x-laravel-ui-adminlte::adminlte-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- get Navbar -->
            @include('layouts.navbar')

            <!-- Left side column. contains the logo and sidebar -->
            @include('layouts.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <main class="content-wrapper">
                @yield('content')
            </main>

            {{-- get footer --}}
            <div>
                @include('layouts.footer')
            </div>
        </div>
    </body>
</x-laravel-ui-adminlte::adminlte-layout>
