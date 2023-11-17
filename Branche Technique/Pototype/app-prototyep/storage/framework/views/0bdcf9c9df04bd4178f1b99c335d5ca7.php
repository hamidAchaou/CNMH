<?php $__env->startSection('title', 'HomePage'); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <section class="w-100">
            <div class="content pt-4">
                <div class="mt-4 d-flex justify-content-around">
                    <div class="form-group col-md-4">
                        <h4 class="font-weight-bold">Les Projets</h4>
                    </div>

                    <div class="input-group form-group col-md-4">
                        <input type="text" id="searchInput" class="form-control" placeholder="Rechercher">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                    </div>

                    <div class="w-25 d-flex flex-row-reverse form-group col-md-4">
                        <a href="" class="btn btn-success"><i class="fas fa-plus"></i> Nouveau Project</a>
                    </div>
                </div>
            </div>

            <div class="content container">
                <div class="card container pt-3">
                    <div class="content">
                        <div class="d-flex">
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
                        <table id="example2" class="table table-bordered table-hover text-nowrap">
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

                                            
                              <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($project->name); ?></td>
                                    <td><?php echo e($project->description); ?></td>
                                    <td><?php echo e($project->startDate); ?></td>
                                    <td><?php echo e($project->endDate); ?></td>
                                    <td>
                                        <a href="<?php echo e(url('tasks')); ?>" class="nav-link text-center">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                    <td class="d-flex">
                                        <button type="submit" class="btn btn-primary mr-2">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="submit" class="btn btn-danger mr-2">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                            <!-- Pagination Links -->
                            <div class="d-flex justify-content-center" id="pagination-links">
                                <?php echo e($projects->links()); ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\__SoliCoders\CNMH\Branche Technique\Pototype\app-prototyep\resources\views/projects/index.blade.php ENDPATH**/ ?>