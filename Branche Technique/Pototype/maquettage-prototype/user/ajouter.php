<!DOCTYPE html>
<html lang="fr">

<!-- Obtenir l'en-tête -->
<?php include_once "../layouts/heade.php" ?>

<body class="sidebar-mini" style="height: auto;">

    <div class="wrapper">
        <!-- navigation -->
        <?php include_once "../layouts/nav.php" ?>
        <!-- barre latérale -->
        <?php include_once "../layouts/aside.php" ?>


        <div class="content-wrapper" style="min-height: 1302.4px;">

            <div class="content-header">
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Ajouter un utilisateur</h3>
                                </div>
                                <!-- obtenir le formulaire -->
                                <?php include_once "./form.php" ?>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>


        <!-- obtenir le pied de page -->
        <?php include_once "../layouts/footer.php" ?>

    </div>

    <!-- obtenir le script -->
    <?php include_once "../layouts/footer.php" ?>
</body>

</html>
