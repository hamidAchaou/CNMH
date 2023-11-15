<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header bg-danger text-white">
        <h5 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Supprimer la compétence</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <h4>Etes-vous sûr de supprimer cette compétence ?</h4>
    </div>
    <form action="{{ route('competences.destroy')}}" method="POST" class="d-flex gap-3 flex-row-reverse py-2 container border-top border-primary">
        @csrf
        @method('delete')
        <input type="hidden" name="id" id="id">
        <button type="button" class="btn btn-secondary ml-3" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" name="competenceID" class="btn btn-danger">Supprimer</button>
    </form>
</div>