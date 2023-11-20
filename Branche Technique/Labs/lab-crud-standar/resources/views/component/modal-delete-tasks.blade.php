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
        <form action="{{ route('tasks.destroy') }}" method="POST">
          @csrf
          @method('DELETE')
          <input type="hidden" id="task_Id" name="task_Id">
          <input type="hidden" id="project_Id" name="project_Id">
          <button type="submit" class="btn btn-danger">DELETE</button>
      </form>
      
      </div>
    </div>
  </div>
</div>

<script>
  function deleetProject(task_Id, project_Id) {
    document.getElementById('task_Id').value = task_Id;
    document.getElementById('project_Id').value = project_Id;
  }
</script>
