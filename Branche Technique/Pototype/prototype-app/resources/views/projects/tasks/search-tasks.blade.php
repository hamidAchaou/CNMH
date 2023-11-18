{{-- get all Tasks --}}
@foreach ($project->task as $task)
    <tr>
        <td>{{ $task->name }}</td>
        <td>
            {{ $task->description }}
        </td>
        <td>
            @can('update', App\Models\Member::class)
                {{-- btn edit --}}
                <a href="{{ route('tasks.edit', ['id' => $task->id, 'project_Id' => $project->id]) }}"
                    class="btn btn-default"><i class="fa-solid fa-pen-to-square"></i>
                </a>
            @endcan

            {{-- btn delete --}}
            @can('delete', App\Models\Member::class)
                <button type="button" class="btn btn-default"
                    onclick="deleetProject({{ $task->id }}, {{ $project->id }})"
                    data-toggle="modal" data-target="#dalete-tasks-modal"><i class="fa-solid fa-trash"></i>
                </button>
            @endcan
        </td>

    </tr>
@endforeach
