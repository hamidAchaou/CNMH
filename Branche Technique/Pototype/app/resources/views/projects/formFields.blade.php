<form method="POST" action="{{ isset($project) ? route('projects.update', $project->id) : route('projects.store') }}">
    @csrf
    @if(isset($project))
        @method('PUT') 
    @endif

    <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" value="{{ isset($project) ? $project->nom : old('nom') }}">
        @error('nom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" rows="3" name="description">{{ isset($project) ? $project->description : old('description') }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">
        {{ isset($project) ? 'Modifier' : 'Ajouter' }}
    </button>
</form>
