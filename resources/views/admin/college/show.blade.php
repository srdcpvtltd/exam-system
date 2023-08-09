@extends('admin.layout.index')

@section('title')
    {{$college->name}} College
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
										@if($college->image)
										<img class="img-fluid rounded-circle" src="{{asset($college->image)}}" width="170" height="170" alt="">
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

						    		<h6 class="font-weight-semibold mb-0">{{$college->name}}</h6>
						    		<span class="d-block opacity-75">{{$college->email}}</span>
									
									@if($college->is_verified)
										<span class="badge badge-success">Verified</span>
									@else
										<span class="badge badge-danger">Not Verified</span>
									@endif
									
									@if($college->is_active)
										<span class="badge badge-success">Active</span>
									@else
										<span class="badge badge-danger">Pending</span>
									@endif
									<br>
					    			<div class="list-icons list-icons-extended mt-3">
										
										@if($college->is_verified)
											<a href="{{route('admin.user.revert_verification',$college->id)}}" class="btn btn-danger btn-sm">Revert Verification</a>
										@else 
											<a href="{{route('admin.user.verified',$college->id)}}" class="btn btn-info btn-sm">Verify</a>
										@endif
										@if($college->is_active)
											<a href="{{route('admin.user.in_active',$college->id)}}" class="btn btn-warning btn-sm">In Active</a>
										@else 
											<a href="{{route('admin.user.active',$college->id)}}" class="btn btn-success btn-sm">Active</a>
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
										<li class="nav-item">
											<a href="#schedule" class="nav-link" data-toggle="tab">
												<i class="icon-users"></i>
												College Profile
											</a>
										</li>
										<li class="nav-item">
											<a href="#inbox" class="nav-link" data-toggle="tab">
												<i class="icon-book"></i>
												College Courses
											</a>
										</li>
										@if($college->collegeProfile && $college->collegeProfile->document)
										<li class="nav-item">
											<a href="{{route('admin.college_profile.download',$college->collegeProfile->id)}}" target="_blank" class="nav-link">
												<i class="icon-download"></i>
												Download Document
											</a>
										</li>
										@endif
										<li class="nav-item-divider"></li>
										<li class="nav-item">
											<a href="{{route('admin.college.index')}}" class="nav-link" data-toggle="tab">
												<i class="icon-switch2"></i>
												Go Back To College Page
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
									<form action="{{route('admin.college.update',$college->id)}}" method="post" enctype="multipart/form-data" >
										@method('PUT')
										@csrf
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Username</label>
													<input type="text" name="name" value="{{$college->name}}" class="form-control">
												</div>
												<div class="col-md-6">
													<label>Email</label>
													<input type="email" value="{{$college->email}}" name="email" class="form-control">
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

					    <div class="tab-pane fade" id="schedule">
							<div class="card">
								<div class="card-header header-elements-inline">
									<h5 class="card-title">College Profile information</h5>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                		<a class="list-icons-item" data-action="reload"></a>
					                		<a class="list-icons-item" data-action="remove"></a>
					                	</div>
				                	</div>
								</div>
								@if($college->collegeProfile)
								<div class="card-body">
									<form action="{{route('admin.college_profile.update',$college->collegeProfile->id)}}" method="post" enctype="multipart/form-data" >
										@method('PUT')
										@csrf
										<div class="form-group">
											<div class="row">
												<div class="col-md-4">
													<label>College Name</label>
													<input type="text" name="college_name" value="{{@$college->collegeProfile->college_name}}" class="form-control">
												</div>
												<div class="col-md-4">
													<label>Principal Name</label>
													<input type="text" value="{{@$college->collegeProfile->principal_name}}" name="principal_name" class="form-control">
												</div>
												<div class="col-md-4">
													<label>Phone</label>
													<input type="text" value="{{@$college->collegeProfile->phone}}" name="phone" class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-4">
													<label>State</label>
													<select  name="state_id" id="college_state_id"  class="form-control select-search" data-fouc>
														<option selected disabled>Select State</option>
														@foreach(App\Models\State::all() as $state)
														<option @if($college->collegeProfile->state_id == $state->id) selected @endif value="{{$state->id}}">{{$state->name}}</option>
														@endforeach
													</select>
												</div>
												<div class="col-md-4">
													<label>City</label>
													<select  name="city_id" id="college_city_id"  class="form-control select-search" data-fouc>
														<option selected disabled>Select City</option>
														@foreach($college->collegeProfile->state->cities as $city)
														<option @if($college->collegeProfile->city_id == $city->id) selected @endif value="{{$city->id}}">{{$city->name}}</option>
														@endforeach
													</select>
												</div>
												<div class="col-md-4">
													<label>District</label>
													<input type="text" name="district" value="{{@$college->collegeProfile->district}}" class="form-control">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-4">
													<label>Year of Establishment</label>
													<input type="text" name="year_of_establishment" value="{{@$college->collegeProfile->year_of_establishment}}" class="form-control">
												</div>
												<div class="col-md-4">
													<label>Address</label>
													<input type="text" name="address" value="{{@$college->collegeProfile->address}}" class="form-control">
												</div>
												<div class="col-md-4">
													<label>Certificate</label>
													<input type="text" name="certificate" value="{{@$college->collegeProfile->certificate}}" class="form-control">
												</div>
											</div>
										</div>

				                        <div class="text-right">
				                        	<button type="submit" class="btn btn-primary">Save changes</button>
				                        </div>
									</form>
								</div>
								@endif
							</div>

				    	</div>

					    <div class="tab-pane fade" id="inbox">

							<!-- My inbox -->
							<div class="card">
								<div class="card-header bg-transparent header-elements-inline">
									<h6 class="card-title">College Courses</h6>

								</div>
								
								<table class="table datatable-save-state">
									<thead>
										<tr>
											<th>#</th>
											<th>Course Name</th>
											<th>Course Seats</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($college->collegeCourses  as $key => $course)
										<tr>
											<td>{{$key+1}}</td>
											<td>{{@$course->course->name}}</td>
											<td>{{$course->seats}}</td>
										</tr>
										@endforeach
									</tbody>
								</table>

							</div>
							<!-- /my inbox -->

				    	</div>
					</div>
					<!-- /right content -->

				</div>
				<!-- /inner container -->
@endsection
@section('scripts')
<script>
	
    $(document).on('change', '#college_state_id', function (event) {
        state_id = $(this).val();
        $.ajax({
            url: '{{url("get_city_against_states")}}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: 'JSON',
            data: {
                'state_id': state_id,
            },
        })
        .done(function (data) {
            $('#college_city_id').empty();
            $('#college_city_id').append('<option disabled>Select City</option>');
            for (i=0;i<data.length;i++){
                $('#college_city_id').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
            }
        });
    });
</script>
@endsection
