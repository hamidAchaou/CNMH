@foreach ($tasks as $task)
    <tr>
        <th>{{ $task->nom }}</th>
        <td>{{ $task->description }}</td>
        <td>{{ $task->project->nom }}</td>
        @can('show-TasksController')
            <td class="d-md-flex">
                @can('edit-TasksController')
                    <a href="{{ route('tasks.edit', ['id' => $task->id]) }}" class="btn btn-success me-2">
                        <i class="fas fa-edit me-1"></i>
                    </a>
                @endcan
                @can('destroy-TasksController')
                    <button type="button" class="btn btn-danger" onclick="deleteTask({{ $task->id }})" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="fas fa-trash-alt me-1"></i>
                    </button>
                @endcan
            </td>
            @endcan

    </tr>
@endforeach

<tr>
    <td></td>
    <td></td>
    <td colspan="3" align="center">
        <div class="d-flex justify-content-center mt-3">
            {!! $tasks->links() !!}
        </div>
    </td>
</tr>
<!-- Modal DELETE TASKS-->
<x-modal-delete-tasks />
