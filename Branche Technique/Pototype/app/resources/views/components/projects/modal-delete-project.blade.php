<!-- Modal -->
<div class="modal fade" id="modal-projectDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="exampleModalLabel">
                    {{__('words.delete_title')}}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{__('words.delete_confirmation')}}</p>
            </div>
            <form action="{{ route('projectsDelete') }}" method="POST" class="modal-footer">
                @csrf
                @method('DELETE')
                <input type="hidden" name="projectId" id="task-id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('words.cancel') }}</button>
                <button type="submit" class="btn btn-danger">{{__('words.delete')}}</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Call the AddIdProject function when the modal is opened
    $('#modal-projectDelete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var idProject = button.data('id-project'); // Extract id-project from data-* attributes
        AddIdProject(idProject);
    });

    function AddIdProject(idProject) {
        document.getElementById('task-id').value = idProject;
    }
</script>
