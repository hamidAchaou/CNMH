@if ($projects->isEmpty())
    <tr>
        <td colspan="3" align="center">Aucune Projet à afficher</td>
    </tr>
@else
    @foreach ($projects as $project)
        <tr>
            <th>{{ $project->nom }}</th>
            <td>{{ $project->description }}</td>
            <td class="d-md-flex justify-content-center">
                <form action="{{ route('tasks.index') }}" method="GET" class="mt-3">
                    <input type="hidden" name="id" value="{{ $project->id }}">
                    <button type="submit" class="btn btn-info me-2">
                        <i class="fas fa-tasks ms-1"></i> les tâches
                    </button>

                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-secondary">
                        <i class="fas fa-edit me-1"></i>
                    </a>
                    <button type="button" class="btn btn-danger" onclick="deleteProject({{ $project->id }})"
                        data-bs-toggle="modal" data-bs-target="#modaldeleteProjects">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </td>

        </tr>
    @endforeach

    <tr>
        <td></td>
        <td></td>
        <td colspan="3" align="center">
            <div class="d-flex justify-content-center mt-3">
                {!! $projects->links() !!}
            </div>
        </td>
    </tr>
    <!-- Modal -->
    <x-modal-delete-projects />
@endif
