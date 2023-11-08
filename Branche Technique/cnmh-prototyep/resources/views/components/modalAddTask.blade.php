<!-- Modal -->
<div class="modal fade" id="modalAddTask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" action="{{ route('createTask') }}" method="POST" onsubmit="return validateForm()">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div>
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter task title" value="{{ old('title') }}" required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Enter task description" required>{{ old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="project_Id" id="project_Id">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>

<script>
    function validateForm() {
        var title = document.getElementById('title').value.trim();
        var description = document.getElementById('description').value.trim();

        // Reset error messages
        document.getElementById('title').classList.remove('is-invalid');
        document.getElementById('description').classList.remove('is-invalid');
        document.getElementById('title-error').innerHTML = '';
        document.getElementById('description-error').innerHTML = '';

        if (title === '') {
            document.getElementById('title').classList.add('is-invalid');
            document.getElementById('title-error').innerHTML = 'Title is required.';
            return false;
        }

        if (description === '') {
            document.getElementById('description').classList.add('is-invalid');
            document.getElementById('description-error').innerHTML = 'Description is required.';
            return false;
        }

        return true; // Form is valid, proceed with submission
    }
</script>