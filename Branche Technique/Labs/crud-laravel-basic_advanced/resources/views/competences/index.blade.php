
@extends('layouts.app')
@section('title', 'Show all Competences')

@section('content')
    
<main class="content-wrapper pt-5">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Gestion des Compétences</h2>
                    
                    <div class="card-tools mb-2">
                        <a href="{{ route("competences.create")}}" class="btn btn-primary"><i class="fas fa-plus"></i> Ajouter</a>
                    </div>
                    {{-- <input type="text" id="search-input" class="form-control" placeholder="Search Competences"> --}}
                    <div class="form-group has-feedback">
                        <input type="text" id="search-input" class="form-control" placeholder="Search Competences">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                    
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if (session('danger'))
                    <div class="alert alert-danger text-center">
                        {{ session('danger') }}
                    </div>
                @endif
                
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th >Référence</th>
                                <th >Code</th>
                                <th>Nom</th>
                                <th>Description</th>
                                <th >Actions</th>
                            </tr>
                        </thead>
                        <tbody id="search-result">

                            @foreach ($competences as $competence)                                    
                                <tr>
                                    <td>{{$competence->Reference}}</td>
                                    <td>{{$competence->Code}}</td>
                                    <td>{{$competence->Name}}</td>
                                    <td>{{$competence->Description}}</td>

                                    <td class="d-md-flex gap-5 text-center justify-content-center">
                                        <a href="{{ route('competences.edit', ['id' => $competence->id])}}" class="btn btn-primary"><i class="fas fa-edit"></i> </a>
                                        <button onclick="setIdCompetences({{$competence->id}});" class="btn btn-danger text-center ml-1" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-trash"></i> </button>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- en skills -->
                        </tbody>
                    </table>
                    <div id="pagination-links" class="mt-3 d-flex justify-content-center">
                        {{ $competences->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Modal Delete Competences --}}
    <x-modal-delete /> 
</main>


        <script>
            function setIdCompetences(id) {
                document.getElementById("id").value = id;
            }
        </script>

        <script type="module">
            $(document).ready(function () {
                $('#search-input').on('keyup', function () {
                    var searchInput = $('#search-input').val();

                    $.ajax({
                        type: 'POST', // Send a POST request
                        url: '/search-competences',
                        data: {
                            search: searchInput,
                            _token: '{{ csrf_token() }}',
                        },
                        success: function (response) {
                            $('#search-result').empty();
                            console.log(response.data);
                            response.data.forEach(function (competence) {
                                var competenceId = competence.id;

                                var editLinkHref = editLink(competenceId);

                                var rowHtml = `
                                    <tr>
                                        <td>${competence.Reference}</td>
                                        <td>${competence.Code}</td>
                                        <td>${competence.Name}</td>
                                        <td>${competence.Description}</td>
                                        <td class="d-md-flex gap-5 text-center justify-content-center">
                                            <a href="${editLinkHref}" class="btn btn-primary"><i class="fas fa-edit"></i> </a>
                                            <button onclick="setIdCompetences(${competence.id});" class="btn btn-danger text-center ml-1" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-trash"></i> </button>
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

            function editLink(competenceId) {
                return `{{ route('competences.edit', ['id' => ':value']) }}`.replace(':value', competenceId);
            }
        </script>


@endsection

