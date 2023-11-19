@extends('layouts.app')
    
@section('content')
  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1>Projet One</h1> --}}
            </div>
        </div>
    </div>
  </div>

<section class="content ">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
              {{-- get form feailds --}}
              @include('projects.formFields')
            </div>
        </div>
    </div>
</section>
@endsection


