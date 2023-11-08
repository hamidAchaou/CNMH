
@extends('layouts.app')
@section('title', 'Edit Competences')

@section('content')
    

    <main class="content-wrapper mt-5">
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Gestion des Compétences</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('competences.update', ['id' => $competence->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="reference" class="form-label">Reference</label>
                                <input type="text" class="form-control @error('reference') is-invalid @enderror" id="reference" name="reference" placeholder="Entrez la référence" value="{{ old('reference', $competence->Reference) }}">
                                @error('reference')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="code" class="form-label">Code</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" placeholder="Entrez le code" value="{{ old('code', $competence->Code) }}">
                                @error('code')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" placeholder="Entrez le nom" value="{{ old('nom', $competence->Name) }}">
                                @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="form-group">
                                <label for="inputDescription">Description</label>
                                <textarea name="description" id="inputDescription" class="form-control @error('description') is-invalid @enderror" oninvalid="this.setCustomValidity('Ajouter ce champ s\'il vous plaît')" oninput="setCustomValidity('')">{{ old('description', $competence->Description) }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <button type="submit" name="ajouterCompetences" class="btn btn-primary" id="ajouterCompetences">EDIT Compétences</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
