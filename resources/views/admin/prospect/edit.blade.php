@extends('admin.layout.index')

@section('title')
    {{$prospect->name}} Prospect
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
										@if($prospect->image)
										<img class="img-fluid rounded-circle" src="{{asset($prospect->image)}}" width="170" height="170" alt="">
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

						    		<h6 class="font-weight-semibold mb-0">{{$prospect->name}}</h6>
						    		<span class="d-block opacity-75">{{$prospect->email}}</span>
									
									@if($prospect->is_verified)
										<span class="badge badge-success">Verified</span>
									@else
										<span class="badge badge-danger">Not Verified</span>
									@endif
									
									@if($prospect->is_active)
										<span class="badge badge-success">Active</span>
									@else
										<span class="badge badge-danger">Pending</span>
									@endif
									<br>
					    			<div class="list-icons list-icons-extended mt-3">
										
										@if($prospect->is_verified)
											<a href="{{route('admin.user.revert_verification',$prospect->id)}}" class="btn btn-danger btn-sm">Revert Verification</a>
										@else 
											<a href="{{route('admin.user.verified',$prospect->id)}}" class="btn btn-info btn-sm">Verify</a>
										@endif
										@if($prospect->is_active)
											<a href="{{route('admin.user.in_active',$prospect->id)}}" class="btn btn-warning btn-sm">In Active</a>
										@else 
											<a href="{{route('admin.user.active',$prospect->id)}}" class="btn btn-success btn-sm">Active</a>
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
										{{-- <li class="nav-item">
											<a href="#schedule" class="nav-link" data-toggle="tab">
												<i class="icon-users"></i>
												Student Profile
											</a>
										</li> --}}
										{{-- <li class="nav-item">
											<a href="#inbox" class="nav-link" data-toggle="tab">
												<i class="icon-book"></i>
												Student Addresses
											</a>
										</li> --}}
										<li class="nav-item-divider"></li>
										<li class="nav-item">
											<a href="{{route('admin.prospect.index')}}" class="nav-link" data-toggle="tab">
												<i class="icon-switch2"></i>
												Go Back To Prospect Page
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
									<form action="{{route('admin.prospect.update',$prospect->id)}}" method="post" enctype="multipart/form-data" >
										@method('PUT')
										@csrf
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Username</label>
													<input type="text" name="name" value="{{$prospect->name}}" class="form-control">
												</div>
												<div class="col-md-6">
													<label>Email</label>
													<input type="email" value="{{$prospect->email}}" name="email" class="form-control">
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

					    {{-- <div class="tab-pane fade" id="schedule">
							<div class="card">
								<div class="card-header header-elements-inline">
									<h5 class="card-title">Student Profile information</h5>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                		<a class="list-icons-item" data-action="reload"></a>
					                		<a class="list-icons-item" data-action="remove"></a>
					                	</div>
				                	</div>
								</div>
								@if($student->studentProfile)
								<div class="card-body">
									<form action="{{route('admin.student_profile.update',$student->studentProfile->id)}}" method="post" enctype="multipart/form-data" >
										@method('PUT')
										@csrf
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>College</label>
													<select name="college_id" class="form-control">
														<option selected disabled >Select College</option>
														@foreach(App\Models\User::where('role_id',2)->where('is_verified',1)->where('is_active',1)->get() as $college)
														<option @if($student->studentProfile->college_id == $college->id) selected @endif value="{{$college->id}}">{{$college->name}}</option>
														@endforeach
													</select>
												</div>
												<div class="col-md-6">
													<label>Course</label>
													<select name="course_id" class="form-control">
														<option selected disabled >Select Course</option>
														@foreach(App\Models\CollegeCourse::where('user_id',$student->studentProfile->college_id)->get() as $course)
														<option @if($student->studentProfile->course_id == $course->id) selected @endif value="{{$course->id}}">{{$course->course->name}}</option>
														@endforeach
													</select>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-4">
													<label>Enrollment Year</label>
													<select  name="enrollment_year"  class="form-control select-search" data-fouc>
														<option selected disabled>Select Enrollment Year</option>
														@for($i = 2015;$i < 2031;$i++)
														<option @if($student->studentProfile->enrollment_year == $i) selected @endif  value="{{$i}}">{{$i}}</option>
														@endfor
													</select>
												</div>
												<div class="col-md-4">
													<label>Roll Number</label>
													<input type="text" class="form-control" value="{{@$student->studentProfile->roll_number}}"  placeholder="Student Roll Number" name="roll_number">
												</div>
												<div class="col-md-4">
													<label>Phone</label>
													<input type="text" class="form-control" value="{{@$student->studentProfile->phone}}" placeholder="Student Phone" name="phone">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-4">
													<label>Father Name</label>
													<input type="text" class="form-control" value="{{@$student->studentProfile->fathers_name}}" placeholder="Student Father Name" name="fathers_name">
												</div>
												<div class="col-md-4">
													<label>Mother Name</label>
													<input type="text" class="form-control" value="{{@$student->studentProfile->mother_name}}" placeholder="Student Father Name" name="fathers_name">
												</div>
												<div class="col-md-4">
													<label>Blood Group</label>
													<input type="text" class="form-control" value="{{@$student->studentProfile->blood_group}}" placeholder="Student Blood Group" name="blood_group">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-4">
													<label>DOB <span class="badge badge-success">{{@$student->studentProfile->date_of_birth}}</span></label>
													<input type="date" class="form-control" value="{{old('date_of_birth')}}" placeholder="Student Blood Group" name="date_of_birth">
												</div>
												<div class="col-md-4">
													<label>Nationality</label>
													<input type="text" class="form-control" value="{{@$student->studentProfile->nationality}}" placeholder="Student Nationality" name="nationality">
												</div>
												<div class="col-md-4">
													<label>Gender</label>
													<br>
													<input type="radio" @if(@$student->studentProfile->gender == "Male") checked @endif name="gender"  value="Male" class=""> Male 
													<input type="radio" @if(@$student->studentProfile->gender == "Female") checked @endif  name="gender" value="Female" class=""> Female 
													<input type="radio" @if(@$student->studentProfile->gender == "Sehmale") checked @endif  name="gender" value="Sehmale" class=""> Sehmale 
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
									<h6 class="card-title">Student Profile Addresses</h6>

								</div>
								
								<table class="table datatable-save-state table-responsive">
									<thead>
										<tr>
											<th>#</th>
											<th>Type</th>
											<th>Address</th>
											<th>Country</th>
											<th>State</th>
											<th>City</th>
											<th>Landmark</th>
											<th>Town</th>
											<th>Pin</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($student->studentProfileAddresses  as $key => $address)
										<tr>
											<td>{{$key+1}}</td>
											<td>{{$address->type}}</td>
											<td>{{$address->address}}</td>
											<td>{{@$address->country->name}}</td>
											<td>{{@$address->state->name}}</td>
											<td>{{@$address->city->name}}</td>
											<td>{{$address->landmark}}</td>
											<td>{{$address->town}}</td>
											<td>{{$address->pin}}</td>
										</tr>
										@endforeach
									</tbody>
								</table>

							</div>
							<!-- /my inbox -->

				    	</div> --}}
					</div>
					<!-- /right content -->

				</div>
				<!-- /inner container -->
@endsection
@section('scripts')
@endsection
