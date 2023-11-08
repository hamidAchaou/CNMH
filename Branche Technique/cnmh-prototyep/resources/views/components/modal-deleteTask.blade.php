<!-- Modal -->
<div class="modal fade" id="modalDeleteTask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title text-white" id="exampleModalLabel">Delete Task</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this task?</p>
        </div>
        <form action="{{ route('task.delete') }}" method="POST" class="modal-footer">
            @csrf
            @method('POST')
            <input type="hidden" name="taskId" id="task-id">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
      </div>
    </div>
</div>
  <script>
    function AddIdTask(idTask) {
        document.getElementById('task-id').value = idTask;
    }
  </script>