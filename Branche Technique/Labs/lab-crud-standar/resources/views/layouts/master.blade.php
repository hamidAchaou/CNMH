<!DOCTYPE html>
<html lang="en">

@extends('layouts.heade')

<body class="bg-light">
  {{-- @extends('layouts.nav') --}}
    <div>
  {{-- @extends('layouts.aside') --}}
    </div>

    <div>
        @yield('content')
    </div>

    @extends('layouts.script')

</body>

</html>
