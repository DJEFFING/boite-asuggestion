<div class="modal fade show" id="addCategeorie" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" style="display: none;" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" style="width: 90%"  role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255, 255, 255)">
                <h3 class="modal-title" id="largeModalLabel">Nouvelle Categeorie de Suggestion</h3>
                <button type="button" style="float: right" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{route('admin.categorie.store')}}" method="post" enctype="multipart/form-data"  class="form-horizontal p-5">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="summernote" class=" form-control-label">Titre <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-12 col-md-9"><input type="text" name="titre" id="titre" class="form-control" required>
                        <small class="help-block form-text" style="color: red">{!! $errors->first('description', '<p class="help-block" style="color:red;">:message</p>') !!}</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" onclick="loader_charger(0)"><span id="submit-btn0">Confirmer</span><span class="loader" id="loader0" ></span></button>
                </div>
            </form>
        </div>
    </div>
</div>