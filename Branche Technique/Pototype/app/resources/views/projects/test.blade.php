<table id="dossier-patients-table" class="table table-striped">
    <thead>
        <tr>
            <th>{{ __('words.project_name') }}</th>
            <th>{{ __('words.description') }}</th>
            <th>{{ __('words.start_date') }}</th>
            <th>{{ __('words.end_date') }}</th>
            <th>{{ __('words.project_tasks') }}</th>
            @if(auth()->check() && auth()->user()->role == 'chefProjet')
                <th style="width: 11%">{{ __('words.action') }}</th>
            @endif
        </tr>
    </thead>
    <tbody id="search-result">
        {{-- Loop through $projects --}}
        @forelse ($projects as $project)
            <tr>
                <td>{{ $project->name }}</td>
                <td>{{ $project->description }}</td>
                <td>{{ $project->startDate }}</td>
                <td>{{ $project->endDate }}</td>
                <td>
                    {{-- Button to show project tasks --}}
                    <a href="{{ route('projects.show', ['id' => $project->id]) }}" class="nav-link text-center text-primary">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </td>
                @can('view', $project)
                    <td>
                        {{-- Button to edit projects --}}
                        <a href="{{ route('projects.edit', ['id' => $project->id]) }}" class="btn btn-sm btn-success">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        {{-- Button to delete projects --}}
                        <button type="button" class="btn btn-sm btn-danger" onclick="AddIdProject({{$project->id}})" data-toggle="modal" data-target="#modal-projectDelete">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                @endcan
            </tr>
        @empty
            <tr>
                <td colspan="6">No projects to display</td>
            </tr>
        @endforelse
    </tbody>
</table>
