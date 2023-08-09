
{{-- <form id="studentProfileCreateForm" action="{{route('prospect.dashboard.student_profile_create')}}" method="POST">
    @csrf --}}
    <p>Candidate's Name</p>
    <div class="row">
        <div class="col-md-4">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" required name="first_name" value="" class="form-control" placeholder="John Doe">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Middle Name</label>
                <input type="text" required name="middle_name" value="" class="form-control" placeholder="John Doe">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" required name="last_name" value="" class="form-control" placeholder="John Doe">
            </div>
        </div>
    </div>
    <p>Father's Name</p>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" required value="" name="father_first_name" class="form-control" placeholder="John Doe">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Middle Name</label>
                <input type="text" required value="" name="father_middle_name" class="form-control" placeholder="John Doe">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" required value="" name="father_last_name" class="form-control" placeholder="John Doe">
            </div>
        </div>
    </div>
    <p>Mother's Name</p>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" required name="mother_first_name" value="" class="form-control" placeholder="John Doe">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Middle Name</label>
                <input type="text" required name="mother_middle_name" value="" class="form-control" placeholder="John Doe">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" required name="mother_last_name" value="" class="form-control" placeholder="John Doe">
            </div>
        </div>
    </div>
    <p>Guardian's Name</p>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" value="" name="guardian_first_name" class="form-control" placeholder="John Doe">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Middle Name</label>
                <input type="text" value="" name="guardian_middle_name" class="form-control" placeholder="John Doe">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" value="" name="guardian_last_name" class="form-control" placeholder="John Doe">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row col-md-12">
                <p>Date Of Birth</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <select  name="day" class="form-control " required>
                            <option disabled>DD</option>
                            @for($day = 1;$day <= 31;$day++)
                            <option value="{{$day}}">{{$day}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select  name="month" class="form-control " required>
                            <option  value="" selected disabled>MM</option>
                            @for($month = 1;$month <= 12;$month++)
                            <option value="{{$month}}">{{$month}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select   name="year" class="form-control " required>
                            <option value="" selected disabled>YYYY</option>
                            @for($year = 1980;$year <= 2015;$year++)
                            <option value="{{$year}}">{{$year}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
    
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Contact No.</label>
                        <input type="text" required name="phone" value="" class="form-control" placeholder="Contact No.">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Alternative Contact No.</label>
                        <input type="text" required name="alternative_phone" value="" class="form-control" placeholder="Alternative Contact No.">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" required name="email" value="{{Auth::user()->email}}" readonly class="form-control" placeholder="Contact No.">
                    </div>
                </div>
    
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>Aadhar No.</label>
                <input type="text" maxlength="12" required minlength="12" name="aadhar_no" class="form-control" value=""  placeholder="Aadhar No.">
            </div>
        </div>
        {{-- <div class="col-md-3">
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>OTP</label>
                <input type="text" name="otp" class="form-control" placeholder="OTP">
            </div>
        </div> --}}
    </div>
    {{-- <div class="text-right" style="margin-top:10px;">
        <button type="submit" class="btn btn-primary">Next <i class="icon-paperplane ml-2"></i></button>
    </div> 

</form> --}}