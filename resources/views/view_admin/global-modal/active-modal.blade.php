
<div class="modal fade show" id="{{ 'active' . $item->id }}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" style="display: none;" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(74, 104, 240)">
                <button type="button" style="float: right" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
                <h3 class="modal-title" id="largeModalLabel">Confirmer la Publication</h3>
            </div>
            <form action="{{ $url }}" method="POST">
                @csrf
            <div class="modal-body text-center">
                    <p>Voulez-vous vraiment {{$item->is_active ? 'Cacher' : 'Publier' }}?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">annuler</button>
                <button type="submit" class="btn btn-info">{{$item->is_active ? 'Cacher' : 'Publier' }}</button>
            </div>
            </form>
        </div>
    </div>
</div>

