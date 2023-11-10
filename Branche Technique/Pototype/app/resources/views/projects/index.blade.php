@extends('layouts.app')

@section('title', 'HomePage')

@section('content')
<section class="">
    <div class="content pt-4 container">
      <div class="mt-4 container row justify-content-around">
        <div class="form-group col-md-4">
          <h4 class="container font-weight-bold">Les Projets</h4>
        </div>

        <div class="input-group form-group col-md-4">
          <input type="text" id="searchInput" class="form-control" placeholder="Rechercher">
          <div class="input-group-append">
            <span class="input-group-text"><i class="fa fa-search"></i></span>
          </div>
        </div>

        <div class="w-25 d-flex flex-row-reverse form-group col-md-4">
          <a href="create.html" class="btn btn-success"><i class="fas fa-plus"></i> Nouveau Project</a>
        </div>
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
                  <option value="" selected>Choisir le project</option>
                  <option value="">Projet de cnmh</option>
                  <option value="">Projet de cnmh</option>
                </select>
              </div>
            </div>
          </div>
          <div class="">
            <table id="example2" class="table table-bordered table-hover">
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
                  <td>Projet de cnmh</td>
                  <td>Devlopper application de gestion centre cnmh</td>
                  <td>2023-10-12</td>
                  <td>2023-10-16</td>
                  <td>
                    <a href="tasks.html" class="nav-link text-center">
                      <i class="fa-solid fa-eye"></i>
                    </a>
                  </td>
                  <td class="d-flex">
                    <button type="submit" class="btn btn-primary mr-2 text-primary">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button type="submit" class="btn btn-danger mr-2 text-danger">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>

                <tr>
                  <td>Projet de cnmh</td>
                  <td>Devlopper application de gestion centre cnmh</td>
                  <td>2023-10-12</td>
                  <td>2023-10-16</td>
                  <td>
                    <a href="tasks/tasks.html" class="nav-link text-center">
                      <i class="fa-solid fa-eye"></i>
                    </a>
                  </td>
                  <td class="d-md-flex">
                    <button type="submit" class="btn btn-primary mr-2 text-primary">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button type="submit" class="btn btn-danger mr-2 text-danger">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>

              </tbody>
            </table>

            <div class="d-md-flex justify-content-between">
              <!-- export and import  -->
              <div class="">
                <div class="d-flex">
                  <form action="" method="post">

                    <button type="submit" class="btn"><i class="fa-solid fa-download"></i>Exporter</button>
                  </form>

                  <form class="ml-1" action="" method="post" id="importForm" enctype="multipart/form-data">

                    <input type="file" id="fileInputImporter" name="file" style="display: none;">
                    <button type="button" class="btn" id="chooseFileButtonImporter"><i
                        class="fa-solid fa-file-export"></i> Importer</button>
                  </form>

                </div>
              </div>

              <!-- Pagination Links -->
              <div class="d-flex justify-content-center mb-2" id="pagination-links">
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
        </div>
      </div>
  </section>
@endsection
