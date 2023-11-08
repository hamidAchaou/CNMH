<!-- Modal -->
<div class="modal fade" id="showProject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Project Details</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h1 class="text-center" id="title">Title</h1>
                <div class="text-center" id="description">
                    Description
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showTsk(task) {
        if(task['title'] == null) {
            document.getElementById('title').innerHTML = task['name']
        } else {
            document.getElementById('title').innerHTML = task['title']
        }
        document.getElementById('description').innerHTML = task['description']
    }
</script>