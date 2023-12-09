{{-- get data Projects --}}
@foreach ($projects as $project)
    <tr>
        <td>{{ $project->name }}</td>
        <td>{{ $project->description }}</td>
        <td class="d-md-flex justify-content-center">
            <a href="{{ route('projects.show', ['project' => $project->id]) }}" class="btn btn-primary text-center mr-2">
                <i class="fa-solid fa-eye"></i>
                {{ __('words.Tasks') }}
            </a>
            
            {{-- @can('edit-TasksController') --}}
            <!-- btn edit  -->
                <a href="{{ route('projects.edit', ['project' => $project->id]) }}" class="btn btn-default mr-2">
                    <i class="fas fa-edit"></i>
                </a>
            {{-- @endcan --}}
            
            {{-- @can('destroy-TasksController') --}}
            <!-- btn delete  -->
                <button type="submit" class="btn btn-danger mr-2" onclick="deletProject({{ $project->id }})" data-toggle="modal" data-target="#modalDeleteProjects">
                    <i class="fas fa-trash-alt"></i>
                </button>
            {{-- @endcan --}}
        </td>
    </tr>
@endforeach
<tr>
    <td>
        {{-- <div class="d-flex align-items-center">
            @can('create', App\Models\Member::class)
                <form action="{{ route('projects.import') }}" method="post"
                    enctype="multipart/form-data" id="importForm">
                    @csrf
                    <label for="upload" class="btn btn-default  mb-0 font-weight-normal">
                        <i class="fa-solid fa-file-arrow-down"></i>
                        {{ __('words.import') }}
                    </label>
                    <input type="file" id="upload" name="file" style="display:none;" />
                </form>
            @endcan
            <a href="{{ route('projects.export') }}" class="btn  btn-default  mt-0 mx-2">
                <i class="fa-solid fa-file-export"></i>
                {{ __('words.export') }}
            </a>
        </div> --}}
    </td>
    <td></td>
    <td colspan="3" class="d-flex flex-row-reverse bd-highlight">
        {!! $projects->links() !!}
    </td>
</tr>
