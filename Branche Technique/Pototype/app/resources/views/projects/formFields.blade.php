<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ isset($project) ? __('words.edit_project') : __('words.add_project') }}</h3>
    </div>
    <form method="POST" action="{{ isset($project) ? route('projects.update', $project->id) : route('projects.store') }}">
        @csrf
        
        @isset($project)
            @method('PUT')
        @endisset

        <div class="card-body">
            <div class="form-group mb-0">
                <label for="name">{{ __('words.name') }}</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="{{ __('words.inputName_placeholder') }}"
                    value="{{ old('name', isset($project) ? $project->name : '') }}">
            </div>
            @error('name')
                <div class="text-danger mb-0">{{ $message }}</div>
            @enderror
            <div class="form-group mt-2 mb-0">
                <label for="Description">{{ __('words.description') }}</label>
                <textarea name="description" id="Description">{{ old('description', isset($project) ? $project->description : '') }}</textarea>
            </div>
            
            @error('description')
                <div class="text-danger ">{{ $message }}</div>
            @enderror
        </div>
        <div class="card-footer">
            <a href="{{ route('projects.index') }}" class="btn btn-default">{{ __('words.cancel') }}</a>
            <button type="submit" class="btn btn-primary mx-2">{{ isset($project) ? __('words.update') : __('words.add') }}</button>
        </div>
    </form>
</div>

