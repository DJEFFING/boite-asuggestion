@extends('view_site.partials.app')
@section('content')
<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="title">
									<h4>Profile</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="/">Acceuill</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Profile
										</li>
									</ol>
								</nav>

							</div>

						</div>

					</div>
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
							<div class="pd-20 card-box height-100-p">
								<div class="profile-photo">

									<img
										src="{{ asset('/asset_site/vendors/images/profil.png') }}"
										alt=""
										class="avatar-photo"
									/>
									<div
										class="modal fade"
										id="modal"
										tabindex="-1"
										role="dialog"
										aria-labelledby="modalLabel"
										aria-hidden="true"
									>
										<div
											class="modal-dialog modal-dialog-centered"
											role="document"
										>
											<div class="modal-content">
												<div class="modal-body pd-5">
													<div class="img-container">
														<img
															id="image"
															src="vendors/images/photo2.jpg"
															alt="Picture"
														/>
													</div>
												</div>
												<div class="modal-footer">
													<input
														type="submit"
														value="Update"
														class="btn btn-primary"
													/>
													<button
														type="button"
														class="btn btn-default"
														data-dismiss="modal"
													>
														Close
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<h5 class="text-center h5 mb-0">{{ $user->pseudo }}</h5>
								 <p class="text-center text-muted font-14">
									Lorem ipsum dolor sit amet
								</p>


							</div>
						</div>
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
							<div class="card-box height-100-p overflow-hidden">
								<div class="profile-tab height-100-p">
									<div class="tab height-100-p">
										<ul class="nav nav-tabs customtab" role="tablist">
											<li class="nav-item">
												<a
													class="nav-link active"
													data-toggle="tab"
													href="#timeline"
													role="tab"
													>Suggestions</a
												>
											</li>
											<li class="nav-item">
												<a
													class="nav-link"
													data-toggle="tab"
													href="#tasks"
													role="tab"
													>Notification</a
												>
											</li>
											<li class="nav-item">
												<a
													class="nav-link"
													data-toggle="tab"
													href="#setting"
													role="tab"
													>Parametre</a
												>
											</li>
										</ul>

										<div class="tab-content">
											<!-- Timeline Tab start -->

											<div
												class="tab-pane fade show active "
												id="timeline"
												role="tabpanel">

												<div class="row no-gutters">
                                                    @foreach ($suggestions as $suggestion)
                                                    <div class="page-header col-lg-11 m-3">
                                                        <a href = "{{route('suggestions.sugesstion-detaill', $suggestion->id)}}">
                                                        <div class="min-height-100px">
															<div class="col-lg-8 col-md-8 col-sm-8 m-3">
                                                                <div class="blog-caption">

                                                                    <div class="blog-by">
                                                                        <p>
                                                                            {{ $suggestion->description }}
                                                                        </p>
                                                                        <div class="pt-12" style=" text-align: center heigth:left">

                                                                                <a href="#" class="btn btn-outline-primary" style="margin-right: 10px;"
                                                                                    ><i class="icon-copy fi-like"></i> 11</a>

                                                                                <a href="#" class="btn btn-outline-primary" style="margin-right: 10px;"
                                                                                    ><i class="icon-copy fi-dislike"></i> 7</a>

                                                                                <a href="#" class="btn btn-outline-primary" style="margin-right: 10px;"
                                                                                    ><i class="icon-copy fa fa-comments" aria-hidden="true"></i> 14</a>

                                                                                <a href="#" class="btn btn-outline-primary" style="margin-right: 10px;"
                                                                                    ><i class="icon-copy dw dw-notification"></i>  12</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </a>
                                                    </div>
                                                    @endforeach

												</div>
											</div>
											<!-- Timeline Tab End -->
											<!-- Tasks Tab start -->
											<div class="tab-pane fade" id="tasks" role="tabpanel">
												<div class="pd-20 profile-task-wrap">
													<div class="container pd-0">
														<!-- Open Task start -->
                                                        @foreach ($notifications as $notification)


                                                            <div class="profile-task-list pb-30">

                                                                <ul>
                                                                    <li>

                                                                        {{ $notification->description }}
                                                                        <div class="task-assign">

                                                                            <div class="due-date">
                                                                                <span>{{ $notification->created_at }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                        @endforeach
													</div>
												</div>
											</div>
											<!-- Tasks Tab End -->
											<!-- Setting Tab start -->
											<div
												class="tab-pane fade height-100-p"
												id="setting"
												role="tabpanel"
											>
												<div class="profile-setting">
													<form action="{{ route ('user.profil.update',Auth::id()) }}" method="POST">

                                                        @csrf
														<ul class="profile-edit-list row">
															<li class="weight-500 col-md-6">
																<h4 class="text-blue h5 mb-20">
																	Edit Your Personal Setting
																</h4>
																<div class="form-group">
																	<label>Pseudo</label>
																	<input
																		class="form-control form-control-lg"
																		type="text"
                                                                        name="pseudo"
																	/>
																</div>
																<div>
                                                                    <a href="">Modifier votre mot de passe</a>
                                                                </div><br>
																<div class="form-group mb-0">
																	<input
																		type="submit"
																		class="btn btn-primary"
																		value="Modifier "
																	/>
																</div>


														</ul>
													</form>
												</div>
											</div>
											<!-- Setting Tab End -->
										</div>
									</div>
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
@endsection
