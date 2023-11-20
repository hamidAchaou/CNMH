{{-- get data Projects --}}
@foreach ($projects as $project)
    <tr>
        <td>{{ $project->name }}</td>
        <td>{{ $project->description }}</td>
        <td class="text-center">
            <a href="{{ route('projects.show', ['id' => $project->id]) }}" class="btn btn-default text-center">
                <i class="fa-solid fa-eye"></i>
            </a>
        </td>
        <td class="d-md-flex">
            <!-- btn edit  -->
            <a href="{{ route('projects.edit', ['id' => $project->id]) }}" type="submit" class="btn btn-default mr-2">
                <i class="fas fa-edit"></i>
            </a>
            <!-- btn delete  -->
            <button type="submit" class="btn btn-default mr-2" onclick="deleetProject({{ $project->id }})" data-bs-toggle="modal" data-bs-target="#delete-project">
                <i class="fas fa-trash-alt"></i>
            </button>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="3" align="center" >
        {!! $projects->links() !!}
    </td>
</tr>
