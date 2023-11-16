@extends('layouts.master')

@section('title', 'HomePage')

@section('content')
    <div class="">
        <div class="content-header">
            <div class="container-fluid">
                <div class="mt-4 container row justify-content-between">
                    <div class="form-group col-md-4">
                        <h4 class="container">Les Projects</h4>
                    </div>
                    <div class="w-25 d-flex flex-row-reverse form-group col-md-4">
                        <a href="{{ route('projects.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nouveau
                            Project</a>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible pt-3">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i>
                                    {{ session('success')}}
                                </h5>
                            </div>
                            <div>
                                <select class="custom-select">
                                    @foreach ($projects as $project)
                                        <option value="" selected>{{ $project->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                                
                            @endif
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
                                            <th>Nom de projet</th>
                                            <th>Description</th>
                                            <th>Tache</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">

                                        {{-- get data Projects --}}
                                        @forelse ($projects as $project)
                                            <tr>
                                                <td>{{ $project->name }}</td>
                                                <td>{{  $project->description}}</td>
                                                <td class="text-center">
                                                    <a href="{{route('projects.show', ['id' => $project->id])}}" class="btn btn-default text-center">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                </td>
                                                <td class="d-md-flex">
                                                    <!-- btn edit  -->
                                                    <a href="{{route('projects.edit', ['id' => $project->id ])}}" type="submit" class="btn btn-default mr-2">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <!-- btn delete  -->
                                                    <button type="submit" class="btn btn-default mr-2">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td>
                                                    NOT projects for display
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="card-footer ">
                                <div class="d-flex flex-row-reverse">

                                  {{ $projects->links()}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
