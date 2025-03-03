
<div class="modal fade show" id="{{ 'notify' . $id }}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" style="display: none;" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(95, 144, 235)">
                <h4 class="modal-title" id="largeModalLabel">Envoyer une notification</h4>
                <button type="button" style="float: right" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>

            </div>
            
            <form action="{{ $url }}" method="POST">
                @csrf
                <div class="row form-group p-3">
                    <div class="col col-md-3">
                        <label for="summernote" class=" form-control-label">Nom de l'utilisateur<span class="text-danger">*</span></label>
                    </div>
                    <div class="col-12 col-md-9"><input type="text" name="username" class="form-control" id="" disabled value="{{ $username }}">
                        
                    </div>
                </div>
                <div class="row form-group p-3">
                    <div class="col col-md-3">
                        <label for="summernote" class=" form-control-label">Description<span class="text-danger">*</span></label>
                    </div>
                    <div class="col-12 col-md-9"><textarea name="description" id="description" rows="9" placeholder="Description de la notification..."  class="form-control" required>{{ $cause->description?? old('description') }}</textarea>
                        <small class="help-block form-text" style="color: red">{!! $errors->first('description', '<p class="help-block" style="color:red;">:message</p>') !!}</small>
                    </div>
                </div>
                
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">annuler</button>
                <button type="submit" class="btn btn-danger">Envoyer</button>
            </div>
            </form>
        </div>
    </div>
</div>

