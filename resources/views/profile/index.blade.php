@extends('layouts.dashboard')
@section('content')
<div class="container-xxl">
				

				<!-- Page Body -->
				<div class="card">
					<div class="card-header">
						Edit Profile
					</div>
					<div class="card-body">
						<div class="hk-pg-body">
							<div class="row edit-profile-wrap">
								<div class="col-lg-2 col-sm-3 col-4">
									<div class="nav-profile mt-4">
										<div class="nav-header">
											<span>Account</span>
										</div>
										<ul class="nav nav-light nav-vertical nav-tabs">
											<li class="nav-item">
												<a data-bs-toggle="tab" href="#tab_block_1" class="nav-link active">
													<span class="nav-link-text">Public Profile</span>
												</a>
											</li>
											<li class="nav-item">
												<a data-bs-toggle="tab" href="#tab_block_2" class="nav-link">
													<span class="nav-link-text">Account Settings</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-lg-10 col-sm-9 col-8">
									<div class="tab-content">
										<div class="tab-pane fade show active" id="tab_block_1">
										<form action="{{url('admin/profile/update/'.$user->id)}}" method="POST" enctype="multipart/form-data" >

												@csrf
												<div class="row gx-3">
													<div class="col-sm-12">
														<div class="form-group">
															<div class="media align-items-center">
																<div class="media-head me-5">
																	<div class="avatar avatar-rounded avatar-xxl">
																	<img src="../../../../{{$user->profile}}" alt="user" class="avatar-img">
																	</div>
																</div>
																<div class="media-body">
																	<div class="btn btn-soft-primary btn-file mb-1">
																		Update Photo
																		<input type="file" value="{{$user->profile}}" class="upload" name="profile">
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="title title-xs title-wth-divider text-primary text-uppercase my-4"><span>Personal Info</span></div>
												<div class="row gx-3">
													<div class="col-sm-6">
														<div class="form-group">
															<label class="form-label">First Name</label>
															<input class="form-control" name="fname" type="text" value="{{$user->firstname}}"/>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label class="form-label">Last Name</label>
															<input class="form-control" name="lname" type="text" value="{{$user->lastname}}"/>
														</div>
													</div>
												</div>
												<div class="row gx-3">
													<div class="col-sm-6">
														<div class="form-group">
															<label class="form-label">Address</label>
															<input class="form-control" name="address" type="tetx" value="{{$user->address}}"/>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label class="form-label">Date of birth</label>
															<input class="form-control" name="dob" type="date" value="{{$user->dob}}"/>
														</div>
													</div>

													<div class="col-sm-6">
														<div class="form-group">
															<label class="form-label">Phone</label>
															<input class="form-control" name="phone" type="number" value="{{$user->phone}}"/>
														</div>
													</div>

													<div class="col-sm-6">
														<div class="form-group">
															<label class="form-label">Postal</label>
															<input class="form-control" name="postal" type="number" value="{{$user->postal}}"/>
														</div>
													</div>	
													<div class="col-sm-6">
														<div class="form-group">
															<label class="form-label">City</label>
															<input class="form-control" type="text" name="city" value="{{$user->city}}"/>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label class="form-label">Country</label>
															<input class="form-control" type="text" name="country" value="{{$user->country}}"/>
														</div>
													</div>
												</div>

												<button type="submit" class="btn btn-primary mt-5">Save Changes</button>
											</form>
										</div>






										<div class="tab-pane fade" id="tab_block_2">
											<div class="title-lg fs-4"><span>Account Settings</span></div>
											<form action="{{url('admin/profile/update2/'.$user->id)}}" method="POST" enctype="multipart/form-data" >
												@csrf
												<div class="row gx-3">
													<div class="col-sm-12">
														<div class="form-group">
															<label class="form-label">Username</label>
															<input class="form-control" type="text" name="name" value="{{$user->name}}"/>
														</div>
													</div>
												</div>
												<div class="row gx-3">
													<div class="col-sm-12">
														<div class="form-group">
															<label class="form-label">Email</label>
															<input class="form-control" type="text" name="email" value="{{$user->email}}"/>
																@error('email')
																	<span class="text-danger">{{$message}}</span>
																@enderror
														</div>
													</div>
												</div>
												<div class="row gx-3">
													<div class="col-sm-12">
														<div class="form-group">
															<label class="form-label">Change Password</label>
															<input class="form-control" type="text" id="password" name="password"/>
														</div>
													</div>
												</div>
												<button type="submit" id="submit1" class="btn btn-primary mt-5">Save Changes</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Page Body -->		
			</div>




@endsection