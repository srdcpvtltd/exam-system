
{{-- <form id="studentProfileUpdateForm" action="{{route('prospect.dashboard.student_profile_update')}}" method="POST">
    @csrf --}}
    <p>Candidate's Name</p>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" value="{{Auth::user()->studentProfile->first_name}}" class="form-control" placeholder="John Doe">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Middle Name</label>
                <input type="text" name="middle_name" value="{{Auth::user()->studentProfile->middle_name}}" class="form-control" placeholder="John Doe">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" value="{{Auth::user()->studentProfile->last_name}}" class="form-control" placeholder="John Doe">
            </div>
        </div>
    </div>
    <p>Father's Name</p>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" value="{{Auth::user()->studentProfile->father_first_name}}" name="father_first_name" class="form-control" placeholder="John Doe">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Middle Name</label>
                <input type="text" value="{{Auth::user()->studentProfile->father_middle_name}}" name="father_middle_name" class="form-control" placeholder="John Doe">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" value="{{Auth::user()->studentProfile->father_last_name}}" name="father_last_name" class="form-control" placeholder="John Doe">
            </div>
        </div>
    </div>
    <p>Mother's Name</p>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="mother_first_name" value="{{Auth::user()->studentProfile->mother_first_name}}" class="form-control" placeholder="John Doe">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Middle Name</label>
                <input type="text" name="mother_middle_name" value="{{Auth::user()->studentProfile->mother_middle_name}}" class="form-control" placeholder="John Doe">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="mother_last_name" value="{{Auth::user()->studentProfile->mother_last_name}}" class="form-control" placeholder="John Doe">
            </div>
        </div>
    </div>
    <p>Guardian's Name</p>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" value="{{Auth::user()->studentProfile->guardian_first_name}}" name="guardian_first_name" class="form-control" placeholder="John Doe">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Middle Name</label>
                <input type="text" value="{{Auth::user()->studentProfile->guardian_middle_name}}" name="guardian_middle_name" class="form-control" placeholder="John Doe">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" value="{{Auth::user()->studentProfile->guardian_last_name}}" name="guardian_last_name" class="form-control" placeholder="John Doe">
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
                        <select  name="day" class="form-control select-search" data-fouc required>
                            <option selected disabled>DD</option>
                            @for($day = 1;$day <= 31;$day++)
                            <option @if(Auth::user()->studentProfile->day == $day) selected @endif value="{{$day}}">{{$day}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select  name="month" class="form-control select-search" data-fouc required>
                            <option selected disabled>MM</option>
                            @for($month = 1;$month <= 12;$month++)
                            <option @if(Auth::user()->studentProfile->month == $month) selected @endif value="{{$month}}">{{$month}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select  name="year" class="form-control select-search" data-fouc required>
                            <option selected disabled>YYYY</option>
                            @for($year = 1980;$year <= 2015;$year++)
                            <option @if(Auth::user()->studentProfile->year == $year) selected @endif value="{{$year}}">{{$year}}</option>
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
                        <input type="text" name="phone" value="{{Auth::user()->studentProfile->phone}}" class="form-control" placeholder="Contact No.">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Alternative Contact No.</label>
                        <input type="text" name="alternative_phone" value="{{Auth::user()->studentProfile->alternative_phone}}" class="form-control" placeholder="Alternative Contact No.">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" value="{{Auth::user()->email}}" readonly class="form-control" placeholder="Contact No.">
                    </div>
                </div>
    
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>Aadhar No.</label>
                <input type="text" name="aadhar_no" class="form-control" value="{{Auth::user()->studentProfile->aadhar_no}}"  placeholder="Aadhar No.">
            </div>
        </div>
        {{-- <div class="col-md-3">
            <div class="form-group">
                <label>Security Question</label>
                <select  name="security_question" class="form-control select-search" data-fouc>
                    <option selected disabled>Select Security Question</option>
                    <option @if(Auth::user()->studentProfile->security_question == 'Name of Your Birth Place') selected @endif value="Name of Your Birth Place">Name of Your Birth Place</option>
                    <option @if(Auth::user()->studentProfile->security_question == 'Name of Your First School') selected @endif  value="Name of Your First School">Name of Your First School</option>
                </select>
            </div>
        </div> --}}
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
        <button type="button" id="student-profile-button" class="btn btn-primary">Save Changes & Next <i class="icon-paperplane ml-2"></i></button>
    </div> 

</form> --}}