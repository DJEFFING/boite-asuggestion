@extends('view_admin.partials.app')
@section('content')

<!-- main containner -->
		<div class="main-container">
			@if (!empty(session('message')))
				<div class="alert alert-primary" id="alert">
					{{ session('message') }}
				</div>
			@endif
			<div class="pd-ltr-20 height-100-p xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-3 col-sm-12">
								<div class="title">
									<h4>Details Sur l'utilisateur</h4>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 col-sm-12">
								<div class="title">
									<p>Pseudo :  {{ $user->pseudo }} </p>
								</div>
							</div>

                            <div class="col-md-5 col-sm-12">
								<div class="title">
									<p>Date d'inscription :  {{ $user->created_at->format('Y-m-d') }} </p>
								</div>
							</div>

                            <div class="col-md-4 col-sm-12">
								<div class="title">
									<p>Nombre de suggestion :  {{ $listSuggestion->total() }} </p>
								</div>
							</div>
						</div>
						<hr>
						<div class="row pl-5" style="display: center">
							<button type="button" class="col-md-3 col-sm-12 btn btn-primary btn-lg" data-toggle="modal" data-target="#notify{{ $user->id }}">
                                Envoyer une Notification
                            </button>
							@include('view_admin.global-modal.notify-modal',["username"=>$user->pseudo, "id"=>$user->id ,'url'=>route('admin.user.userList.notify-user', $user->id )])
						</div>
							
                            
						
					</div>
					<div class="blog-wrap">
						<div class="container pd-0">
							<div class="row">
								<div class="col-md-8 col-sm-12">
									<div class="blog-list">
										@if ($listSuggestion->count() > 0)
											<ul>	
												@foreach ($listSuggestion as $suggestion)
													<li>
														<div class="row no-gutters">
															<div class="col-lg-8 col-md-12 col-sm-12">
																<div class="blog-caption">
																	<a href="{{route('admin.user.suggestion.sugesstion-detaill', ['id_suggestion'=>$suggestion->id])}}">
																		<div class="blog-by">
																			<p class="font-weight-bold mb-2">{{ $suggestion->description }}</p>
																			@if ($suggestion->status == 1)
																				<span class="badge badge-danger mr-2">Privée</span>
																			@else
																				<span class="badge badge-success mr-2">Public</span>
																			@endif
																			<small class="text-muted">
																				<i class="fa fa-calendar" aria-hidden="true"></i>
																				{{$suggestion->created_at}}
																			</small>
																			<div class="pt-2">
																				<a href="#" class="btn btn-outline-primary mr-2">
																					<i class="icon-copy fi-like"></i>{{ $suggestion->likes()->count() }}
																				</a>
																				<a href="#" class="btn btn-outline-primary">
																					<i class="icon-copy fa fa-comments" aria-hidden="true"></i>{{ $suggestion->commentaires()->count() }}
																				</a>
																			</div>
																		</div>
																	</a>
																</div>
															</div>
														</div>
														
												</li>
												@endforeach
												
												
											</ul>
												@if ($listSuggestion->total() > 10)
													@include('view_admin.partials.layout.pagination', ['paginateur' => $listSuggestion])
												@endif
										@else
											<ul>
												<li>
													<div class="">
														<div class="col-lg-8 col-md-12 col-sm-12">
															<div class="blog-caption">
																	<div class="blog-by">
																		<p><strong>Aucune suggestion.</strong></p>
																	</div>
															</div>
														</div>
													</div>
												</li>
											</ul>
											
										@endif
									</div>
									
								</div>
								<div class="col-md-4 col-sm-12">
									<div class="card-box mb-30">
										<h5 class="pd-20 h5 mb-0">Categories</h5>
										<div class="list-group">
											@foreach ($categories as $categorie )
												<a href="{{ route('admin.user.userList.user_detaill', ['user' => $user->id , 'categorie_id' => $categorie->id]) }}" class="list-group-item d-flex align-items-center justify-content-between">
													{{ $categorie->titre }}
												</a>
											@endforeach
										</div>
									</div>

									{{-- <div class="card-box mb-30">
										<h5 class="pd-20 h5 mb-0">Latest Post</h5>
										<div class="latest-post">
											<ul>
												<li>
													<h4>
														<a href="#"
															>Ut enim ad minim veniam, quis nostrud
															exercitation ullamco</a
														>
													</h4>
													<span>HTML</span>
												</li>
												<li>
													<h4>
														<a href="#"
															>Lorem ipsum dolor sit amet, consectetur
															adipisicing elit</a
														>
													</h4>
													<span>Css</span>
												</li>
												<li>
													<h4>
														<a href="#"
															>Ut enim ad minim veniam, quis nostrud
															exercitation ullamco</a
														>
													</h4>
													<span>jQuery</span>
												</li>
												<li>
													<h4>
														<a href="#"
															>Lorem ipsum dolor sit amet, consectetur
															adipisicing elit</a
														>
													</h4>
													<span>Bootstrap</span>
												</li>
												<li>
													<h4>
														<a href="#"
															>Lorem ipsum dolor sit amet, consectetur
															adipisicing elit</a
														>
													</h4>
													<span>Design</span>
												</li>
											</ul>
										</div>
									</div> --}}

									{{-- <div class="card-box overflow-hidden">
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
									</div> --}}
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-wrap pd-20 mb-20 card-box">
					DeskApp - Bootstrap 4 Admin Template By
					<a href="https://github.com/dropways" target="_blank"
						>Ankit Hingarajiya</a
					>
				</div>
			</div>
		</div>
		<!-- End main containner -->
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				setTimeout(function() {
					$("#alert").fadeOut('slow');
				}, 5000); // 5 secondes
			});
		</script>
@endsection