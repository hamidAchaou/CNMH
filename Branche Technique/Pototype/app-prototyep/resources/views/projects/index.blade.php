@extends('layouts.app')

@section('title', 'HomePage')
    
@section('content')
<section class="content">
    <div class="container-fluid">
        @auth
            <a href="{{ route('projects.create')}}" type="button"  class="btn btn-success mb-3" >
                <i class="fas fa-plus"></i> Add Project
            </a>
            @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
            @endif

            @if (session('danger'))
            <div class="alert alert-danger text-center">
                {{ session('danger') }}
            </div>
            @endif
        @endauth
        <div class="row g-4">
            @foreach ($projects as $project)
            {{-- card Project --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $project->name }}</h3><br>
                        <h6 class="card-title">{{ $project->startDate }} _ {{ $project->endDate }}</h6>
                        <div class="card-tools">
                            <div class="tools">
                                <i class="fas fa-eye" onclick="showTsk({{ $project }})" data-bs-toggle="modal" data-bs-target="#showProject"></i> 
                                  @auth
                                    <a href="{{ route('projects.edit', ['project' => $project])}}">
                                        <i class="fas fa-edit text-primary"></i> 
                                    </a>
                                    <i class="fas fa-trash" onclick="AddIdProject({{ $project->id}})" data-bs-toggle="modal" data-bs-target="#modal-projectDelete"></i>
                                  @endauth
                                </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="todo-list" data-widget="todo-list">
                            {{-- start Tasks --}}
                            @foreach ($project->tasks as $task)
                            
                            <li class="mb-2 @if ($task->status == 'done') done opacity-75 @endif">
                                <span class="handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                {{-- checkbox Tasks --}}
                                @auth
                                    <div class="icheck-primary d-inline ml-2">
                                        <input type="checkbox" value="" name="status" id="todoCheck{{ $task->id}}" data-task-id="{{ $task->id }}" @if ($task->status == 'done') checked @endif>
                                        <label for="todoCheck{{ $task->id}}"></label>
                                    </div>
                                @endauth
                    
                                <span class="text">{{ $task->title }}</span>
                                {{-- <small class="badge badge-primary"><i class="far fa-clock"></i> 2min</small> --}}
                                <div class="tools">
                                    <i class="fas fa-eye" onclick="showTsk({{ $task }})" data-bs-toggle="modal" data-bs-target="#showProject"></i> 
                                      @auth
                                        <a href="{{ route('tasks.edit', ['id' => $task->id])}}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {{-- btn modal delete task --}}
                                        <i class="fas fa-trash" onclick="AddIdTask({{ $task->id}})" data-bs-toggle="modal" data-bs-target="#modalDeleteTask"></i>
                                      @endauth
                                    </div>
                            </li>
                            <!-- Add more to-do items as needed -->
                            @endforeach
                            {{-- end task --}}
                            {{-- btn add Task --}}
                            @auth
                                <li class="mb-2" onclick="addIdProject({{ $project->id }})" data-bs-toggle="modal" data-bs-target="#modalAddTask">
                                    <div class="icheck-primary d-inline ml-2  d-flex justify-content-center" >
                                        <i class="fas fa-plus" data-bs-toggle="modal" data-bs-target="#modalAddTask"></i>
                                    </div>                                    
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
  
<!-- Modal show Project-->
<x-modal-showProject />
<!-- Modal Add Task-->
<x-modalAddTask />
<!-- Modal Edit Task-->
<x-modal-EditTask />
{{-- modal delete --}}
<x-modal-deleteTask />
{{-- modal delete Project--}}
<x-modal-deleteProject />

{{-- <script src="{{asset("plugins/summernote/summernote-bs4.min.js")}}"></script> --}}

<script>
    function addIdProject(id) {
        document.getElementById('project_Id').value = id;
    }
</script>

<script>
    $(document).ready(function() {
        $('input[name="status"]').change(function() {
            var taskId = $(this).data('task-id');
            var status = $(this).is(':checked') ? 'done' : 'pending';
    
            $.ajax({
                url: '/tasks/' + taskId + '/status',
                type: 'post',
                data: { 
                    status: status,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log('Task status updated successfully.');
                },
                error: function(xhr, status, error) {
                    console.log('An error occurred while updating task status.');
                }
            });
        });
    });
</script>

@endsection
