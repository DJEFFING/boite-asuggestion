<div class="row form-group">
    <div class="col col-md-3">
        <label for="text-input" class=" form-control-label">Categorie <span class="text-danger">*</span></label>
    </div>
    <div class="col-12 col-md-9">
        <select name="categorie" id="categorie"  class="form-control" required>
            <option value="">Aucun</option>
            @foreach ($categories as $categorie)
              <option value="{{ $categorie->id}}"> {{ $categorie->titre}} </option>
            @endforeach
        </select>
        <small class="help-block form-text"  style="color:red;">{!! $errors->first('titre', '<p class="help-block" style="color:red">:message</p>') !!}</small>
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-3"> 
        <label for="text-input" class=" form-control-label">Objet<span class="text-danger">*</span></label>
    </div>
    <div class="col-12 col-md-9"><input type="text" id="objet" name="object" placeholder="Entrez l'objet de votre suggestion" value="{{ $cause->objet?? old('objet') }}"  class="form-control" required>
        <small class="help-block form-text" style="color: red">{!! $errors->first('objet', '<p class="help-block" style="color:red;">:message</p>') !!}</small>
    </div>
</div>
    
<div class="row form-group">
    <div class="col col-md-3">
        <label for="summernote" class=" form-control-label">Description <span class="text-danger">*</span></label>
    </div>
    <div class="col-12 col-md-9"><textarea name="description" id="description" rows="9" placeholder="Description de la cause..."  class="form-control" required>{{ $cause->description?? old('description') }}</textarea>
        <small class="help-block form-text" style="color: red">{!! $errors->first('description', '<p class="help-block" style="color:red;">:message</p>') !!}</small>
    </div>
</div>
    
<div class="row form-group">
    <div class="col col-md-3">
        <label for="text-input" class=" form-control-label">Statut de votre suggestion<span class="text-danger">*</span></label>
    </div>
    <div class="col-12 col-md-9">
        <input type="radio" name="status" class="mx-3" value="0" id="" onclick="removeInfo()" checked>Public
        <input type="radio" name="status" class="mx-3" value="1" id="" onclick="moreInfo()" >Prive
    </div>
</div>

<div id="formulaire" style="display: none;">
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="text-input" class=" form-control-label">Nom et Prenom<span class="text-danger">*</span></label>
        </div>
        <div class="col-12 col-md-9"><input type="text" id="input-nom" name="vrai_nom" placeholder="Entrez votre nom et prenom" value="{{ $cause->objet?? old('vrai_nom') }}"  class="form-control">
            <small class="help-block form-text" style="color: red">{!! $errors->first('vrai_nom', '<p class="help-block" style="color:red;">:message</p>') !!}</small>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="text-input" class=" form-control-label">Filiere<span class="text-danger">*</span></label>
        </div>
        <div class="col-12 col-md-9"><input type="text" id="input-nom" name="filiere" placeholder="Entrez votre filiere" value="{{ $cause->objet?? old('vrai_nom') }}"  class="form-control">
            <small class="help-block form-text" style="color: red">{!! $errors->first('filiere', '<p class="help-block" style="color:red;">:message</p>') !!}</small>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="text-input" class=" form-control-label">Specialite<span class="text-danger">*</span></label>
        </div>
        <div class="col-12 col-md-9"><input type="text" id="input-nom" name="specialite" placeholder="Entrez votre specialite" value="{{ $cause->objet?? old('vrai_nom') }}"  class="form-control">
            <small class="help-block form-text" style="color: red">{!! $errors->first('specialite', '<p class="help-block" style="color:red;">:message</p>') !!}</small>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="text-input" class=" form-control-label">Niveau <span class="text-danger">*</span></label>
        </div>
        <div class="col-12 col-md-9">
            <select name="niveau" id="text-input"  class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <small class="help-block form-text"  style="color:red;">{!! $errors->first('titre', '<p class="help-block" style="color:red">:message</p>') !!}</small>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="text-input" class=" form-control-label">Telephone<span class="text-danger">*</span></label>
        </div>
        <div class="col-12 col-md-9"><input type="number" id="input-nom" name="telephone" placeholder="Entrez votre numero de telephone" value="{{ $cause->objet?? old('vrai_nom') }}"  class="form-control">
            <small class="help-block form-text" style="color: red">{!! $errors->first('telephone', '<p class="help-block" style="color:red;">:message</p>') !!}</small>
        </div>
    </div>
</div>


<script>
     function moreInfo() {
      var formulaire = document.getElementById("formulaire");
      formulaire.style.display = "block";
    }
    function removeInfo() {
      var formulaire = document.getElementById("formulaire");
      formulaire.style.display = "none";
      
    }
</script>
