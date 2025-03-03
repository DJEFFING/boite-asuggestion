<div class="modal fade" id={{'comment'.$id}} tabindex="-1" aria-labelledby="comment-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="comment-modal-label">Commenter la suggestion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('suggestions.comment')}}" method="post">
                    @csrf
                    <input type="hidden" id="suggestion_id" name="suggestion_id" value="{{$id }}">

                    <div class="form-group">
                        <label for="body">Commentaire</label>
                        <textarea class="form-control" id="comment_text" name="comment_text" rows="2"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" >Commenter</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

            </div>
        </div>
    </div>
</div>
