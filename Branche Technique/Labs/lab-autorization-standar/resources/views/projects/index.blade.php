@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Projects</h1>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right" href="{{ route('projects.create') }}">
                    Add New
                </a>
            </div>
        </div>
    </div>
</section>
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

@endsection