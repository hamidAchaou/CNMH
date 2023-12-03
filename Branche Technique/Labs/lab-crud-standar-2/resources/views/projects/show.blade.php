@extends('layouts.master')
@include('layouts.nav')

@section('content')
{{-- @dd(request()->get('id')) --}}

    <div class="container py-4">
        <div class="d-flex justify-content-between my-3">
            <h2 class="text-secondary">Les Tâches</h2>
            {{-- btn add tasks --}}
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nouvelle Tâche
            </a>
        </div>
        {{-- message Flashbag --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                {{-- filter --}}
                <div>
                    <div class="input-group">
                        <label class="input-group-text" for="projectsFilter"><i class="fas fa-filter"></i></label>
                        <select class="form-select form-control" id="projectsFilter" aria-label="Filter Select">
                            @foreach ($projects as $Project)
                            <option value="{{ $Project->id }}" {{ $Project->id == $project->id ? 'selected' : '' }}>
                                {{ $Project->nom }}
                            </option>
                            
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="input-group w-25">
                    <input type="text" class="form-control" placeholder="Recherche" aria-label="Recherche"
                        aria-describedby="basic-addon1" id="search-input">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                </div>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="search-result">
                        @include('tasks.search')
                    </tbody>
                    <input type="hidden" id='page' value="1">
                </table>
            </div>
        </div>
    </div>

    {{-- script search by ajax --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="{{ asset('JS/tasks.js') }}"></script> --}}

    <script>
        $(document).ready(function() {
    function fetchData(page, searchValue) {
        $.ajax({
            url: 'projects/?page=' + page + '&searchValue=' + searchValue,
            success: function(data) {
                $('tbody').html('');
                $('tbody').html(data);
            }
        });
    }

    // filter By Projects
    function filterData(page, criteria) {
        $.ajax({
            url: 'tasks/?page=' + page + '&criteria=' + criteria,
            success: function(data) {
                $('tbody').html('');
                $('tbody').html(data);
            }
        });
    }

    $('body').on('click', '.pagination a', function(param) {

        param.preventDefault();

        var page = $(this).attr('href').split('page=')[1];
        var searchValue = $('#search-input').val();
        console.log($(this).attr('href').split('page=')[1]);
        console.log($(this).attr('href').split('page='));

        fetchData(page, searchValue);

    });

    $('body').on('keyup', '#search-input', function() {
        var page = 1;
        var searchValue = $('#search-input').val();
        fetchData(page, searchValue);
    });

    $('#projectsFilter').on('change', function () {
        var page = 1;
        var criteria = $(this).val();
        console.log(criteria);
        filterData(page, criteria);
      });

    fetchData(1, '');
});

// function delete tasks
function delteTask(Task_id) {
    document.getElementById('Task_id').value = Task_id;
    document.getElementById('deleteForm').action = "tasks/" + Task_id;
}


    </script>
@endsection
