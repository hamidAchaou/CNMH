@extends('layouts.app')

@section('title', 'HomePage')

@section('content')
    <section class="">
        <div class="content pt-4 container">
          @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        
          @endif
          <div class="mt-4 container row justify-content-around">
            <div class="form-group col-md-4">
                <h4 class="container font-weight-bold">{{ __('words.projects') }}</h4>
            </div>
        
            <div class="input-group form-group col-md-4">
                <input type="text" id="search-input" class="form-control" placeholder="{{ __('words.search_placeholder') }}">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                </div>
            </div>
        
            {{-- button add projects  --}}
            @can('view', new App\Models\Project)
                <div class="w-25 d-flex flex-row-reverse form-group col-md-4">
                    <a href="{{ route('projects.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> {{ __('words.new_project_button') }}</a>
                </div>
            @endcan
        </div>
        
        </div>
        <div class="content container">
            <!-- </div> -->
            <div class="content container">
                <div class="card container pt-3">
                    <div class="content container">
                        <div class="d-flex container">
                            <div class="form-group">
                                <select class="custom-select">
                                    @foreach ($projectsName as $projectName)
                                        <option value="" selected>{{ $projectName->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card-body table-responsive p-0">
                        {{-- Table Projects --}}
                        @include('projects.table')
                        </div>

                        <div class="card-footer">
                            <div class="d-md-flex justify-content-between">                                
                                <!-- export and import  -->
                                <div class="card-header ">
                                    <div class="d-flex">
                                        <form action="" method="post">
                                            <button type="submit" class="btn"><i class="fa-solid fa-download"></i>{{ __('words.export') }}</button>
                                        </form>
                                
                                        <form class="ml-1" action="" method="post" id="importForm" enctype="multipart/form-data">
                                            <input type="file" id="fileInputImporter" name="file" style="display: none;">
                                            <button type="button" class="btn" id="chooseFileButtonImporter"><i class="fa-solid fa-file-export"></i>{{ __('words.import') }}</button>
                                        </form>
                                    </div>
                                </div>
                                
    
                                <!-- Pagination Links -->
                                <div class="d-flex justify-content-center mb-4" id="pagination-links">
                                  {{ $projects->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>

    {{-- modal Delete Projects --}}
    @component('components.projects.modal-delete-project')
    @endcomponent

    {{-- script project search --}}
    <script type="module">
        $(document).ready(function () {
            $('#search-input').on('keyup', function () {
                var searchInput = $('#search-input').val();

                $.ajax({
                    type: 'POST', // Send a POST request
                    url: '/search-projects',
                    data: {
                        search: searchInput,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function (response) {
                        $('#search-result').empty();
                        console.log(response.data);
                        response.data.forEach(function (project) {
                            var projectId = project.id;

                            var editLinkHref = editLink(projectId);

                            var rowHtml = `
                                <tr>
                                    <td>${project.name}</td>
                                    <td>${project.description}</td>
                                    <td>${project.startDate}</td>
                                    <td>${project.endDate}</td>
                                    <td class="d-md-flex gap-5 text-center justify-content-center">
                                        <a href="${editLinkHref}" class="btn btn-primary"><i class="fas fa-edit"></i> </a>
                                        <button onclick="setIdprojects(${project.id});" class="btn btn-danger text-center ml-1" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-trash"></i> </button>
                                    </td>
                                </tr>
                            `;
                            $('#search-result').append(rowHtml);
                        });
                        $('#pagination-links').html(response.links);
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX error:', error);
                    }
                });
            });
        });

    </script>


@endsection
