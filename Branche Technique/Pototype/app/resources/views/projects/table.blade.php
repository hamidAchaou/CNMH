<table id="example2" class="table table-streped table-hover">
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
        {{-- get Projets --}}
        @forelse ($projects as $project)
        <tr>
            <td>{{ $project->name }}</td>
            <td>{{ $project->description }}</td>
            <td class="text-nowrap">{{ $project->startDate }}</td>
            <td class="text-nowrap">{{ $project->endDate }}</td>
            <td>
                {{-- btn show this projects with tasks --}}
                <a href="{{ route('projects.show', ['id' => $project->id]) }}" class="nav-link text-center text-primary">
                    <i class="fa-solid fa-eye"></i>
                </a>
            </td>
            @can('view', $project)
                <td>
                    {{-- btn edit Projects --}}
                    <a href="{{ route('projects.edit', ['id' => $project->id]) }}"
                        class="btn btn-sm btn-default">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    {{-- btn delete Projects --}}
                    <button type="button" class="btn btn-default  btn-sm" onclick="AddIdProject({{$project->id}})" data-toggle="modal" data-target="#modal-projectDelete"><i
                            class="fa-solid fa-trash"></i>
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