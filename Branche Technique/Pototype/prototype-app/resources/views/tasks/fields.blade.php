<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ isset($task) ? __('words.edit_task') : __('words.add_task') }}</h3>
    </div>
    <form method="POST" class="container pt-2" action="{{ isset($task) ? route('tasks.update', ['id' => $task->project_id, 'task_id' => $task->id]) : route('tasks.store') }}">
        @csrf
        @if (isset($task))
            @method('PUT')
        @endif
        <div class="card-body">
            <div class="form-group">
                <label for="nom" class="form-label">Projet</label>
                <select name="project_id" id="project_id" class="form-control">
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" {{ request()->route('id') == $project->id ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
                @error('project_id')
                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                @enderror
            </div>
            

            <div class="form-group mb-3">
                <label for="nom">Name</label>
                <input name="name" type="text" class="form-control" id="nom" placeholder="Enter name"
                    value="{{ old('name', isset($task) ? $task->name : '') }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="Description">Description</label>
                <textarea name="description" id="inputDescription" class="form-control" oninput="setCustomValidity('')">{{ old('description', isset($task) ? $task->description : '') }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="date">Start Date</label>
                <input name="start_date" type="date" class="form-control" id="date"
                    value="{{ old('start_date', isset($task) ? $task->start_date : '') }}">
                @error('start_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="date">End Date</label>
                <input name="end_date" type="date" class="form-control" id="date"
                    value="{{ old('end_date', isset($task) ? $task->end_date : '') }}">
                @error('end_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- <input name="project_id" type="hidden" class="form-control" value="{{ $project->id }}"> --}}
        </div>
        <div class="card-footer">
            <a href="{{ route('tasks.index', $project->id) }}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary mx-2">{{ isset($task) ? 'Update' : 'Add' }}</button>
        </div>
    </form>
</div>
