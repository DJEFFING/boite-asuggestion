{{--
<div class="modal fade" id="comment" tabindex="-1" aria-labelledby="comment-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="comment-modal-label">Commenter la suggestion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="body">Commentaire</label>
                        <textarea class="form-control" id="body" name="body" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary" form="comment-form">Commenter</button>
            </div>
        </div>
    </div>
</div>
 --}}

 <div class="modal fade show" id="comment" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" style="display: none;" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" style="width: 90%"  role="document">
        <div class="modal-content">
            <div class="modal-header" >
                 <h3 class="modal-title" id="largeModalLabel">Publier Une Suggestion</h3>
                <button type="button" style="float: right" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('suggestion.store') }}" method="post" enctype="multipart/form-data"  class="form-horizontal">
                @csrf
                <div class="modal-body">
                    @include('view_site.suggestion.form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">annuler</button>
                    <button type="submit" class="btn btn-success" onclick="loader_charger(0)"><span id="submit-btn0">Confirmer</span><span class="loader" id="loader0" ></span></button>
                </div>
            </form>
        </div>
    </div>
</div>
