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
                                    class="fas fa-plus"></i> Nouveau Tache</a>
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
                                <div>
                                    {{-- <select class="custom-select">
                                        @foreach ($projects as $project)
                                            <option value="" selected>{{ $project->name }}</option>
                                        @endforeach
                                    </select> --}}
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






        //   $(document).ready(function () {
        //     // get data
        //     function fetchData(page searchValue) {
        //         let projectId = $('#projectId').val();
        //         $.ajax([
        //             url: '/projects/' + projectId + '&searchValue=' + page;
        //             success: function (data) 
        //             {
        //               $('tbody').html("");
        //               $('tbody').html(data);
        //             } 
        //         ]) 
        //     }

        //     // search 
        //     $('body').on('keyup', '#inputSearch-tasks', function () {
        //         let page = $('#pageNumber').val;
        //         let searchValue = $('#inputSearch-tasks').val;

        //         fetchData(page searchValue);
        //     })
        //   })
    </script>

    {{-- modal Delete Tasks --}}
    @component('component.modal-delete-tasks')
    @endcomponent
@endsection
