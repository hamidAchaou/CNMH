<!-- Modal -->
<div class="modal fade" id="modal-projectDelete" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title text-white" id="exampleModalLabel">Delete Project</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this Project?</p>
        </div>
        <form action="{{ route('projectsDelete') }}" method="POST" class="modal-footer">
            @csrf
            @method('DELETE')
            <input type="texte" name="projectId" id="task-id">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
      </div>
    </div>
</div>
  <script>
    function AddIdProject(idTask) {
        document.getElementById('task-id').value = idTask;
    }
  </script>