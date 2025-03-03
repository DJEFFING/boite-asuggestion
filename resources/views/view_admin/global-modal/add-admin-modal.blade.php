
<div class="modal fade show" id="{{ 'addAdmin' . $id }}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" style="display: none;" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(74, 104, 240)">
                <h3 class="modal-title" id="largeModalLabel">attribuer un role administrateur</h3>
                <button type="button" style="float: right" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <form action="{{ $url }}" method="POST">
                @csrf
            <div class="modal-body text-center">
                    <p>Voulez-vous vraiment attribuez se role?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">annuler</button>
                <button type="submit" class="btn btn-info">valider</button>
            </div>
            </form>
        </div>
    </div>
</div>

