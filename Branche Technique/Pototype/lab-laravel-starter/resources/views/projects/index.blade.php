@extends('layouts.app')

@section('content')
    <div class="" style="min-height: 1302.4px;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="mt-4 container row justify-content-between">
                    <div class="form-group col-md-4">
                        <h4 class="container">Les Member</h4>
                    </div>

                    <div class="w-25 d-flex flex-row-reverse form-group col-md-4">
                        <a href="create.html" class="btn btn-primary"><i class="fas fa-plus"></i> Nouveau Member</a>
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
                                            <th>Nom de projet</th>
                                            <th>Description</th>
                                            <th>Date de debut</th>
                                            <th>Date de fin</th>
                                            <th>Task de projet</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">

                                        <tr>
                                            <td>maquitage de cnmh</td>
                                            <td>Devlopper maquitage de gestion Project et member</td>
                                            <td>2023-10-12</td>
                                            <td>2023-10-16</td>
                                            <td class="text-center">
                                                <a href="./tasks/tasks.html" class="btn btn-default text-center">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            </td>
                                            <td class="d-md-flex">
                                                <!-- btn edit  -->
                                                <a href="edit.html" type="submit" class="btn btn-default mr-2">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <!-- btn delete  -->
                                                <button type="submit" class="btn btn-default mr-2">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Prototype de cnmh</td>
                                            <td>Devlopper application de gestion Project et member</td>
                                            <td>2023-10-12</td>
                                            <td>2023-10-16</td>
                                            <td class="text-center">
                                                <a href="./tasks/tasks.html" class="btn btn-default">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            </td>
                                            <td class="d-md-flex">
                                                <!-- btn edit  -->
                                                <a href="edit.html" type="submit" class="btn btn-default mr-2">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <!-- btn delete  -->
                                                <button type="submit" class="btn btn-default mr-2">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>

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

    {{-- script import Project --}}

    <script>
        document.getElementById('upload').addEventListener('change', function() {
            document.getElementById('importForm').submit();
        });
    </script>

    {{-- link ajax --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            function fetchData(page, searchValue) {
                $.ajax({
                    url: 'projects/?page=' + page + '&searchValue=' + searchValue,
                    success: function(data) {
                        $('tbody').html("");
                        $('tbody').html(data);
                        console.log(data)
                    }
                })
            }

            $('body').on('keyup', '#inputSearch', function() {
                let page = $('#pageNumber').val();
                let searchValue = $('#inputSearch').val();
                fetchData(page, searchValue);
            });

            $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                let searchValue = $('#inputSearch').val();
                fetchData(page, searchValue);
            })
        });
    </script>

    {{-- modal Delete Projects --}}
    @component('component.modal-delete-projects')
    @endcomponent
@endsection
