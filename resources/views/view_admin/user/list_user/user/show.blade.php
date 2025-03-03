<div class="modal fade show" id="show{{ $cause->id }}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" style="display: none;" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg"   role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(28, 187, 232)">
                <button type="button" style="float: right" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h3 class="modal-title" id="largeModalLabel">Detail  de la cause : {{ $cause->titre }}</h3>
            </div>
            <div class="modal-body ">
                <center>
                <div class="card-img-top">
                    <div class="row  align-items-center">
                        @if(isset($cause->photo))
                        @foreach (json_decode($cause->photo) as $item)
                        @if (strpos($item,'jpeg') || strpos($item,'png')  || strpos($item,'jpg')  || strpos($item,'gif')  )
                            <div class="col-md-4 " >
                                <img  src="{{ asset('storage/'.$item) }}" width="640" height="270" alt="image {{ $cause->titre }}">
                            </div>
                        @elseif (strpos($item,'mp4') || strpos($item,'wmv') || strpos($item,'mov') || strpos($item,'avi') )
                        <div class="col-md-12 " >
                            <video width="798" height="270" controls>
                                <source src="{{ asset('storage/'.$item) }}" type="video/mp4">
                                Votre navigateur ne supporte pas les vidéos au format HTML5.
                            </video>
                        </div>
                            @endif
                        @endforeach
                        @else
                        <div class="col">
                            <p>Aucune image</p>
                        </div>
                        @endif
                    </div>
                    </div>
                </center>
                <p class="card-text"  style="display: flex;">  <h4> <strong>Titre : </strong> {{ $cause->titre }}</h4>   </p><hr>
                <p class="card-text"><h4> <strong>Montant 1: </strong>{{ $cause->montant_1 }} XAF</h4> </p><hr>
                <p class="card-text"><h4> <strong>Montant 2: </strong>{{ $cause->montant_2 }} XAF</h4> </p><hr>
                <p class="card-text"><h4> <strong>Description : </strong> <h6>{{ $cause->description }}</h6> </h4></p>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" aria-label="Close" class="btn btn-info">Confirmer</button>
            </div>
        </div>
    </div>
</div>
