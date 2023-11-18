{{-- get data Projects --}}
@foreach ($projects as $project)
    <tr>
        <td>{{ $project->name }}</td>
        <td>{{ $project->description }}</td>
        <td class="d-md-flex">
            <a href="{{ route('projects.show', ['id' => $project->id]) }}" class="btn btn-default text-center">
                <i class="fa-solid fa-eye"></i>
            </a>
            @can('update', App\Models\Member::class)
                <!-- btn edit  -->
                <a href="{{ route('projects.edit', ['id' => $project->id]) }}" type="submit" class="btn btn-default mr-2">
                    <i class="fas fa-edit"></i>
                </a>
            @endcan
            @can('delete', App\Models\Member::class)
                <!-- btn delete  -->
                <button type="submit" class="btn btn-default mr-2" onclick="deleetProject({{ $project->id }})" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-trash-alt"></i>
                </button>
            @endcan
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="3" align="center" >
        {!! $projects->links() !!}
    </td>
</tr>
