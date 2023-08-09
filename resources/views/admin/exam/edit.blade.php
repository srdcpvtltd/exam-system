@extends('admin.layout.index')

@section('title')
    Edit {{$exam->name}} Exam
@endsection

@section('styles')
<script src="{{asset('user_asset/global_assets/js/demo_pages/picker_date.js')}}"></script>
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Edit {{$exam->name}} Exam</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{route('admin.exam.update',$exam->id)}}" method="post" enctype="multipart/form-data" >
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Exam Name</label>
                            <input name="name" type="text" value="{{$exam->name}}" class="form-control" placeholder="Enter Exam Name" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Select Course</label>
                            <select name="course_id" class="form-control select-search" id="course_id" required>
                                <option value="">Select</option>
                                @foreach (App\Models\Course::all() as $course)
                                <option @if($exam->course_id == $course->id) selected @endif value="{{$course->id}}">{{$course->name}}</option>
                                @endforeach
                            </select> 
                        </div>   
                        <div class="form-group col-md-4">
                            <label>Select Semester</label>
                            <select name="semester_id" id="semester_id" class="form-control select-search" required>
                                <option selected value="{{$exam->semester_id}}">{{$exam->semester->name}}</option>
                            </select> 
                        </div>   
                        <div class="form-group col-md-4">
                            <label>Term</label>
                            <br>
                            <input type="radio" class="" name="term" @if($exam->term == "MS") checked @endif value="MS" required> MS
                            <input type="radio" class="" name="term" @if($exam->term == "ES") checked @endif value="ES" required> ES
                        </div>  
                        <div class="form-group col-md-4">
                            <label>Type</label>
                            <br>
                            <input type="radio" class="" name="type" @if($exam->type == "Theory") checked @endif value="Theory" required> Theory
                            <input type="radio" class="" name="type" @if($exam->type == "Practical") checked @endif value="Practical" required> Practical
                        </div>  
                        <div class="form-group col-md-4">
                            <label>Back Paper</label>
                            <br>
                            <input type="radio" class="" name="is_back_paper" @if($exam->is_back_paper) checked @endif value="1" required> Yes
                            <input type="radio" class="" name="is_back_paper" @if(!$exam->is_back_paper) checked @endif value="0" required> No
                        </div>   
                        <div class="form-group col-md-4">
                            <label>Attendance Required <small>(In Percentage)</small></label>
                            <input type="number" class="form-control" name="attendance_required" value="{{$exam->attendance_required}}" required>
                        </div>    
                        <div class="form-group col-md-4">
                            <label>Exam Date</label>
                            <input type="text" name="date" class="daterange-single form-control pull-right dates" style="height: 35px; "
                                 value="{{ date('m/d/Y', strtotime(@$exam->date))}}" required>
                        </div>  
                        <div class="form-group col-md-4">
                            <label>Form Start Date</label>
                            <input type="text" name="form_start_date" class="daterange-single form-control pull-right dates" style="height: 35px; "
                                 value="{{ date('m/d/Y', strtotime(@$exam->form_start_date))}}" required>
                        </div>  
                        <div class="form-group col-md-4">
                            <label>Form End Date</label>
                            <input type="text" name="form_last_date" class="daterange-single form-control pull-right dates" style="height: 35px; "
                                 value="{{ date('m/d/Y', strtotime(@$exam->form_last_date))}}" required>
                        </div>  
                        <div class="form-group col-md-4">
                            <label>Form Fee</label>
                            <input type="number" class="form-control" name="form_fee" value="{{$exam->form_fee}}" required>
                        </div>  
                        <div class="form-group col-md-4">
                            <label>Late Fee</label>
                            <input type="number" class="form-control" name="late_fee" value="{{$exam->late_fee}}" required>
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