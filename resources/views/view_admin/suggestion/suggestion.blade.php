<?php
use Illuminate\Support\Str;
$routeName=Route::currentRouteName();

?>

<div class="blog-wrap">
	<div class="container pd-0">
		<div class="row">
			<div class="col-md-8 col-sm-12">
				<div class="blog-list">
				@if($routeName == "admin.user.suggestion.suggestions_privees")
					<ul>
					<?php $i=0; ?>
						@foreach ($suggestions as $suggestion)
						<li> <a href = "{{route('admin.user.suggestion.sugesstion-detaill', ['id_suggestion'=>$suggestion->id])}}">
							<div class="row no-gutters">
								<div class="col-lg-8 col-md-12 col-sm-12">
									<div class="blog-caption">
										<h6>
											<i class="fa fa-user-circle fa-2x"></i>
											{{$suggestion->pseudo}}
											{{$suggestion->created_at->diffForHumans()}}
										</h6>
										<div class="blog-by">
											<p>
												{{Str::limit($suggestion->description,50,'...')}}
											</p>
											<span class="badge badge-danger mr-2">Privée</span>

											<div class="pt-10 d-flex">

												<a href="#" class="btn btn-outline-primary" style="margin-right: 30px;"
													><i class="icon-copy fi-like"></i> 11</a
												>

												<a href="#" class="btn btn-outline-primary" style="margin-right: 30px;"
													><i class="icon-copy fa fa-comments" aria-hidden="true"></i> 14</a
												>

												<form method='post' action='{{route('admin.user.suggestion.storeApprouveSuggestion')}}'>
													@csrf
													<input type='hidden' value='{{$suggestion->id}}' name='favoris'>
													<button class="btn btn btn-outline-primary like-button" type="submit">
														<i class="icon-copy fa fa-star{{ $aprove[$i] != 0 ? '' : '-o'}}" aria-hidden="true"></i>
													</button>
												</form>

											</div>
										</div>
									</div>
								</div>
							</div></a>
						</li>
						<?php $i++; ?>
						@endforeach
					</ul>
				@endif

				@if($routeName == "admin.user.suggestion.toutes_suggestions" )
					<ul>
					<?php $i=0; ?>
						@foreach ($suggestions as $suggestion)
						<li> <a href = "{{route('admin.user.suggestion.sugesstion-detaill', ['id_suggestion'=>$suggestion->id])}}">
							<div class="row no-gutters">
								<div class="col-lg-8 col-md-12 col-sm-12">
									<div class="blog-caption">
										<h6>
											<i class="fa fa-user-circle fa-2x"></i>
											{{$suggestion->pseudo}}
											{{$suggestion->created_at->diffForHumans()}}
										</h6>
										<div class="blog-by">
											<p>
												{{Str::limit($suggestion->description,50,'...')}}
											</p>
											@if ($suggestion->status == 1)
												<span class="badge badge-danger mr-2">Privée</span>
											@else
												<span class="badge badge-success mr-2">Public</span>
											@endif
											<div class="pt-10 d-flex">
                                                @if ($suggestion->likes->contains('user_id', auth()->user()->id))
                                                <a href="#">
                                                <button class="btn btn btn-outline-primary like-button active" type="submit">
                                                    <i class="icon-copy fi-like"></i>
                                                    <span class="like-count">{{ $suggestion->likes->count() }}</span>
                                                </button></a>
                                            @else

                                                <a href="#">
                                                    <button class="btn btn btn-outline-primary like-button" type="submit">
                                                        <i class="icon-copy fi-like"></i>
                                                        <span class="like-count">{{ $suggestion->likes->count() }}</span>
                                                    </button></a>
                                            @endif

                                            <button data-toggle="modal" data-target="#comment{{$suggestion->id}}" class="btn btn-outline-primary" style="margin-right: 30px; margin-left: 30px">
                                                <i class="icon-copy fa fa-comments" aria-hidden="true"></i><span style="margin-left: 10px" class="like-count">{{ $suggestion->commentaires->count() }}</span>
                                            </button>


												<form method='post' action='{{route('admin.user.suggestion.add_suggestion_approuvee')}}'>
													@csrf
													<input type='hidden' value='{{$suggestion->id}}' name='favoris'>
													<button class="btn btn btn-outline-primary like-button" type="submit">
														<i class="icon-copy fa fa-star{{ $aprove[$i] != 0 ? '' : '-o'}}" aria-hidden="true"></i>
													</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div></a>
						</li>
						<?php $i++; ?>
						@endforeach
					</ul>
				@endif

				@if($routeName == "admin.user.suggestion.suggestions_approuvees")
					<ul>
					<?php $i=0; ?>
						@foreach ($suggestions as $suggestion)
						<li> <a href = "{{route('admin.user.suggestion.sugesstion-detaill', ['id_suggestion'=>$suggestion->id])}}">
							<div class="row no-gutters">
								<div class="col-lg-8 col-md-12 col-sm-12">
									<div class="blog-caption">
										<h6>
											<i class="fa fa-user-circle fa-2x"></i>
											{{$suggestion->pseudo}}
											{{$suggestion->created_at->diffForHumans()}}
										</h6>
										<div class="blog-by">
											<p>
												{{Str::limit($suggestion->description,50,'...')}}
											</p>
											@if ($suggestion->status == 1)
												<span class="badge badge-danger mr-2">Privée</span>
											@else
												<span class="badge badge-success mr-2">Public</span>
											@endif
																						<div class="pt-10 d-flex">

												<a href="#" class="btn btn-outline-primary" style="margin-right: 30px;"
													><i class="icon-copy fi-like"></i> 11</a
												>

												<a href="#" class="btn btn-outline-primary" style="margin-right: 30px;"
													><i class="icon-copy fi-dislike"></i> 7</a
												>

												<a href="#" class="btn btn-outline-primary" style="margin-right: 30px;"
													><i class="icon-copy fa fa-comments" aria-hidden="true"></i> 14</a
												>


												<form method='post' action='{{route('admin.user.suggestion.storeApprouveSuggestion')}}'>
													@csrf
													<input type='hidden' value='{{$suggestion->id}}' name='favoris'>
													<button class="btn btn btn-outline-primary like-button" type="submit">
														<i class="icon-copy fa fa-star{{ $aprove[$i] != 0 ? '' : '-o'}}" aria-hidden="true"></i>
													</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div></a>
						</li>
						@endforeach
					</ul>
				@endif
				</div>

                @if (count($suggestions)==15)
                    <div class="blog-pagination">
                        {{$suggestions->links('view_paginate')}}
                    </div>
                @endif

			</div>
			<div class="col-md-4 col-sm-12">
				<div class="card-box mb-30">
					<h5 class="pd-20 h5 mb-0">Categories</h5>
					<div class="list-group">
					@foreach ($categories as $categorie )

						<a
							href="#"
							class="list-group-item d-flex align-items-center justify-content-between"
							> {{ $categorie->titre}}
						</a>

					@endforeach
					</div>
				</div>
				<div class="card-box mb-30">

				</div>
				<div class="card-box overflow-hidden">
					<h5 class="pd-20 h5 mb-0">Archives</h5>
					<div class="list-group">
						<a
							href="#"
							class="list-group-item d-flex align-items-center justify-content-between"
							>January 2020</a
						>
						<a
							href="#"
							class="list-group-item d-flex align-items-center justify-content-between"
							>February 2020</a
						>
						<a
							href="#"
							class="list-group-item d-flex align-items-center justify-content-between"
							>March 2020</a
						>
						<a
							href="#"
							class="list-group-item d-flex align-items-center justify-content-between"
							>April 2020</a
						>
						<a
							href="#"
							class="list-group-item d-flex align-items-center justify-content-between"
							>May 2020</a
						>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
