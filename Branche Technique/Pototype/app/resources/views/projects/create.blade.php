@extends('layouts.app')

@section('title', 'HomePage')
    
@section('content')
  <section class="content-wrapper">
    <div class="content py-4">
      <div class="container card col-md-8">
          <h2 class="card-header">Ajouter Projet</h2>
            <div class="card-body">
                <form method="post" action="">
                   
                    <input type="hidden" name="id_user" value="">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" id="nom" class="form-control" name="nom">
                    </div>
                    <div class="form-group">
                        <label for="dateDebut">Date de debut</label>
                        <input type="date" id="dateDebut" class="form-control" name="date_debut">
                    </div>
                    <div class="form-group">
                        <label for="dateFin">Date de fin</label>
                        <input type="date" id="dateFin" class="form-control" name="date_fin">
                    </div>
                    <div class="form-group">
                      <label for="inputDescription">Description</label>
                      <textarea name="description" id="inputDescription" class="form-control" oninvalid="this.setCustomValidity('Ajouter ce champ s\'il vous plaît')" oninput="setCustomValidity('')"></textarea>
                    </div>
        
                    <button type="submit" class="btn btn-success mb-2">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
  </section>
@endsection