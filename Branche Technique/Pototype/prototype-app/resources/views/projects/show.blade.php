@extends('layouts.app')

@section('content')
    <div class="" style="min-height: 1302.4px;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="mt-4 container row justify-content-between">
                    <div class="form-group col-md-4">
                        <h4 class="container">{{ $project->name }}</h4>
                        <input type="hidden" id="projectId" value="{{ $project->id }}">
                    </div>
                    {{-- neveau Task --}}
                    @can('view', new App\Models\Member())
                        <div class="w-25 d-flex flex-row-reverse form-group col-md-4">
                            <a href="{{ route('tasks.create', ['id' => $project->id]) }}" class="btn btn-primary"><i
                                    class="fas fa-plus"></i>{{ __('words.new_task') }}</a>
                        </div>
                    @endcan
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
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {{ session('error') }}.
                                </div>
                            @endif
                        </div>
                        <div class="card">
                            <div class="card-header col-md-12 d-flex justify-content-between">
                                <div class="container">
                                    <select id="projectFilter" class="custom-select">
                                        <option value="">All Projects</option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- search --}}
                                <div class="input-group input-group-sm  col-md-3 p-0">
                                    <input type="hidden" value="1" id="pageNumber">
                                    <input type="text" id="inputSearch-tasks" class="form-control float-right"
                                        placeholder="{{ __('words.search_placeholder') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                {{-- </div> --}}
                            </div>

                            <div class="card-body table-responsive p-0">
                                {{-- table tasks --}}
                                <table class="table table-striped text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>{{ __('words.task_title') }}</th>
                                            <th>{{ __('words.description') }}</th>
                                            @can('view', App\Models\Member::class)
                                                <th>{{ __('words.action') }}</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- get all Tasks --}}
                                        @include('projects.tasks.search-tasks')
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    {{-- Script Search --}}
    <script>
        $(document).ready(function() {

            function fetchData(page, searchValue) {
                let projectId = $('#projectId').val();
                $.ajax({
                    url: '/projects/' + projectId + '/show?page=' + page + '&searchValue=' + searchValue,
                    success: function(data) {
                        $('tbody').html("");
                        $('tbody').html(data);
                    }
                });
            }

            $('body').on('keyup', '#inputSearch-tasks', function() {
                let page = $('#pageNumber').val();
                let searchValue = $('#inputSearch-tasks').val();
                fetchData(page, searchValue);
            });
        });

        // script filter
        $(document).ready(function() {
            $('#projectFilter').on('change', function() {
                let project = $(this).val();
                $.ajax({
                    url: "{{ route('tasks.index') }}",
                    type: "GET",
                    data: {
                        'project': project
                    },
                    // success:function (data){
                    //     let tasks = data.tasks;
                    //     $('tbody').html("");
                    //     $('tbody').html(data);

                    //     console.log(tasks)

                    // }
                    success: function(response) {
                        if (response && response.tasks && response.tasks.data && Array.isArray(
                                response.tasks.data)) {
                            // Clear existing tbody content
                            $('tbody').html("");

                            response.tasks.data.forEach(function(task) {
                                var row = `
                <tr>
                    <td>${task.name}</td>
                    <td>${task.description}</td>
                    <td>
                        <!-- Your edit and delete buttons here -->
                        <button class="btn btn-default" data-task-id="${task.id}">
                            Edit
                        </button>
                        <button class="btn btn-danger" data-task-id="${task.id}">
                            Delete
                        </button>
                    </td>
                </tr>
                
            `;
                                // Append the new row to the tbody
                                $('tbody').append(row);
                            });
                        } else {
                            console.error('Invalid data structure:', response);
                        }
                    },
                })
            })
        });
    </script>


    {{-- <script type="text/javascript">
    $(document).ready(function() {
        function getData(page, filterValue) {
            let projectId = $('#projectFilter').val();
            $.ajax({
                url: '/projects/' + projectId + '/show?page=' + page + '&filterValue=' + filterValue,
                success: function(data) {
                    $('tbody').html("");
                    $('tbody').html(data);
                    console.log(data)
                }
            })
        }

        $('body').on('change', '#projectFilter', function() {
                let page = 1;
                let filterValue = $('#projectFilter').val();
                getData(page, filterValue);
            });
        });

        // $('#projectFilter').change(function() {
        //     var projectId = $(this).val();
        //     $.ajax({
        //         url: '/tasks/filter',
        //         type: 'GET',
        //         data: {
        //             projectId: projectId
        //         },
        //         success: function(response) {
        //             $('#tasksList').html(response);
        //         },
        //         error: function(xhr) {
        //             console.log(xhr.responseText);
        //             // Handle error here
        //         }
        //     });
        // });
</script> --}}



    {{-- modal Delete Tasks --}}
    @component('component.modal-delete-tasks')
    @endcomponent
@endsection
