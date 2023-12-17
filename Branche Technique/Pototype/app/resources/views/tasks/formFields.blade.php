<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ isset($task) ? __('words.edit_project') : __('words.add_project') }}</h3>
    </div>
    {{-- <form method="post" action="{{ route('tasks.update', $tasks->id) }}"> --}}
        <form method="POST" class="container pt-2" action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}">
            @csrf
            @if (isset($task))
                @method('PUT')
            @endif
        {{-- <input type="hidden" name="project_Id" value="{{ request()->input('project_Id') }}"> --}}
        {{-- <input type="hidden" name="id_user">
        <input type="hidden" name="project_Id" value="{{$id}}"> --}}

        <div class="form-group">
            <label for="nom" class="form-label">Projet</label>
            <select name="project_Id" id="project_Id" class="form-control">
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
            @error('project_Id')
                <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" id="nom" class="form-control" name="name" value="{{ old('name', isset($task) ? $task->name : '') }}">
            @error('name')
                <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <div class="form-group mt-2 mb-0">
                <label for="Description">{{ __('words.description') }}</label>
                <textarea name="description" id="Description">{{ old('description', isset($task) ? $task->description : '') }}</textarea>
            </div>
            @error('description')
                <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mb-2">Mettre à jour</button>
    </form>
</div>

