@extends('layouts.master')

@section('title', 'create Task')
    
@section('content')
<section class="">
    <div class="content py-4">
      <div class="container card col-md-8">
          <h2 class="card-header">Ajouter Task</h2>
          <div class="card-body">
            <form method="post" action="{{ route('tasks.update', $tasks->id) }}">
                @csrf

                <input type="hidden" name="project_Id" value="{{ request()->input('project_Id') }}">

                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" id="nom" class="form-control" name="name" value="{{ old('name', $tasks->name) }}">
                    @error('name')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputDescription">Description</label>
                    <textarea name="description" id="inputDescription" class="form-control" oninvalid="this.setCustomValidity('Ajouter ce champ s\'il vous plaît')" oninput="setCustomValidity('')">
                        {{ old('description', $tasks->description) }}
                    </textarea>
                    @error('description')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
        
                <button type="submit" class="btn btn-primary mb-2">Mettre à jour</button>
            </form>
        </div>
        
        </div>
    </div>
  </section>
@endsection