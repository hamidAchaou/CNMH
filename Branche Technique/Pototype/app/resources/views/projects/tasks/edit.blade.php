@extends('layouts.app')

@section('title', 'HomePage')

@section('content')
    <section class="content-wrapper">
        <section class="content container-fluid py-4">
            <div class="container card col-md-8">
                <h2 class="pt-3 card-header">Ajouter Task</h2>
                <div class="mt-4">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="name">Titre</label>
                            <input type="text" id="title" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Description</label>
                            <textarea name="description" id="inputDescription" class="form-control"
                                oninvalid="this.setCustomValidity('Ajouter ce champ s\'il vous plaît')" oninput="setCustomValidity('')"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mb-4">Ajouter</button>
                    </form>
                </div>

            </div>
        </section>
    </section>
@endsection
