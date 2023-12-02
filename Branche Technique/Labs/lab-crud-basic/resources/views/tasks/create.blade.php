@extends('layouts.master')
@include('layouts.nav')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Ajouter Une Tâche</h2>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('tasks.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="nom" class="form-label">Projet</label>
                        <select name="projetId" id="projetId" class="form-select">
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}">
                        @error('nom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-5">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" rows="3" name="description" id="description">{!!  old('description') !!}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    

                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
@endsection
