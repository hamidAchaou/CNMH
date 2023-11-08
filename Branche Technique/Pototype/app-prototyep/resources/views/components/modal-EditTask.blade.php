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
                    <div action="{{ route('createTask') }}" method="post" onsubmit="return validateForm()">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title-task" name="title" placeholder="Enter task title" required>
                            <div class="invalid-feedback" id="title-error"></div>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description-task" name="description" rows="3" placeholder="Enter task description" required></textarea>
                            <div class="invalid-feedback" id="description-error"></div>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="hidden" name="project_Id" id="project_Id">
                        {{-- <button type="submit" class="btn btn-success text-center">Update</button> --}}
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
</script>