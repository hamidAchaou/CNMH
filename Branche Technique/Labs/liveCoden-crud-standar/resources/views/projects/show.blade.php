@extends('layouts.master')

@section('title', 'Show Projects')
    
@section('content')
<div class="" style="min-height: 1302.4px;">
  <div class="content-header">
      <div class="container-fluid">
        <div class="mt-4 container row justify-content-between">
          <div class="form-group col-md-4">
            <h4 class="container">{{ $project->name}}</h4>
          </div>

          <div class="w-25 d-flex flex-row-reverse form-group col-md-4">
            <a href="{{route('tasks.create', ['id' => $project->id])}}" class="btn btn-primary"><i class="fas fa-plus"></i> Nouveau Tache</a>
          </div>
        </div>
      </div>
  </div>
  <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header col-md-12">
                          <div class=" p-0">
                              <div class="input-group input-group-sm float-sm-right col-md-3 p-0">
                                  <input type="text" name="table_search" class="form-control float-right"
                                      placeholder="Search">
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
                            @forelse ($project->task as $tasks)
                            <tr>
                              <td>{{ $tasks->title}}</td>
                              <td>
                                {{ $tasks->description}}
                              </td>
                              <td>
                                  <a href="./edit.html" class="btn btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                                  <button type="button" class="btn btn-default"><i class="fa-solid fa-trash"></i></button>
                              </td>
                              
                          </tr>
                            @empty
                                
                            @endforelse

                          </tbody>
                          </table>
                      </div>

                      <div class="card-footer ">
                        <div class="d-flex justify-content-between">
                            <div class="">
                                <button type="button" class="btn  btn-default">
                                  <i class="fa-solid fa-download"></i>
                                    IMPORT</button>
                                <button type="button" class="btn  btn-default">
                                    <i class="fa-solid fa-file-export"></i>
                                    EXPORT</button>
                            </div>
                            <div class="">
                                <ul class="pagination  m-0 ">
                                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>
@endsection