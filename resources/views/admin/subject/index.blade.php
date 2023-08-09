@extends('admin.layout.index')

@section('title')
Manage Subjects
@endsection

@section('content')

<div class="card">
    
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Manage Subjects</h5>
        <div class="header-elements">
            <div class="list-icons">
                <button data-toggle="modal" data-target="#add_subject_modal" class="edit-btn btn btn-primary text-right">Add New Subject</button>
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <table class="table datatable-save-state">
        <thead>
            <tr>
                <th>#</th>
                <th>Subject Name</th>
                <th>Subject Code</th>
                <th>Subject Type</th>
                <th>Semster Name</th>
                <th>Course Name</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach (App\Models\Subject::all()  as $key => $subject)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$subject->name}}</td>
                <td>{{$subject->code}}</td>
                <td>{{$subject->type}}</td>
                <td>{{@$subject->course->name}}</td>
                <td>{{@$subject->semester->name}}</td>
                <td>
                    <a href="{{route('admin.subject.edit',$subject->id)}}" class="btn btn-primary btn-sm">Edit</a>
                </td>
                <td>
                    <form action="{{route('admin.subject.destroy',$subject->id)}}" method="POST">
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

<div id="add_subject_modal" class="modal fade">
    <div class="modal-dialog">
        <form action="{{route('admin.subject.store')}}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Add New Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Subject Name</label>
                        <input name="name" type="text" class="form-control" placeholder="Enter Subject Name" required>
                    </div>
                    <div class="form-group">
                        <label>Subject Code</label>
                        <input name="code" type="text" class="form-control" placeholder="Enter Subject Code" required>
                    </div>
                    <div class="form-group">
                        <label>Subject Type (Theory / Practical)</label>
                        <input name="type" type="text" class="form-control" placeholder="Enter Subject Type" required>
                    </div>
                    <div class="form-group">
                        <label>Select Course</label>
                        <select name="course_id" class="form-control" id="course_id" required>
                            <option value="">Select</option>
                            @foreach (App\Models\Course::all() as $course)
                            <option value="{{$course->id}}">{{$course->name}}</option>
                            @endforeach
                        </select> 
                    </div>   
                    <div class="form-group">
                        <label>Select Semester</label>
                        <select name="semester_id" id="semester_id" class="form-control" required>
                            <option >Choose Semester</option>
                        </select> 
                    </div>   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Add New Subject</button>
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