<div class="modal fade show" id="editcause{{ $cause->id }}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" style="display: none;" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" style="width: 90%"  role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(241, 252, 39)">
                <button type="button" style="float: right" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h3 class="modal-title" id="largeModalLabel">Modifier Une cause</h3>
            </div>
            <form action="{{ route('admin.cause.update',$cause->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="modal-body">
                    @include('view_admin.cause.form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">annuler</button>
                    <button type="submit" class="btn btn-success" onclick="loader_charger({{ $cause->id }})"><span id="submit-btn{{ $cause->id }}">Confirmer</span><span class="loader" id="loader{{ $cause->id }}" ></span></button>
                </div>
            </form>
        </div>
    </div>
</div>
