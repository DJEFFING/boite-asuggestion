@extends('view_site.partials.app')
@section('content')
<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="title d-flex align-items-center justify-content-between">
									<h4>Nom User: {{$suggestion->vrai_nom}}</h4>
									<h4>Filiere: {{$suggestion->filiere}}</h4>
									<h4>Niveau: {{$suggestion->niveau_etude}}</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="/">Acceuil</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											{{$suggestion->user->pseudo}}
										</li>
									</ol>
								</nav>
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
										</div>
									</div>
									@foreach ($suggestion->commentaires as $commentaire)

										<div class="card-box">
											<h6 class="card-header">
												{{$commentaire->user->pseudo}}
											</h6>
											<p class="card-body">
												{{$commentaire->comment_text}}
											</p>
										</div>

									@endforeach
								</div>
								<div class="col-md-4 col-sm-12">
									<div class="card-box mb-30">

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

										 <div class="list-group">
										</div>
									</div>
									<div class="card-box mb-30">
										<h5 class="pd-20 pb-0 h5 mb-0">Commentaires</h5>
										<div class="latest-post ">
											<button type="button" class="btn btn-primary btn-lg mx-3 my-2" data-toggle="modal" data-target="#comment{{$suggestion->id}}">
												Ajouter un Commentaire
											</button>

										</div>

									</div>
									{{-- <div class="card-box overflow-hidden">
										<h5 class="pd-20 h5 mb-0">Archives</h5>
										<div class="list-group">
										</div>
									</div> --}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        {{-- @include('view_site.partials.modal.commentModal') --}}
        @include('view_site.partials.modal.comment-modal',['id'=>$suggestion->id])
@endsection
