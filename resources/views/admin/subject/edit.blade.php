@extends('admin.layout.index')

@section('title')
    Edit {{$subject->name}} Subject
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Edit {{$subject->name}} Subject</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{route('admin.subject.update',$subject->id)}}" method="post" enctype="multipart/form-data" >
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Subject Name</label>
                            <input name="name" type="text" value="{{$subject->name}}" class="form-control" placeholder="Enter Subject Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Subject Code</label>
                            <input name="code" type="text" value="{{$subject->code}}" class="form-control" placeholder="Enter Subject Code" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Subject Type</label>
                            <input name="type" type="text" value="{{$subject->type}}" class="form-control" placeholder="Enter Subject Type" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Select Course</label>
                            <select name="course_id" class="form-control" id="course_id" required>
                                <option value="">Select</option>
                                @foreach (App\Models\Course::all() as $course)
                                <option @if($subject->course_id == $course->id) selected @endif value="{{$course->id}}">{{$course->name}}</option>
                                @endforeach
                            </select> 
                        </div>   
                        <div class="form-group col-md-6">
                            <label>Select Semester</label>
                            <select name="semester_id" id="semester_id" class="form-control" required>
                                <option selected value="{{$subject->semester_id}}">{{$subject->semester->name}}</option>
                            </select> 
                        </div>   
                   
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Edit <i class="icon-paperplane ml-2"></i></button>
                    </div>
                    
                </form>
            </div>
        </div>
        <!-- /basic layout -->

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