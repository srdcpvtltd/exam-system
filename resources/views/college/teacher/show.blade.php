@extends('college.layout.index')

@section('title')
    {{$teacher->name}} Teacher
@endsection

@section('content')


				<!-- Inner container -->
				<div class="d-md-flex align-items-md-start">

					<!-- Left sidebar component -->
					<div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-left wmin-300 border-0 shadow-0 sidebar-expand-md">

						<!-- Sidebar content -->
						<div class="sidebar-content">

							<!-- Navigation -->
							<div class="card">
								<div class="card-body bg-indigo-400 text-center card-img-top" style="background-image: url({{asset('user_asset/global_assets/images/backgrounds/panel_bg.png')}}); background-size: contain;">
									<div class="card-img-actions d-inline-block mb-3">
										@if($teacher->image)
										<img class="img-fluid rounded-circle" src="{{asset($teacher->image)}}" width="170" height="170" alt="">
										@else 
										<img class="img-fluid rounded-circle" src="{{asset('user_asset/global_assets/images/placeholders/placeholder.jpg')}}" width="170" height="170" alt="">
										@endif
										<div class="card-img-actions-overlay rounded-circle">
											<a href="#" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
												<i class="icon-plus3"></i>
											</a>
											<a href="user_pages_profile.html" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">
												<i class="icon-link"></i>
											</a>
										</div>
									</div>

						    		<h6 class="font-weight-semibold mb-0">{{$teacher->name}}</h6>
						    		<span class="d-block opacity-75">{{$teacher->email}}</span>
									
									@if($teacher->is_verified)
										<span class="badge badge-success">Verified</span>
									@else
										<span class="badge badge-danger">Not Verified</span>
									@endif
									
									@if($teacher->is_active)
										<span class="badge badge-success">Active</span>
									@else
										<span class="badge badge-danger">Pending</span>
									@endif
									<br>
					    			<div class="list-icons list-icons-extended mt-3">
										
										@if($teacher->is_verified)
											<a href="{{route('college.student.revert_verification',$teacher->id)}}" class="btn btn-danger btn-sm">Revert Verification</a>
										@else 
											<a href="{{route('college.student.verified',$teacher->id)}}" class="btn btn-info btn-sm">Verify</a>
										@endif
										@if($teacher->is_active)
											<a href="{{route('college.student.in_active',$teacher->id)}}" class="btn btn-warning btn-sm">In Active</a>
										@else 
											<a href="{{route('college.student.active',$teacher->id)}}" class="btn btn-success btn-sm">Active</a>
										@endif
									</div>
						    	</div>

								<div class="card-body p-0">
									<ul class="nav nav-sidebar mb-2">
										<li class="nav-item-header">Navigation</li>
										<li class="nav-item">
											<a href="#profile" class="nav-link active" data-toggle="tab">
												<i class="icon-user"></i>
												 Basic profile
											</a>
										</li>
										<li class="nav-item-divider"></li>
										<li class="nav-item">
											<a href="{{route('college.teacher_profile.index')}}" class="nav-link" data-toggle="tab">
												<i class="icon-switch2"></i>
												Go Back To Teacher Page
											</a>
										</li>
									</ul>
								</div>
							</div>
							<!-- /navigation -->
						</div>
						<!-- /sidebar content -->

					</div>
					<!-- /left sidebar component -->


					<!-- Right content -->
					<div class="tab-content w-100 overflow-auto">
						<div class="row">
							<div class="col-md-12">
									<div class="card card-body">
										<div class="media mb-0">
											<div class="media-body">
												<h6 class="font-weight-semibold mb-0 text-center">
													{{@$teacher->teacherProfile->college->name}} College Teacher!
												</h6>
											</div>
										</div>
									</div>
									
							</div>
						</div>
						<div class="tab-pane fade active show" id="profile">


							<!-- Profile info -->
							<div class="card">
								<div class="card-header header-elements-inline">
									<h5 class="card-title">Profile information</h5>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                		<a class="list-icons-item" data-action="reload"></a>
					                		<a class="list-icons-item" data-action="remove"></a>
					                	</div>
				                	</div>
								</div>

								<div class="card-body">
									<form action="{{route('college.student.update',$teacher->id)}}" method="post" enctype="multipart/form-data" >
										@method('PUT')
										@csrf
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Username</label>
													<input type="text" name="name" value="{{$teacher->name}}" class="form-control">
												</div>
												<div class="col-md-6">
													<label>Email</label>
													<input type="email" value="{{$teacher->email}}" name="email" class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Password <small style="color:red;">(Leave It Blank if you don't want to change)</small></label>
													<input type="password" name="password" placeholder="Password" class="form-control">
												</div>
												<div class="col-md-6">
													<label>Upload profile image</label>
				                                    <input type="file" class="form-input-styled" name="image" data-fouc>
												</div>
											</div>
										</div>

				                        <div class="text-right">
				                        	<button type="submit" class="btn btn-primary">Save changes</button>
				                        </div>
									</form>
								</div>
							</div>
							<!-- /profile info -->

					    </div>
					</div>
					<!-- /right content -->

				</div>
				<!-- /inner container -->
@endsection
@section('scripts')
@endsection
