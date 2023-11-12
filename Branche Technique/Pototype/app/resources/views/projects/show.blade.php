@extends('layouts.app')

@section('title', 'HomePage')

@section('content')
    <div class="content container">
        <div class="content pt-4 container">
            @if (session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif
            <div class="mt-4 container row justify-content-around">
                <div class="form-group col-md-4">
                    <h4 class="container font-weight-bold">{{ $project->name }}</h4>
                </div>

                <div class="input-group form-group col-md-4">
                    <input type="text" id="search-input" class="form-control" placeholder="Rechercher">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                </div>

                <div class="w-25 d-flex flex-row-reverse form-group col-md-4">
                    <a href="{{ route('create.task', ['id' => $project->id]) }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> Nouveau Task
                    </a>
                </div>


            </div>
        </div>

        <div class="card container py-3">
            <!-- Your content goes here -->

            <table id="example2" class="table table-bordered table-hover mt-2">
                <thead>
                    <tr>
                        <th>Titre de Task</th>
                        <th>Description</th>
                        @can('view', $project)
                          <th>Action</th>
                        @endcan
                    </tr>
                </thead>
                @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    @can('view', $project)
                    <td>
                        <div class="d-flex">
                            <!-- Edit Button -->
                            <a href="{{ route('tasks.edit', ['id' => $task->id]) }}" class="btn btn-primary mr-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
            
                            {{-- btn delete Tasks --}}
                            <button type="button" class="btn btn-sm btn-default bg-danger" onclick="AddIdTasks({{$project->id}})" data-toggle="modal" data-target="#modalDeleteTask"><i
                                class="fa-solid fa-trash"></i>
                            </button>
                            <style>
                                .btn-danger:hover {
                                    color: #fff !important;
                                }
                            </style>
                        </div>
                    </td>
                    @endcan
                </tr>
            @endforeach
            

                </tbody>
            </table>

            <!-- Pagination Links -->
            <div class="d-md-flex justify-content-between">
                <!-- Export and Import -->
                <!-- export and import  -->
                <div class="">
                    <div class="d-flex">
                        <form action="" method="post">

                            <button type="submit" class="btn"><i class="fa-solid fa-download"></i>Exporter</button>
                        </form>

                        <form class="ml-1" action="" method="post" id="importForm" enctype="multipart/form-data">

                            <input type="file" id="fileInputImporter" name="file" style="display: none;">
                            <button type="button" class="btn" id="chooseFileButtonImporter"><i
                                    class="fa-solid fa-file-export"></i> Importer</button>
                        </form>

                    </div>
                </div>
                <!-- Pagination Links -->
                <div class="d-flex justify-content-center mb-4" id="pagination-links">
                    {{ $tasks->links() }}
                </div>


            </div>
        </div>
    </div>

        {{-- modal Delete Tasks --}}
        @component('components.projects.modal-delete-task')
        @endcomponent
@endsection
