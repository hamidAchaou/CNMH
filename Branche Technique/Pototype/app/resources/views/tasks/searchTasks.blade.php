{{-- get all Tasks --}}
@foreach ($tasks as $task)
    <tr>
        <td>{{ $task->name }}</td>
        <td>
            {{ $task->description }}
        </td>
        <td>
                <a href="{{ route('tasks.edit', [ 'project' => $project->id, 'task' => $task->id]) }}" class="btn btn-default">
                     <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <button type="button" class="btn btn-danger"
                    onclick="deletTasks({{ $task->id }}, {{ $project->id }})"
                    data-toggle="modal" data-target="#modalDeleteTask"><i class="fa-solid fa-trash"></i>
                </button>
        </td>
    </tr>
@endforeach
<tr>
    <td>
        {{-- <div class="d-flex align-items-center">
            @can('create', App\Models\Member::class)
                <form action="{{ route('tasks.import') }}" method="post"
                    enctype="multipart/form-data" id="importForm">
                    @csrf
                    <label for="upload" class="btn btn-default  mb-0 font-weight-normal">
                        <i class="fa-solid fa-file-arrow-down"></i>
                        {{ __('words.import') }}
                    </label>
                    <input type="file" id="upload" name="file" style="display:none;" />
                </form>
            @endcan
            <a href="{{ route('tasks.export') }}" class="btn  btn-default  mt-0 mx-2">
                <i class="fa-solid fa-file-export"></i>
                {{ __('words.export') }}
            </a>
        </div> --}}
    </td>
    <td></td>
    <td colspan="3" class="d-flex flex-row-reverse bd-highlight">
        {!! $tasks->links() !!}
    </td>
</tr>