<!-- Modal -->
<div class="modal fade" id="delete-task" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form id="delete-task-form" action="{{ route('tasks.destroy') }}" method="POST">
          @csrf
          @method('DELETE') <!-- Ensure the method is set to DELETE -->
          <input type="hidden" id="task-id" name="task_id">
          <input type="hidden" id="project-id" name="project_id">
          <button type="submit" class="btn btn-danger">DELETE</button>
      </form>
      
      </div>
    </div>
  </div>
</div>

<script>
  function deleetProject(task_Id, project_Id) {
    document.getElementById('task-id').value = task_Id;
    document.getElementById('project-id').value = project_Id;
  }
</script>
