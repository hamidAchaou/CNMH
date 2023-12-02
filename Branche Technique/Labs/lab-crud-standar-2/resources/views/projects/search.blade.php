@foreach ($projects as $project)
    <tr>
        <th>{{ $project->nom }}</th>
        <td>{{ $project->description }}</td>
        <td class="d-md-flex">
            <a href="{{ route('projects.show', ['project' => $project->id]) }}" class="btn btn-secondary me-2">
                <i class="fas fa-tasks ms-1"></i> les tâches
            </a>
            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-success me-2">     
               <i class="fas fa-edit me-1"></i> 
            </a>
            <button type="button" class="btn btn-danger" onclick="delteProjet({{ $project->id }})" data-bs-toggle="modal" data-bs-target="#modaldeleteProjects">
                <i class="fas fa-trash-alt me-1"></i> 
            </button>
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