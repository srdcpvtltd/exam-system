
<div class="col-md-12">
    <!-- Basic layout-->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Students</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                @foreach($studentProfiles as $key => $studentProfile)
                @if($key == 0)
                <div class="col-md-4">Sr No. <br></div>
                <div class="col-md-4">Student Name<br></div>
                <div class="col-md-4">No. Of Attendance<br></div>
                @endif
                <div class="form-group col-md-4">
                    {{$key+1}}
                </div>
                <div class="form-group col-md-4">
                    {{$studentProfile->student->name}}
                </div>
                <div class="form-group col-md-4">
                    <input type="hidden" name="student_id[]" value="{{$studentProfile->user_id}}">
                    <input name="attended_days[]" style="width:20%;" type="number" value="0" class="form-control" placeholder="Enter No. Of Attendance" required>
                </div>
                @endforeach
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Post <i class="icon-paperplane ml-2"></i></button>
            </div>
        </div>
    </div>
    <!-- /basic layout -->

</div>