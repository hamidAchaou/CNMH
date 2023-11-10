@extends('layouts.app')

@section('title', 'HomePage')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="p-4">
                <h2>Projet de cnmh</h2>
            </div>

            <div class="card container py-3">
                <!-- <h5><span class="text-bold">Name de Projet: </span>Projet de cnmh</h5> -->
                <div class="d-flex container">
                    <div class="form-group">
                        <select class="custom-select">
                            <option value="" selected>Choisir le titre</option>
                            <option value="{{ $projet->nom }}"></option>
                        </select>
                    </div>
                    <div class="input-group w-50 ml-3">
                        <input type="text" id="searchInput" class="form-control" placeholder="Rechercher" />
                    </div>
                    <div class="w-50 d-flex flex-row-reverse form-group">
                        <a href="create-task.html" class="btn btn-success"><i class="fas fa-plus"></i> Nouveau task</a>
                    </div>
                </div>

                <div class=" pt-2">
                    <table id="example2" class="table table-bordered table-hover mt-2">
                        <thead>
                            <tr>
                                <th>Titre de Task</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBodyTask">
                            <tr>
                                <td>Rapport</td>
                                <td>Rediger le rapport de cnmh</td>
                                <td>
                                    <div>
                                        <a href="edit-task.html" class="btn btn-primary">
                                            <i class="fas fa-edit"></i> Editer
                                        </a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#deleteTaskModal">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteTaskModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ...
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Rapport</td>
                                <td>Rediger le rapport de cnmh</td>
                                <td>
                                    <div>
                                        <a href="edit-task.html" class="btn btn-primary">
                                            <i class="fas fa-edit"></i> Editer
                                        </a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#deleteTaskModal">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>

                                        <div class="modal fade" id="deleteTaskModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger">
                                                        <h5 class="modal-title text-white" id="exampleModalLabel">Delete
                                                            Task</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete this task?</p>
                                                    </div>
                                                    <form action="" method="POST" class="modal-footer">

                                                        <input type="hidden" name="taskId" id="task-id">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                    <!-- Pagination Links-->
                </div>

                <div class=" d-md-flex justify-content-between">
                    <!-- export and import  -->
                    <div class="">
                        <div class="d-flex">
                            <form action="" method="post">

                                <button type="submit" class="btn btn-success">Exporter</button>
                            </form>

                            <form class="ml-1" action="" method="post" id="importForm"
                                enctype="multipart/form-data">

                                <input type="file" id="fileInputImporter" name="file" style="display: none;">
                                <button type="button" class="btn btn-warning"
                                    id="chooseFileButtonImporter">Importer</button>
                            </form>

                        </div>
                    </div>

                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center" id="pagination-links">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
