@extends('layouts.master')

@section('title', 'Show Projects')

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
                        </div>
                        <div class="card">
                            <div class="card-header col-md-12">
                                {{-- serarch --}}
                                <div class=" p-0">
                                    <div class="input-group input-group-sm float-sm-right col-md-3 p-0">
                                        <input type="text" id="inputSearch-tasks"
                                            class="form-control float-right" placeholder="Search">
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
                                            <!-- <th>Date debut</th>
                                      <th>Date fin</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- get all Tasks --}}
                                        @include('projects.tasks.search-tasks')
                                    </tbody>
                                </table>
                            </div>

                            <div class="card-footer ">
                                <div class="d-flex flex-row-reverse">

                                    {{-- {{ $project->task->links()}} --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
      $(document).ready(function () {
          function fetchData(page, searchValue) {
              let projectId = $('#projectId').val();
              console.log(projectId);
              $.ajax({
                  url: '/' + projectId + '/show?page=' + page + '&searchValue=' + searchValue,
                  success: function(data) {
                      $('tbody').html("");
                      $('tbody').html(data);
                      console.log(data);
                  }
              });
          }

          $('body').on('keyup', '#inputSearch-tasks', function() {
              let page = 1;
              let searchValue = $('#inputSearch-tasks').val();
              fetchData(page, searchValue);
          });
      });
    </script>

    {{-- modal Delete Tasks --}}
    @component('component.modal-delete-tasks')
    @endcomponent

@endsection
