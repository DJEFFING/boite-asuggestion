
<div class="modal fade show" id="{{ 'delete' . $id }}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" style="display: none;" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(233, 45, 45)">
                <h3 class="modal-title" id="largeModalLabel">Confirmer la suppression</h3>
                <button type="button" style="float: right" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>

            </div>
            <form action="{{ $url }}" method="POST">
                @csrf
                                @method('DELETE')
            <div class="modal-body text-center">
                <h2>Cette action est irreversible!</h2>
                <p>voulez vous vraiment supprimer??</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">annuler</button>
                <button type="submit" class="btn btn-danger">Confirmer</button>
            </div>
            </form>
        </div>
    </div>
</div>

