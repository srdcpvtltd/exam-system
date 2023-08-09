@extends('college.layout.index')

@section('title')
    Student Attendance
@endsection

@section('content')

<form action="{{route('college.student_attendance.store')}}" id="studentAttendanceForm" method="post" enctype="multipart/form-data" >
@csrf
<input type="hidden" name="college_id" value="{{Auth::user()->id}}">
<div class="row">
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Student Attendance</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Course</label>
                        <select  name="course_id" id="course_id" class="form-control select-search" data-fouc>
                            <option selected disabled>Select Course</option>
                            @foreach(Auth::user()->collegeCourses as $course)
                            <option value="{{$course->id}}">{{$course->course->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Semester</label>
                        <select  name="semester_id" id="semester_id"  class="form-control select-search" required data-fouc>
                            <option selected disabled>Select Semester</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Subject</label>
                        <select  name="subject_id" id="subject_id"  class="form-control select-search" required data-fouc>
                            <option selected disabled>Select Subject</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Month</label>
                        <select  name="month" class="form-control select-search" data-fouc required>
                            <option selected disabled>Select Month</option>
                            <option value="Jan">Jan</option>
                            <option value="Feb">Feb</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="Aug">Aug</option>
                            <option value="Sep">Sep</option>
                            <option value="Oct">Oct</option>
                            <option value="Nov">Nov</option>
                            <option value="Dec">Dec</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Total Classes</label>
                        <input name="total_days" type="number" class="form-control" placeholder="Enter Total Classes" required>
                    </div>
                </div>
                <p id="response" style="color:red;"></p>
                <div class="text-right">
                    <button type="button" id="search-button" class="btn btn-primary">Search <i class="icon-paperplane ml-2"></i></button>
                </div>
            </div>
        </div>
        <!-- /basic layout -->

    </div>
</div>
<div class="row" id="studentForm"></div>
</form>

@endsection

@section('scripts')
<script> 
    $(document).on('change', '#course_id', function (event) {
        course_id = $(this).val();        
        event.preventDefault();
        $.ajax({
            url: '{{url("get_semester_aganist_course")}}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: 'JSON',
            data: {
                'course_id': course_id,
            },
        })
        .done(function (data) {
            $('#semester_id').empty();
            $('#semester_id').append('<option selected disabled>Select Semester</option>');
            for (i=0;i<data.length;i++){
            $('#semester_id').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
            }
        })
    });
    $(document).on('change', '#semester_id', function (event) {
        semester_id = $(this).val();        
        event.preventDefault();
        $.ajax({
            url: '{{url("get_subject_aganist_semester")}}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: 'JSON',
            data: {
                'semester_id': semester_id,
            },
        })
        .done(function (data) {
            $('#subject_id').empty();
            $('#subject_id').append('<option selected disabled>Select Subject</option>');
            for (i=0;i<data.length;i++){
            $('#subject_id').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
            }
        })
    });
    $(document).on('click', '#search-button', function (event) {
        $('#response').html('');
        event.preventDefault();
        $.ajax({
            url: '{{route("college.student_attendance.get_student")}}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: 'JSON',
            data: $('#studentAttendanceForm').serialize(),
        })
        .done(function (data) {
            if(data.html)
            {
                $('#studentForm').html(data.html);
            }else{
                $('#response').html(data.message);
            }
        })
       .fail(function(response) {
          alert("error");
       })
       .always(function() {
         $('#overlay').fadeOut();
       });
    });
</script>
@endsection