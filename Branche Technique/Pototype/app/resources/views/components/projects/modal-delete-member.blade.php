<!-- Delete Member Modal -->
<div class="modal fade" id="modalDeleteMember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title text-white" id="exampleModalLabel">Delete Member</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this member?</p>
        </div>
        <form action="{{ route('membersDelete') }}" method="POST" class="modal-footer">
          @csrf
          @method('DELETE')
          <input type="hidden" name="memberId" id="member-id">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger text-danger">Delete</button>
      </form>
      
      </div>
    </div>
</div>

<style>
  .btn-danger:hover {
      color: #fff !important;
  }
</style>

<script>
    function AddIdMembers(memberId) {
        document.getElementById('member-id').value = memberId;
    }
</script>
