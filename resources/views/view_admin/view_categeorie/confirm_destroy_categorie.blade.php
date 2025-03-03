<div class="modal fade show" id="desCategeorie{{ $categorie->id }}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" style="display: none;" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" style="width: 90%"  role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255, 255, 255)">
                <h3 class="modal-title" id="largeModalLabel">Confirmation Suppression</h3>
                <button type="button" style="float: right" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('admin.categorie.destroy', $categorie->id) }}" method="post" enctype="multipart/form-data"  class="form-horizontal p-5">
                @csrf
                @method('DELETE')
                <label for="summernote" class=" form-control-label ml-3" style="margin-top: -90px;">Voulez-vous vraiment supprimer la Catégeorie "{{ $categorie->titre }}"</label>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">NON</button>
                    <button type="submit" class="btn btn-danger mr-1" onclick="loader_charger(0)"><span id="submit-btn0">OUI</span><span class="loader" id="loader0" ></span></button>
                </div>
            </form>
        </div>
    </div>
</div>