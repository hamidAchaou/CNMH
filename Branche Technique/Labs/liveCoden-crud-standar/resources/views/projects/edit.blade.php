@extends('layouts.master')

@section('title', 'Modifier Projet')
    
@section('content')
<section class="">
    <div class="content py-4">
      <div class="container card col-md-8">
          <h2 class="card-header">Modifier Projet</h2>
            <div class="card-body">
                <form method="post" action="{{ route('projects.store') }}">
                   @csrf
                    <input type="hidden" name="id_user">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" id="nom" class="form-control" name="name" value="{{ $project->name }}">
                    </div>
                    <div class="form-group">
                      <label for="inputDescription">Description</label>
                      <textarea name="description" id="inputDescription" class="form-contro">
                        {{ $project->description }}
                      </textarea>
                    </div>
        
                    <button type="submit" class="btn btn-primary mb-2">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
