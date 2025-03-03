@extends('view_site.partials.layout.login.app')
@section('content')
	<body class="login-page">
		<div class="login-header box-shadow">
			<div
				class="container-fluid d-flex justify-content-between align-items-center"
			>
				<div class="brand-logo">
					<a href="login.html">
						<img src=" {{asset('asset_site/vendors/images/deskapp-logo.svg')}} " alt="" />
					</a>
				</div>
				<div class="login-menu">
					<ul>
						<li><a href=" {{route('user.login-page')}} ">Login</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div
			class="login-wrap d-flex align-items-center flex-wrap justify-content-center"
		>

			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6 col-lg-7">
						<img src=" {{asset('asset_site/vendors/images/login-page-img.png')}} " alt="" />
					</div>
					<div class="col-md-6 col-lg-5">
						<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title">
								<h2 class="text-center text-primary">Register To DeskApp</h2>
							</div>

                            @if (session()->has('error'))
                                <div class="alert alert-danger">{{ session()->get('error') }}</div>
                            @endif

							<form action=" {{ route('user.register') }} " method="POST" >
                                @csrf
								<div class="input-group custom">
									<input

										type="text"
										class="form-control form-control-lg"
										placeholder="Username"
                                        name="pseudo"
                                        value={{ old('pseudo') }}
									>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="icon-copy dw dw-user1"></i
										></span>
									</div>
								</div>

                                @error('pseudo')
                                    <div class="text text-danger">
                                        <p>{{ $message }}</p>
                                    </div>
                                @enderror

								<div class="input-group custom">
									<input
										type="password"
										class="form-control form-control-lg"
										placeholder="**********"
                                        name="password"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="dw dw-padlock1"></i
										></span>
									</div>

								</div>

                                @error('password')
                                    <div class="text text-danger">
                                        <p>{{ $message }}</p>
                                    </div>
                                @enderror

                                <div class="input-group custom">
									<input
										type="password"
										class="form-control form-control-lg"
										placeholder=" confirm your password "
                                        name="password_confirmation"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="dw dw-padlock1"></i
										></span>
									</div>

								</div>

                                @error('password_confirmation')
                                    <div class="text text-danger">
                                        <p>{{ $message }}</p>
                                    </div>
                                @enderror

								<div class="row pb-30">

								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">

											<button
												type="submit"
												class="btn btn-primary btn-lg btn-block"
												href="index"
												>Sign Up</button
											>
										</div>
										<div
											class="font-16 weight-600 pt-10 pb-10 text-center"
											data-color="#707373"
										>
											OR
										</div>
										<div class="input-group mb-0">
											<a
												class="btn btn-outline-primary btn-lg btn-block"
												href="register.html"
												>Connect To your Account</a
											>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection


