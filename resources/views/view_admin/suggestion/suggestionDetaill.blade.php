@extends('view_admin.partials.app')
@section('content')
<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class=" col-md-5 col-sm-12">
								<div class="title">
									<nav aria-label="breadcrumb" role="navigation">
										<ol class="breadcrumb">
											<li class="breadcrumb-item active" aria-current="page">
												Pseudo : {{$suggestion->pseudo}}
												<div class="d-flex justify-content-between">
													
													
												</div>
											</li>
										</ol>
									</nav>
								</div>
							</div>
							<div class=" col-md-7  pl-5" style="display: center">
								<button type="button" class=" btn btn-primary btn-lg" data-toggle="modal" data-target="#notify{{ $suggestion->id }}">
									Envoyer une Notification
								</button>
								@include('view_admin.global-modal.notify-modal',["username"=>$suggestion->pseudo, "id"=>$suggestion->id ,'url'=>route('admin.user.userList.notify-user', $suggestion->id )])
							</div>
						</div>
						<hr>
						<div class="row">
							<div class=" col-sm-12">
								<div class="title">
									<h4>Informations personnelles de l'utilisateur</h4>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="title d-flex align-items-center justify-content-between">
									<p>Nom User: {{$suggestion->vrai_nom}}</p>
									<p>Filiere: {{$suggestion->filiere}}</p>
									<p>Niveau: {{$suggestion->niveau_etude}}</p>
								</div>
								
							</div>
						</div>
					</div>
					<div class="blog-wrap">
						<div class="container pd-0">
							<div class="row">
								<div class="col-md-8 col-sm-12">
									<div class="blog-detail card-box overflow-hidden mb-30">
										<div class="blog-caption">
											<h4 class="mb-10">
												{{$suggestion->object}}
											</h4>
											<p>
												{{$suggestion->description}}
											</p>
											<br>
											<hr>
											@if ($suggestion->status == 1)
												<span class="badge badge-danger">Privée</span>
											@else
												<span class="badge badge-success">Public</span>
											@endif
											<small>
												<i class="fa fa-calendar" aria-hidden="true"></i>
												{{$suggestion->created_at->dayName}}, {{$suggestion->created_at->isoFormat("LL")}} - {{$suggestion->created_at->diffForHumans()}}
											</small>
										</div>
										
									</div>
									@foreach ($commantaires as $commentaire)

										<div class="card-box">
											<h6 class="card-header">
												{{$commentaire->pseudo}}
											</h6>
											<p class="card-body">
												{{$commentaire->comment_value}}
											</p>
										</div>

									@endforeach
								</div>
								<div class="col-md-4 col-sm-12">
									<div class="card-box mb-30">
										<h5 class="pd-20 h5 mb-0">Likes</h5>
										 <div class="list-group">
										</div>
									</div>
									<div class="card-box mb-30">
										<h5 class="pd-20 pb-0 h5 mb-0">Commentaires</h5>
										<div class="latest-post ">
											<button type="button" class="btn btn-primary btn-lg mx-3 my-2" data-toggle="modal" data-target="#addSuggestion">
												Ajouter un Commentaire
											</button>

										</div>
									</div>
									<div class="card-box overflow-hidden">
										<h5 class="pd-20 h5 mb-0">Archives</h5>
										<div class="list-group">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
