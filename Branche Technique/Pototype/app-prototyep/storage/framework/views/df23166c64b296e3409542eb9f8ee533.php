<!-- Modal -->
<div class="modal fade" id="modalEditTask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div action="<?php echo e(route('createTask')); ?>" method="post" onsubmit="return validateForm()">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="title-task" name="title" placeholder="Enter task title" required>
                            <div class="invalid-feedback" id="title-error"></div>
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="description-task" name="description" rows="3" placeholder="Enter task description" required></textarea>
                            <div class="invalid-feedback" id="description-error"></div>
                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <input type="hidden" name="project_Id" id="project_Id">
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary text-center">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
    function EditTask(dataTask) {
        document.getElementById('title-task').value = dataTask['title'];
        document.getElementById('description-task').value = dataTask['description'];
        console.log(dataTask['title']);
        console.log(dataTask['description']);
    }
</script>

<script>
    function validateForm() {
        var title = document.getElementById('title').value;
        var description = document.getElementById('description').value;

        // Reset error messages
        document.getElementById('title-error').innerHTML = '';
        document.getElementById('description-error').innerHTML = '';

        if (title.trim() === '') {
            document.getElementById('title-error').innerHTML = 'Title is required.';
            return false;
        }

        if (description.trim() === '') {
            document.getElementById('description-error').innerHTML = 'Description is required.';
            return false;
        }

        return true; // Form is valid, proceed with submission
    }
</script><?php /**PATH C:\xampp\htdocs\__SoliCoders\CNMH\Branche Technique\Pototype\app-prototyep\resources\views/components/modal-EditTask.blade.php ENDPATH**/ ?>