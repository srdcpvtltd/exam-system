@extends('admin.layout.index')

@section('title')
Manage Exams
@endsection

@section('content')

<div class="card">
    
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Manage Exams</h5>
        <div class="header-elements">
            <div class="list-icons">
                <button data-toggle="modal" data-target="#add_exam_modal" class="edit-btn btn btn-primary text-right">Add New Exam</button>
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <table class="table datatable-save-state">
        <thead>
            <tr>
                <th>#</th>
                <th>Exam Name</th>
                <th>Course</th>
                <th>Semester</th>
                <th>Exam Date</th>
                <th>Students</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach (App\Models\Exam::all()  as $key => $exam)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$exam->name}}</td>
                <td>{{@$exam->course->name}}</td>
                <td>{{@$exam->semester->name}}</td>
                <td>{{@$exam->date->format('d M, Y')}}</td>
                <td>100</td>
                <td>
                    <a href="{{route('admin.exam.edit',$exam->id)}}" class="btn btn-primary btn-sm">Edit</a>
                </td>
                <td>
                    <form action="{{route('admin.exam.destroy',$exam->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                    <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="add_exam_modal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <form action="{{route('admin.exam.store')}}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Add New Exam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Exam Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter Exam Name" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Select Course</label>
                            <select name="course_id" class="form-control select-search" id="course_id" required>
                                <option value="">Select</option>
                                @foreach (App\Models\Course::all() as $course)
                                <option value="{{$course->id}}">{{$course->name}}</option>
                                @endforeach
                            </select> 
                        </div>   
                        <div class="form-group col-md-4">
                            <label>Select Semester</label>
                            <select name="semester_id" id="semester_id" class="form-control select-search" required>
                                <option >Choose Semester</option>
                            </select> 
                        </div>   
                        <div class="form-group col-md-4">
                            <label>Term</label>
                            <br>
                            <input type="radio" class="" name="term" value="MS" required> MS
                            <input type="radio" class="" name="term" value="ES" required> ES
                        </div>  
                        <div class="form-group col-md-4">
                            <label>Type</label>
                            <br>
                            <input type="radio" class="" name="type"  value="Theory" required> Theory
                            <input type="radio" class="" name="type"  value="Practical" required> Practical
                        </div>  
                        <div class="form-group col-md-4">
                            <label>Back Paper</label>
                            <br>
                            <input type="radio" class="" name="is_back_paper" value="1" required> Yes
                            <input type="radio" class="" name="is_back_paper" value="0" required> No
                        </div>   
                        <div class="form-group col-md-4">
                            <label>Attendance Required <small>(In Percentage)</small></label>
                            <input type="number" class="form-control" name="attendance_required" required>
                        </div>    
                        <div class="form-group col-md-4">
                            <label>Exam Date</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>  
                        <div class="form-group col-md-4">
                            <label>Form Start Date</label>
                            <input type="date" class="form-control" name="form_start_date" required>
                        </div>  
                        <div class="form-group col-md-4">
                            <label>Form End Date</label>
                            <input type="date" class="form-control" name="form_last_date" required>
                        </div>  
                        <div class="form-group col-md-4">
                            <label>Form Fee</label>
                            <input type="number" class="form-control" name="form_fee" required>
                        </div>  
                        <div class="form-group col-md-4">
                            <label>Late Fee</label>
                            <input type="number" class="form-control" name="late_fee" required>
                        </div>  

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Add New Exam</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#course_id').on('change',function(){
            let id = this.value;
            $.ajax({
                url: "{{route('admin.subject.get_course_semsters')}}",
                method: 'post',
                data: {
                    id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(result){
                    $('#semester_id').empty();
                    $('#semester_id').append('<option disabled>Select Semester</option>');
                    for (i=0;i<result.length;i++){
                        $('#semester_id').append('<option value="'+result[i].id+'">'+result[i].name+'</option>');
                    }
                }
            });
        });
    });
</script>
@endsection