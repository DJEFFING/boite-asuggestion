<div class="header">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
				<div
					class="search-toggle-icon bi bi-search"
					data-toggle="header_search"
				></div>
				<div class="header-search">
					<form>
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
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label"
											>From</label
										>
										<div class="col-sm-12 col-md-10">
											<input
												class="form-control form-control-sm form-control-line"
												type="text"
											/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">To</label>
										<div class="col-sm-12 col-md-10">
											<input
												class="form-control form-control-sm form-control-line"
												type="text"
											/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label"
											>Subject</label
										>
										<div class="col-sm-12 col-md-10">
											<input
												class="form-control form-control-sm form-control-line"
												type="text"
											/>
										</div>
									</div>
									<div class="text-right">
										<button class="btn btn-primary">Search</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="header-right">
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

                <!-- notification Section -->
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
								@foreach (findAdminNotification()  as $key => $notification)

								@if ($key>=(count(findAdminNotification())-3))
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
                <!-- notification Section  End-->

                <div class="user-info-dropdown">
					<div class="dropdown">
						<a
							class="dropdown-toggle"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<span class="user-icon">
								<img src=" {{ asset('asset_admin/vendors/images/photo1.jpg') }} " alt="" />
							</span>
							<span class="user-name">Ross C. Lopez</span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href="profile.html"
								><i class="dw dw-user1"></i> Profile</a
							>
							<a class="dropdown-item" href="profile.html"
								><i class="dw dw-settings2"></i> Setting</a
							>
							<a class="dropdown-item" href="faq.html"
								><i class="dw dw-help"></i> Help</a
							>
							<a class="dropdown-item" href="login.html"
								><i class="dw dw-logout"></i> Log Out</a
							>
						</div>
					</div>
				</div>
				<div class="github-link">
					<a href="https://github.com/dropways/deskapp" target="_blank"
						><img src=" {{ asset('asset_admin/vendors/images/github.svg') }} " alt=""
					/></a>
				</div>
			</div>
		</div>

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
