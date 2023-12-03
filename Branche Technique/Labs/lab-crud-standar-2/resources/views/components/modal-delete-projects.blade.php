<div class="modal fade" id="modaldeleteProjects" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-light">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa-solid fa-triangle-exclamation"></i> Supprimer Projet
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Êtes-vous sûr de vouloir supprimer ce projet ?</h4>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="Project_id" name="id">
                    <div class="d-flex justify-content-between gap-2">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x"></i> Fermer
                        </button>
                        <button type="submit" onclick="submitDeleteForm()" class="btn btn-danger">
                            <i class="bi bi-trash"></i> Supprimer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
