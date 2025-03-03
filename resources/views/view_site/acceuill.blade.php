<?php
use Illuminate\Support\Str;
?>
@extends('view_site.partials.app')
@section('content')

	<!-- main containner -->
		<div class="main-container">
			<div class="pd-ltr-20 height-100-p xs-pd-20-10">
				<div class="min-height-200px">
					<div class="">
						@if (!empty(session('success')))
						    <div class="alert alert-success">{{ session('success') }}</div>
					    @endif
					</div>
					<div class="page-header">
                        @if (!empty(session('message')))
                            <div class="alert alert-success">
                                {{ session('message') }}
                                <hr>
                                @if (session('user') && session('pwd') )
                                <p>Non d'utilisateur : {{ session('user') }}</p>
                                <p>Mot de passe : {{ session('pwd') }}</p>
                                @endif

                            </div>
                        @endif
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>List des Suggestions</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="/">Acceuil</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Seggestion
										</li>
									</ol>
									</nav>
							</div>
                            <button type="button" class="col-md-4 col-sm-12 btn btn-primary btn-lg" data-toggle="modal" data-target="#addSuggestion">
                                Ajouter une Suggestion
                            </button>
						</div>
					</div>
					<div class="blog-wrap">
						<div class="container pd-0">
							<div class="row">
								<div class="col-md-8 col-sm-12">
									<div class="blog-list">
										<ul>
											@foreach ($suggestions as $suggestion)
											<li> <a href = "{{route('suggestions.sugesstion-detaill',$suggestion->id)}}">
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
																<div class="pt-10">
																		@if ($suggestion->likes->contains('user_id', auth()->user()->id))
																			<a href="{{ route('suggestions.unlike', $suggestion) }}">
																			<button class="btn btn btn-outline-primary like-button active" type="submit">
																				<i class="icon-copy fi-like"></i>
																				<span class="like-count">{{ $suggestion->likes->count() }}</span>
																			</button></a>
																		@else

																			<a href="{{ route('suggestions.like', $suggestion) }}">
																				<button class="btn btn btn-outline-primary like-button" type="submit">
																					<i class="icon-copy fi-like"></i>
																					<span class="like-count">{{ $suggestion->likes->count() }}</span>
																				</button></a>
																		@endif

																		<button data-toggle="modal" data-target="#comment{{$suggestion->id}}" class="btn btn-outline-primary" style="margin-right: 30px; margin-left: 30px">
																			<i class="icon-copy fa fa-comments" aria-hidden="true"></i><span style="margin-left: 10px" class="like-count">{{ $suggestion->commentaires->count() }}</span>
																		</button>

																</div>
                                                                {{-- commentaire --}}
                                                               @include('view_site.partials.modal.comment-modal',['id'=>$suggestion->id])
                                                                {{-- end comment section --}}
															</div>
														</div>
													</div>
												</div></a>
											</li>
											@endforeach
											@if ($suggestions->isEmpty())
												<h3>Aucun résultat</h3>
											@endif
										</ul>
									</div>
                                    @if (count($suggestions))
                                        <div class="blog-pagination">
                                            {{$suggestions->links()}}
                                        </div>
                                    @endif

								</div>
								<div class="col-md-4 col-sm-12">
									<div class="card-box mb-30">
									  <h5 class="pd-20 h5 mb-0">Categories</h5>
									  <div class="list-group" id="categories">
										@foreach ($categories as $categorie)
										  <a href="{{ route('suggestions.index', ['categorie_id' => $categorie->id]) }}" class="list-group-item d-flex align-items-center justify-content-between">
											{{ $categorie->titre }}
										  </a>
										@endforeach
									  </div>
									</div>
									<div class="card-box mb-30">
									  <!-- Autres éléments de la page -->
									</div>
									<div class="card-box overflow-hidden">
									  <h5 class="pd-20 h5 mb-0">Archives</h5>
									  <div class="list-group" id="archives">
										<a href="{{ route('suggestions.index', ['date' => '2023-12-08']) }}" class="list-group-item d-flex align-items-center justify-content-between">December 2023</a>
										<a href="{{ route('suggestions.index', ['date' => '2023-11-08']) }}" class="list-group-item d-flex align-items-center justify-content-between">November 2023</a>
										<a href="{{ route('suggestions.index', ['date' => '2020-03-22']) }}" class="list-group-item d-flex align-items-center justify-content-between">March 2020</a>
										<a href="{{ route('suggestions.index', ['date' => '2020-04-15']) }}" class="list-group-item d-flex align-items-center justify-content-between">April 2020</a>
										<a href="{{ route('suggestions.index', ['date' => '2020-05-08']) }}" class="list-group-item d-flex align-items-center justify-content-between">May 2020</a>
									  </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End main containner -->
@include('view_site.suggestion.create')
@endsection
