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
                    {{-- @can('view') --}}
                    <div class="w-25 d-flex flex-row-reverse form-group col-md-4">
                        <a href="{{ route('tasks.create', ['id' => $project->id]) }}" class="btn btn-primary"><i
                                class="fas fa-plus"></i>{{ __('words.new_task') }}</a>
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
                            <div class="card-header d-flex justify-content-between w-100">
                                {{-- filter --}}
                                <div>
                                    <div class="input-group">
                                        <label class="input-group-text" for="projectsFilter">
                                            <i class="fas fa-filter"></i>
                                        </label>
                                        <select class="form-select form-control" id="projectsFilter"
                                            aria-label="Filter Select">
                                            @foreach ($projects as $Project)
                                                <option value="{{ $Project->id }}"
                                                    {{ $Project->id == $project->id ? 'selected' : '' }}>
                                                    {{ $Project->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- <div> --}}
                                <div class="">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Recherche"
                                            aria-label="Recherche" aria-describedby="basic-addon1" id="search-input">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fas fa-search"></i></span>
                                    </div>
                                </div>
                                {{-- </div> --}}
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            {{-- table tasks --}}
                            <table class="table table-striped text-nowrap">
                                <thead>
                                    <tr>
                                        <th>{{ __('words.task_title') }}</th>
                                        <th>{{ __('words.description') }}</th>
                                        {{-- @can('view', App\Models\Member::class) --}}
                                        <th>{{ __('words.action') }}</th>
                                        {{-- @endcan --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- get all Tasks --}}
                                    @include('tasks.searchTasks')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>

    {{-- modal Delete Tasks --}}
    <x-modal-delete-tasks />

    {{-- script search by ajax --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('JS/tasks.js') }}"></script>
@endsection
