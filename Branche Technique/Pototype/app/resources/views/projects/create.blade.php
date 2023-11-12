@extends('layouts.app')

@section('title', 'HomePage')

@section('content')
    <div class="content py-4 row justify-content-center">
        <div class="container card col-md-8">
            <h2 class="card-header">Ajouter Projet</h2>
            <div class="card-body">
                <form action="{{ route('projects.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_user" value="">
                    
                    <div class="form-group">
                        <label for="name">Nom <span class="text-danger">*</span></label>
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="startDate">Date de debut <span class="text-danger">*</span></label>
                        <input type="date" id="startDate" class="form-control @error('startDate') is-invalid @enderror" name="startDate" value="{{ old('startDate') }}">
                        @error('startDate')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="endDate">Date de fin <span class="text-danger">*</span></label>
                        <input type="date" id="endDate" class="form-control @error('endDate') is-invalid @enderror" name="endDate" value="{{ old('endDate') }}">
                        @error('endDate')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="inputDescription">Description</label>
                        <textarea name="description" id="inputDescription" class="form-control @error('description') is-invalid @enderror"
                            oninvalid="this.setCustomValidity('Ajouter ce champ s\'il vous plaît')"
                            oninput="setCustomValidity('')">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success mb-2">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
@endsection
