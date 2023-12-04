@extends('layouts.master')
@include('layouts.nav')

@section('content')
    {{-- @dd(request()->get('id')) --}}

    <div class="container py-4">
        <div class="d-flex justify-content-between my-3">
            <h2 class="text-secondary">Les Tâches</h2>
            {{-- btn add tasks --}}
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nouvelle Tâche
            </a>
        </div>
        {{-- message Flashbag --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                {{-- filter --}}
                <div>
                    <div class="input-group">
                        <label class="input-group-text" for="projectsFilter"><i class="fas fa-filter"></i></label>
                        <select class="form-select form-control" id="projectsFilter" aria-label="Filter Select">
                            @foreach ($projects as $Project)
                                <option value="{{ $Project->id }}" {{ $Project->id == $project->id ? 'selected' : '' }}>
                                    {{ $Project->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="input-group w-25">
                    <input type="text" class="form-control" placeholder="Recherche" aria-label="Recherche"
                        aria-describedby="basic-addon1" id="search-input">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                </div>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="search-result">
                        @include('tasks.search')
                    </tbody>
                    <input type="hidden" id='page' value="1">
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <x-modal-delete-tasks />

    {{-- script search by ajax --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('JS/tasks.js') }}"></script>

@endsection
