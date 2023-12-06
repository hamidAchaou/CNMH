<!DOCTYPE html>
<html lang="en">

@extends('layouts.heade')

<body class="bg-light">
  {{-- @extends('layouts.nav') --}}
    <div>
  {{-- @extends('layouts.aside') --}}
    </div>

    <main class="py-4">
      @yield('content')
    </main>

    @extends('layouts.script')

</body>

</html>
