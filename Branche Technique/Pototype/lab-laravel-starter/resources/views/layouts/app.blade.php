<x-laravel-ui-adminlte::adminlte-layout>
    <script src="https://cdn.tiny.cloud/1/API_KEY/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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

    <script>
        tinymce.init({
            selector: '#Description',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
        });
    </script>
    
</x-laravel-ui-adminlte::adminlte-layout>
