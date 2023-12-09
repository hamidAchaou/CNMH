@extends('layouts.app')

@section('content')
<div class="" style="min-height: 1302.4px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="mt-4 container d-flex justify-content-between">
                <div class="form-group col-md-4">
                    <h4 class="container">Les Projects</h4>
                </div>
                {{-- create Project --}}
                {{-- @can('create-TasksController') --}}
                    <div class="d-flex flex-row-reverse form-group col-md-4">
                        <a href="{{ route('projects.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
                            Neveau Projects</a>
                    </div>
                {{-- @endcan --}}
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
                        <div class="card-header col-md-12">
                            <div class=" p-0">
                                {{-- Search --}}
                                <div class="input-group input-group-sm float-sm-right col-md-3 p-0">
                                    <input type="text" name="search-input" id="search-input" class="form-control float-right"
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
                            {{-- Table Projects --}}
                            <table class="table table-striped text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Nom de projet</th>
                                        <th>Description</th>
                                        <th class="d-flex justify-content-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    @include('projects.search')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

    {{-- modal Delete Projects --}}
    <x-modal_delete_projects />

    {{-- script search by ajax --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('JS/projects.js') }}"></script>
@endsection
