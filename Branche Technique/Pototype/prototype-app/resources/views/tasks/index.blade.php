@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('words.Tasks_of') }} {{ $project ? $project->name : '' }} </h1>
                </div>
                @role('project-leader')
                    <div class="col-sm-6">
                        <div class="float-sm-right">
                            <a href="{{ route('tasks.create', $project->id) }}" class="btn btn-secondary"
                                class="btn btnAdd">{{ __('words.add_task') }}</a>
                        </div>
                    </div>
                @endrole
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('success') }}.
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header col-md-12">
                            <div class="d-flex justify-content-between">

                                <div class="dropdown input-group">
                                    <label class="input-group-text" for="projectsFilter">
                                        <i class="fa-solid fa-filter" class="input-group-text text-dark"></i>
                                    </label>
                                    <button class="btn btn-sm mr-3 dropdown-toggle btnAddSelect input-group-text" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        {{ $project->name }}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @foreach ($projects as $project)
                                            <a class="dropdown-item project-link" href="{{route('tasks.index', ['id' => $project->id])}}"
                                                data-id="{{ $project->id }}">{{ $project->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- search -->
                                <div class="input-group input-group col-md-3 p-0">
                                    <input type="hidden" name="project_id" id="project_id" value="{{ $project->id }}">
                                    <input type="text" class="form-control" placeholder="Recherche" aria-label="Recherche"
                                    aria-describedby="basic-addon1" id="search-input">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="card-body table-responsive p-0 table-tasks">
                            @include('tasks.table')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="/JS/tasks.js"></script>
    <script>
        // $(document).ready(function() {

        //     let id;

        //     function fetch_data(page, search, id) {
        //         $.ajax({
        //             url: "/projects/" + id + "/tasks?page=" + page + '&searchTask=' + search,
        //             success: function(data) {
        //                 console.log(data)
        //                 $('tbody').html('');
        //                 $('tbody').html(data);
        //             }
        //         });
        //     }

        //     $('body').on('click', '.pagination a', function(param) {
        //         param.preventDefault();

        //         var page = $(this).attr('href').split('page=')[1];
        //         var search = $('#searchTask').val();

        //         fetch_data(page, search, id);
        //     });

        //     $('body').on('keyup', '#searchTask', function() {
        //         var searchValue = $('#searchTask').val();
        //         var page = 1;
        //         var id = $('#project_id').val();


        //         fetch_data(page, searchValue, id);
        //     });

        //     $('.project-link').on('click', function(e) {
        //         e.preventDefault();

        //         var projectId = $(this).data('id');

        //         history.pushState(null, '', '/projects/' + projectId + '/tasks');

        //         $.ajax({
        //             type: 'GET',
        //             url: '/projects/' + projectId + '/tasks',
        //             success: function(data) {
        //                 $('.tasks-container').html(data);
        //             },
        //             error: function(error) {
        //                 console.log(error);
        //             }
        //         });
        //     });

        //     // fetch_data(1, '', id);
        // });
    </script>
@endsection
