@extends('layouts.app')

@section('title', 'HomePage')

@section('content')
    <div class="content">
        <div class="container-fluid py-4">
            <div class="card col-md-8 mx-auto">
                <div class="card-header text-center">
                    <h2 class="card-title">Ajouter Task</h2>
                </div>
                <div class="card-body mt-4">
                    <form method="post" action="{{ route('store.Task')}}">
                        @csrf
                        <input type="hidden" id="project_Id" class="form-control" name="project_Id" value="{{ $id }}">
                        <div class="form-group">
                            <label for="title">Titre</label>
                            <input type="text" id="title" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Description</label>
                            <textarea name="description" id="inputDescription" class="form-control" rows="4"
                                placeholder="Ajouter ce champ s'il vous plaît" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
