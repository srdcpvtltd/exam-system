@extends('admin.layout.index')

@section('title')
    Student Attendance
@endsection

@section('content')

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
                <form id="studentAttendanceForm" method="POST">
                @csrf
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Colleges</label>
                            <select  name="college_id" id="college_id" class="form-control select-search" data-fouc>
                                <option selected disabled>Select College</option>
                                @foreach(App\Models\User::where('role_id',2)->where('is_verified',1)->where('is_active',1)->get() as $college)
                                <option value="{{$college->id}}">{{$college->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Course</label>
                            <select  name="course_id" id="course_id" class="form-control select-search" data-fouc>
                                <option selected disabled>Select Course</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Semester</label>
                            <select  name="semester_id" id="semester_id"  class="form-control select-search" required data-fouc>
                                <option selected disabled>Select Semester</option>
                            </select>
                        </div>
                    </div>
                    <p id="response" style="color:red;"></p>
                    <div class="text-right">
                        <button type="button" id="search-button" class="btn btn-primary">Search <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>

            </div>
        </div>
        <!-- /basic layout -->

    </div>
</div>
<div class="row" id="studentForm">
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
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table datatable-save-state">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Total Days</th>
                                        <th>No. Of Attendance</th>
                                        <th>Percentage(%)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="student_attendances_row">
                                    <tr>
                                        <td colspan="5" class="text-center">No Record</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /basic layout -->
    
    </div>
</div>

@endsection

@section('scripts')
<script> 
    $(document).on('change', '#college_id', function (event) {
        college_id = $(this).val();        
        event.preventDefault();
        $.ajax({
            url: '{{url("get_course_aganist_college")}}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: 'JSON',
            data: {
                'college_id': college_id,
            },
        })
        .done(function (data) {
            $('#course_id').empty();
            $('#course_id').append('<option selected disabled>Select College Course</option>');
            for (i=0;i<data.length;i++){
            $('#course_id').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
            }
        })
    });
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
    $(document).on('click', '#search-button', function (event) {
        $('#response').html('');
        event.preventDefault();
        $.ajax({
            url: '{{route("admin.student_attendance.get_student")}}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: 'JSON',
            data: $('#studentAttendanceForm').serialize(),
        })
        .done(function (data) {
            if(data.html)
            {
                $('#student_attendances_row').html(data.html);
            }else{
                $('#student_attendances_row').html('<tr><td colspan="4" class="text-center">No Record</td></tr>');
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
    function forcedAllowed(index)
    {
        $('#response').html('');
        event.preventDefault();
        $.ajax({
            url: '{{route("admin.student_attendance.force_allowed")}}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: 'JSON',
            data: {
                course_id : $('#course_id').val(),
                semester_id : $('#semester_id').val(),
                student_id : index
            },
        })
        .done(function (data) {
            if(data.success)
            {
                $('#allowed_student_'+ index).attr("hidden",true);
                $('#force_allowed_'+ index).attr("hidden",false);
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
    }
</script>
@endsection