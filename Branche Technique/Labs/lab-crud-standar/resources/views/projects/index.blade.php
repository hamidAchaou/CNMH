@extends('layouts.master')

@section('title', 'HomePage')

@section('content')
    <div class="">
        <div class="content-header">
            <div class="container-fluid">
                <div class="mt-4 container d-flex justify-content-between">
                    <div class="form-group col-md-4">
                        <h4 class="container">Les Projects</h4>
                    </div>
                    <div class="d-flex flex-row-reverse form-group col-md-4">
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
                        <div class="">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible pt-3">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h5><i class="icon fas fa-check"></i>
                                        {{ session('success')}}
                                    </h5>
                                </div>
                            @endif
                        </div>
                        <div class="card">
                            <div class="card-header col-md-12 d-flex flex-row-reverse bd-highlight">
                                {{-- search --}}
                                <div class="input-group input-group  col-md-3 p-0">
                                    <input type="text" id="inputSearch" class="form-control float-right"
                                        placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
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
    {{-- SCRIPT SEARCH  --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            function fetchData(page, searchValue) {
                $.ajax({
                    url:'/?page=' + page + '&searchValue=' + searchValue, 
                    success:function(data){
                        $('tbody').html("");
                        $('tbody').html(data);
                    }
                })
            }

            $('body').on('keyup', '#inputSearch', function () {
                let page = 1;
                let searchValue = $('#inputSearch').val();
                fetchData(page, searchValue);
            });

            $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                let searchValue = $('#inputSearch').val(); // Added quotation marks around #inputSearch
                fetchData(page, searchValue);
            })

        });
    </script>

    {{-- modal Delete Projects --}}
    @component('component.modal-delete-projects')
    @endcomponent
    
@endsection
