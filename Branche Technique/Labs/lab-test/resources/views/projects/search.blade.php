@foreach ($projects as $project)
    <tr>
        <th>{{ $project->nom }}</th>
        <td>{{ $project->description }}</td>
        <td class="d-md-flex">
            <a href="{{ route('projects.show', ['project' => $project->id]) }}" class="btn btn-primary me-2">Afficher les tâches</a>

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


