<div class="header">
			<div class="header-left">
				{{-- <div class="menu-icon bi bi-list"></div> --}}
				<div
					class="search-toggle-icon bi bi-search"
					data-toggle="header_search"
				></div>

				<div class="header-search">
                    <form action="{{ route('suggestions.index') }}" method="GET">
						<div class="form-group mb-0">
							<i class="dw dw-search2 search-icon"></i>
							<input
								type="text"
								class="form-control search-input"
								placeholder="Search Here"
							/>
							<div class="dropdown">
								<a
									class="dropdown-toggle no-arrow"
									href="#"
									role="button"
									data-toggle="dropdown"
								>
									<i class="ion-arrow-down-c"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right">

									<div class="text-right">
										<button type="submit" class="btn btn-primary">Search</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>

			</div>

			<div class="header-right">
                @if (Auth::user()->roles()->where("titre", "admin")->exists())
                <a href="{{route('admin.acceuill')}}"><button type="button" class="btn btn-success" style="margin: 10px">
                    Admin
                </button></a>
                @endif


				<div class="dashboard-setting user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="javascript:;"
							data-toggle="right-sidebar"
						>
							<i class="dw dw-settings2"></i>
						</a>
					</div>
				</div>
				<div class="user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<i class="icon-copy dw dw-notification"></i>
							<span class="badge notification-active"></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right small">
							<div class="list-group">
								@foreach (Auth::user()->notifications  as $key => $notification)

								@if ($key>=(count(Auth::user()->notifications)-3))
								<button type="button" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#notificationModal" data-id="{{$notification->id}}">
									<div class="d-flex w-100 justify-content-between flex-column">
										<p  class="mb-1 text-truncate" style="max-width: 250px;">{{$notification->description}}</p>
										<small>
											<i class="fa fa-calendar" aria-hidden="true"></i>
											{{$notification->created_at->dayName}}, {{$notification->created_at->isoFormat("LL")}} - {{$notification->created_at->diffForHumans()}}
										</small>
									</div>
								</button>
								@endif

								@endforeach
								<a href="{{ route('user.profil') }}" class="list-group-item list-group-item-action text-center">
									<strong>Voir +</strong>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="user-info-dropdown">
					<div class="dropdown">
						<a
							class="dropdown-toggle"
							href="#"
							role="button"suggestions.index
							data-toggle="dropdown"
						>
							<span class="user-icon">
								<img src="{{asset('asset_site/vendors/images/profil.png')}}" alt="" />
							</span>

							<span class="user-name">{{ auth()->user()->pseudo }}</span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href=" {{route('user.profil')}} "
								><i class="dw dw-user1"></i> Profile</a
							>
							<a class="dropdown-item" href="{{route('user.help')}}"
								><i class="dw dw-help"></i> Aide</a
							>
							<a class="dropdown-item" href=" {{route('user.logout')}} "
								><i class="dw dw-logout"></i> Log Out</a
							>
						</div>
					</div>
				</div>
				<div class="github-link">
					<a href="https://github.com/dropways/deskapp" target="_blank"
						><img src="vendors/images/github.svg" alt=""
					/></a>
				</div>
			</div>
		</div>

<!-- bibliothèque jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- je recupere l'id dans le data-id puis je recherche le premier p contenu dans un div je recupere son contenu textuel puis je definir le contenu d'une balise donc l'id sera #noticationDescription comme etant ce texte et de meme pour la date et temps-->
<script>
	$(document).ready(function() {
		$('.list-group-item-action').click(function() {
			var id = $(this).data('id');
			var description = $(this).find('div p').text();
			var date = $(this).find('div small').text();
			$('#created_atDescription').text(date);
			$('#notificationDescription').text(description);
		});
	});
</script>
