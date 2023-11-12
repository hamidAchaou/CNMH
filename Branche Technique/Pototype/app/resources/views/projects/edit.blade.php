@extends('layouts.app')

@section('title', 'HomePage')

@section('content')
    <div class="content py-4 row justify-content-center">
        <div class="container card col-md-8">
            <h2 class="card-header">Modifier Projet</h2>
            <div class="card-body">
                <form action="{{ route('projects.update', $project->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="name">Nom <span class="text-danger">*</span></label>
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $project->name) }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="startDate">Date de debut <span class="text-danger">*</span></label>
                        <input type="date" id="startDate" class="form-control @error('startDate') is-invalid @enderror" name="startDate" value="{{ old('startDate', $project->startDate) }}">
                        @error('startDate')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="endDate">Date de fin <span class="text-danger">*</span></label>
                        <input type="date" id="endDate" class="form-control @error('endDate') is-invalid @enderror" name="endDate" value="{{ old('endDate', $project->endDate) }}">
                        @error('endDate')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="inputDescription">Description</label>
                        <textarea name="description" id="inputDescription" class="form-control @error('description') is-invalid @enderror"
                            oninvalid="this.setCustomValidity('Ajouter ce champ s\'il vous plaît')"
                            oninput="setCustomValidity('')">{{ old('description', $project->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success mb-2">Modifier</button>
                </form>
            </div>
        </div>
    </div>
@endsection
