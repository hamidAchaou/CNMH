<!DOCTYPE html>
<html lang="fr">

<!-- Inclure l'en-tête -->
<?php include_once "../layouts/heade.php" ?>

<body class="sidebar-mini" style="height: auto;">

    <div class="wrapper">
        <!-- Navigation -->
        <?php include_once "../layouts/nav.php" ?>
        <!-- Barre latérale -->
        <?php include_once "../layouts/aside.php" ?>


        <div class="content-wrapper" style="min-height: 1302.4px;">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Liste des Utilisateur</h1>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-sm-right">
                                <!-- btnAdd -->
                                <a href="./ajouter.php" class="btn btn-secondary">
                                    <i class="fas fa-plus"></i> Neveau Utilisateur
                                </a>
                            </div>
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
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Recherche">
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
                                                <th>Nom</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ahmed alami</td>
                                                <td>
                                                    ahmed@gmail.com
                                                </td>
                                                <td>
                                                    <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Achou</td>
                                                <td>
                                                    Achou@gmail.com
                                                </td>
                                                <td>
                                                    <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ben nasser</td>
                                                <td>
                                                    adnan@gmail.com
                                                </td>
                                                <td>
                                                    <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer clearfix mb-2 mr-5">
                                    <ul class="pagination  m-0 float-right">
                                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                                        <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>


        <!-- Inclure le pied de page -->
        <?php include_once "../layouts/footer.php" ?>

    </div>

    <!-- Inclure le script -->
    <?php include_once "../layouts/script-link.php" ?>
</body>

</html>