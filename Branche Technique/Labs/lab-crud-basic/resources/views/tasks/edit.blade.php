@extends('layouts.master')
@include('layouts.nav')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Edit Task</h2>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nom" class="form-label">Projet</label>
                        <select name="projetId" id="projetId" class="form-select">
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" {{ $task->projetId == $project->id ? 'selected' : '' }}>
                                    {{ $project->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ $task->nom }}">
                        @error('nom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-5">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" rows="3" name="description" id="description">{{ $task->description }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea[name=description]',
            plugins: 'advlist autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | link',
            menubar: false
        });
    </script>
@endsection




















{{-- @extends('layouts.master')

@section('content')
    <div class="container" style="margin-top:30px;">
        @if (@session('success'))
            <div style="margin-bottom:30px;">
                <span class="font-medium text-success">{{ session('success') }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('tasks.update', ['id' => $task->id]) }}">
            @csrf
            @method('patch')
            <div class="mb-3">
                <select name="projetId" id="projetId">
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" @if ($project->id == $task->projetId) selected @endif>
                            {{ $project->nom }}
                        </option>
                    @endforeach
                </select>

            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ $task->nom }}">
                @error('nom')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="" cols="30" rows="3" class="form-control" name="description">{{ $task->description }}</textarea>
            </div>
            @error('nom')
                <div>{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
@endsection --}}
