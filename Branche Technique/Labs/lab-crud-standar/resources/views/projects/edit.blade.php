@extends('layouts.master')
@include('layouts.nav')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Modifier Une Tâche</h2>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                    {{-- fet Form fealds --}}
                    @include('projects.formFields')

            </div>
        </div>
    </div>
@endsection
