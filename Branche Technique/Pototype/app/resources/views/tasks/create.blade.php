@extends('layouts.app')

@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
              {{-- get form feailds --}}
              @include('tasks.formFeilds')
            </div>
        </div>
    </div>
</section>
@endsection
