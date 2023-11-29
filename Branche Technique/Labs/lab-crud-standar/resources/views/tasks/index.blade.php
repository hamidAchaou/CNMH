@extends('layouts.master')

@section('title', 'Show Tasks Projects')

@section('content')
    <div class="" style="min-height: 1302.4px;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="mt-4 container row justify-content-between">
                    <div class="form-group col-md-4">
                        <h4 class="container">{{ $project->name }}</h4>
                        <input type="hidden" id="projectId" value="{{$project->id}}">
                    </div>

                    <div class="w-25 d-flex flex-row-reverse form-group col-md-4">
                        <a href="{{ route('tasks.create', ['id' => $project->id]) }}" class="btn btn-primary"><i
                                class="fas fa-plus"></i> Nouveau Tache</a>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible pt-3">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <h5><i class="icon fas fa-check"></i>
                                        {{ session('success') }}
                                    </h5>
                                </div>
                            @endif
                            @if (session('error'))
                            <div class="alert alert-danger alert-dismissible pt-3">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h5><i class="fas fa-exclamation-circle"></i> {{ session('error') }}</h5>
                            </div>
                        @endif
                        
                        </div>
                        <div class="card">
                            <div class="card-header col-md-12">
                                <div class="d-flex justify-content-between">
                                    {{-- filter --}}
                                    <div>
                                        <select class="custom-select" id="filterSelect">
                                            {{-- <option value="">Select a project</option> --}}
                                            @foreach($projects as $project)
                                                <option value="{{ $project->id }}" {{ ($project->id == request()->id) ? 'selected' : '' }}>
                                                    {{ $project->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                            
                                    {{-- search --}}
                                    <div class="input-group input-group col-md-3 p-0">
                                        <input type="text" id="inputSearch" class="form-control float-right" placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Titrte</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tasksContainer">
                                        {{-- get all Tasks --}}
                                        @include('tasks.search')
                                    </tbody>
                                </table>
                            </div>

                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- SCRIPT SEARCH  --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="{{ asset('js/tasks.js') }}"></script>


    {{-- filter --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script>
        $(document).ready(function () {
            $('#filterSelect').change(function () {
                let projectId = $(this).val();
                console.log(projectId);
    
                // Fetch tasks for the selected project using AJAX
                $.ajax({
                    url: `/tasks?projectId=${projectId}`,
                    method: 'GET',
                    success: function(data) {
                        console.log(data);
                        // $('#tasksContainer').html(data);
                        // $('tbody').html("");
                        // $('tbody').html(data);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
    
    {{-- modal Delete Tasks --}}
    @component('component.modal-delete-tasks')
    @endcomponent

@endsection
