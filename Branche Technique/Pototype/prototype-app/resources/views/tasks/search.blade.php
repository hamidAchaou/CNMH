@forelse ($tasks as $index => $task)
<tr>
    <td>
        {{$task->name}}
    </td>
    <td>
        {{ $project->description }}
    </td>
    <td>
        {{$task->start_date}}
    </td>
    <td>
        {{$task->end_date}}
    </td>
    @role('project-leader')
    <td>
        <a href="{{ route('tasks.edit', ['id' => $task->project_id, 'task' => $task->id]) }}"
            class="btn btn-sm btn-default">
            <i class="fas fa-edit"></i>
        </a>        
        <form method="POST" action="{{ route('tasks.destroy', ['id' => $task->project_id, 'task' => $task->id]) }}" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i
                    class="fas fa-trash"></i></button>
        </form>
        <input type="hidden" id="id_project" value="{{ $task->project_id }}" />
    </td>
    @endrole
</tr>
@empty
<tr>
    <td colspan="6">Tasks not found

    </td>
</tr>
@endforelse
<tr>
    @role('project-leader')
    <td>
        <div class="d-flex justify-content-between align-items-center p-2">
            <div class="d-flex align-items-center">
                <form action="{{ route('tasks.import') }}" method="post" enctype="multipart/form-data" id="importForm">
                    @csrf
                    <label for="upload" class="btn btn-default btn-sm mb-0 font-weight-normal">
                        <i class="fa-solid fa-download"></i>
                        {{ __('words.import') }}
                    </label>
                    <input type="file" id="upload" name="file" style="display:none;" onchange="submitForm()" />
                </form>
                <a href="{{ route('tasks.export') }}" class="btn  btn-default btn-sm mt-0 mx-2">
                    <i class="fa-solid fa-file-export"></i>
                    {{ __('words.export') }}
                </a>
            </div>

        </div>
    </td>
    <td></td>
    <td></td>
    <td></td>
    @endrole
    <td class="taskPaginate">
        {{$tasks->links()}}
    </td>

</tr>