

<div class="row form-group">
    <div class="col col-md-3">
        <label for="text-input" class=" form-control-label">Titre <span class="text-danger">*</span></label>
    </div>
    <div class="col-12 col-md-9"><input type="text" id="text-input" name="titre" placeholder="Titre de la cause" value="{{ $cause->titre?? old('titre') }}"  class="form-control">
        <small class="help-block form-text"  style="color:red;">{!! $errors->first('titre', '<p class="help-block" style="color:red">:message</p>') !!}</small>
    </div>
</div>
    
<div class="row form-group">
    <div class="col col-md-3">
        <label for="summernote" class=" form-control-label">Description <span class="text-danger">*</span></label>
    </div>
    <div class="col-12 col-md-9"><textarea name="description" id="summernote" rows="9" placeholder="Description de la cause..."  class="form-control">{{ $cause->description?? old('description') }}</textarea>
        <small class="help-block form-text" style="color: red">{!! $errors->first('description', '<p class="help-block" style="color:red;">:message</p>') !!}</small>
    </div>
</div>
    
<div class="row form-group">
    <div class="col col-md-3">
        <label for="text-input" class=" form-control-label">Montant 1 <span class="text-danger">*</span></label>
    </div>
    <div class="col-12 col-md-9"><input type="number" id="text-input" name="montant_1" placeholder="Montant 1" value="{{ $cause->montant_1?? old('montant_1') }}"  class="form-control">
        <small class="help-block form-text" style="color: red">{!! $errors->first('montant_1', '<p class="help-block" style="color:red;">:message</p>') !!}</small>
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-3">
        <label for="text-input" class=" form-control-label">Montant 2 <span class="text-danger">*</span></label>
    </div>
    <div class="col-12 col-md-9"><input type="number" id="text-input" name="montant_2" placeholder="Montant 2" value="{{ $cause->montant_2?? old('montant_2') }}"  class="form-control">
        <small class="help-block form-text" style="color: red">{!! $errors->first('montant_2', '<p class="help-block" style="color:red;">:message</p>') !!}</small>
    </div>
</div>


<div class="row form-group">
    <div class="col col-md-3">
        <label for="file-multiple-input" class=" form-control-label">Photo </label>
    </div>
    <div class="col-12 col-md-9"><input type="file" id="file-multiple-input"   name="photo[]" multiple="" class="form-control">
    </div>
</div>

