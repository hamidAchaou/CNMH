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
                                        <th>{{ __('words.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
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
@endsection
