<div class="modal fade" id="comment" tabindex="-1" aria-labelledby="comment-modal-label" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            {{-- <div class="blog-list">
                <ul>
                    @foreach ($suggestions as $suggestion)
                    <li> <a href = "#">
                        <div class="row no-gutters">
                            <div class="col-lg-8 col-md-12 col-sm-12">
                                <div class="blog-caption">
                                    <h6>
                                        {{$suggestion->pseudo}}
                                        {{$suggestion->created_at->format('d-m-Y')}}
                                    </h6>
                                    <div class="blog-by">
                                        <p>
                                            {{$suggestion->description}}
                                        </p>
                                        <div class="pt-10">

                                            <a href="#" class="btn btn-outline-primary" style="margin-right: 30px;"
                                                ><i class="icon-copy fi-like"></i> 11</a
                                            >

                                            <a href="#" class="btn btn-outline-primary" style="margin-right: 30px;"
                                                ><i class="icon-copy fi-dislike"></i> 7</a
                                            >

                                            <a href="" class="btn btn-outline-primary" style="margin-right: 30px;"
                                                data-toggle="modal" data-target="#comment">
                                                <i class="icon-copy fa fa-comments" aria-hidden="true"></i> 14
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div></a>
                    </li>
                    @endforeach
                </ul>
            </div> --}}

            {{-- <div class="container pd-0"> --}}
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="blog-list">
                            <ul>
                                {{-- @foreach ($commentaires as $commentaire) --}}
                                <li> <a href = "#">
                                    <div class="row no-gutters">
                                        <div class="col-lg-8 col-md-12 col-sm-12">
                                            <div class="blog-caption">
                                                <h6>
                                                    {{-- {{$commentaire->user_id}} --}}

                                                </h6>
                                                <div class="blog-by">
                                                    <p>
                                                        {{-- {{$commentaire->comment_value}} --}}
                                                        {{-- {{$commentaire->created_at->format('d-m-Y')}} --}}
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div></a>
                                </li>
                                {{-- @endforeach --}}
                            </ul>
                        </div>
            <div class="modal-body">
                <form action="{{route('comment')}}" method="post">
                    @csrf
                    <input type="hidden" id="suggestion_id" name="suggestion_id" value="{{$suggestion->id }}">

                    <div class="form-group">
                        <label for="body">Commentaire</label>
                        <textarea class="form-control" id="body" name="comment_text" rows="2"></textarea>
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
