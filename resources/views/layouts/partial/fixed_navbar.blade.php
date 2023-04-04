<nav class="hk-navbar navbar navbar-expand-xl navbar-light fixed-top">
			<div class="container-fluid">
			<!-- Start Nav -->
			<div class="nav-start-wrap">
				<!-- Brand -->
				<a class="navbar-brand d-xl-flex d-none" href="index.html">
					<img class="brand-img img-fluid"  src="{{asset('asset/dist/img/logo-light.png')}}" alt="brand" />
				</a>
				<!-- /Brand -->
				<button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle d-xl-none"><span class="icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span></button>

				<!-- Search -->
				<form class="dropdown navbar-search">
					<!-- <div class="dropdown-toggle no-caret" data-bs-toggle="dropdown" data-dropdown-animation data-bs-auto-close="outside">
						<a href="#" class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover  d-xl-none"><span class="icon"><span class="feather-icon"><i data-feather="search"></i></span></span></a>
						<div class="input-group d-xl-flex d-none">
							<span class="input-affix-wrapper input-search affix-border">
								<input type="text" class="form-control  bg-transparent"  data-navbar-search-close="false" placeholder="Search..." aria-label="Search">
								<span class="input-suffix">
									<span class="btn-input-clear"><i class="bi bi-x-circle-fill"></i></span>
									<span class="spinner-border spinner-border-sm input-loader text-primary" role="status">
										<span class="sr-only">Loading...</span>
									</span>
								</span>
							</span>
						</div>
					</div> -->
					<!-- <div  class="dropdown-menu p-0">
						<div class="dropdown-item d-xl-none bg-transparent">
							<div class="input-group mobile-search">
								<span class="input-affix-wrapper input-search">
									<input type="text" class="form-control" placeholder="Search..." aria-label="Search">
									<span class="input-suffix">
										<span class="btn-input-clear"><i class="bi bi-x-circle-fill"></i></span>
										<span class="spinner-border spinner-border-sm input-loader text-primary" role="status">
											<span class="sr-only">Loading...</span>
										</span>
									</span>
								</span>
							</div>
						</div>
					</div> -->
				</form>
				<!-- /Search -->
			</div>
			<!-- /Start Nav -->

			<!-- End Nav -->
			<div class="nav-end-wrap">
				<ul class="navbar-nav flex-row">

					<li class="nav-item">
						<div class="dropdown ps-2">
							<a class=" dropdown-toggle no-caret" href="#" role="button" data-bs-display="static" data-bs-toggle="dropdown" data-dropdown-animation data-bs-auto-close="outside" aria-expanded="false">
								<div class="avatar avatar-rounded avatar-xs">
									<img src="{{asset('asset/dist/img/avatar12.jpg')}}" alt="user" class="avatar-img">
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<div class="p-2">
									<div class="media">

										<div class="media-body">
											<div class="dropdown">
												<a href="" class="d-block  link-dark fw-medium"  >{{Auth::user()->name}}</a>

											</div>
											<div class="fs-7">{{Auth::user()->email}}</div>

										</div>
									</div>
								</div>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{url('/profile/page')}}">Profile</a>

								<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

							</div>
						</div>
					</li>
				</ul>
			</div>
			<!-- /End Nav -->
			</div>
		</nav>
