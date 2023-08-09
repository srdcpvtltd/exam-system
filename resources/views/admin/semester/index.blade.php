@extends('admin.layout.index')

@section('title')
Manage Semester
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Add New Semester</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{route('admin.semester.store')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Semester Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter Semester Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Select Course</label>
                            <select name="course_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach (App\Models\Course::all() as $course)
                                <option value="{{$course->id}}">{{$course->name}}</option>
                                @endforeach
                            </select> 
                        </div>   
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Create <i class="icon-paperplane ml-2"></i></button>
                    </div>
                    
                </form>
            </div>
        </div>
        <!-- /basic layout -->

    </div>
</div>

<div class="card">

    <table class="table datatable-save-state">
        <thead>
            <tr>
                <th>#</th>
                <th>Semster Name</th>
                <th>Course Name</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach (App\Models\Semester::all()  as $key => $semester)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$semester->name}}</td>
                <td>{{@$semester->course->name}}</td>
                
                <td>
                    <button data-toggle="modal" data-target="#edit_modal" name="{{$semester->name}}" 
                        course_id="{{$semester->course_id}}" id="{{$semester->id}}" class="edit-btn btn btn-primary">Edit</button>
                </td>
                <td>
                    <form action="{{route('admin.semester.destroy',$semester->id)}}" method="POST">
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

<div id="edit_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="updateForm" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Semester</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Semester Name</label>
                        <input class="form-control" type="text" id="name" name="name" placeholder="Enter name" required>
                    </div>
                    <div class="form-group"> 
                        <label>Select Course</label>
                        <select name="course_id" class="form-control" id="course_id">
                            <option value="">Select</option>
                            @foreach (App\Models\Course::all() as $course)
                            <option value="{{$course->id}}">{{$course->name}}</option>
                            @endforeach
                        </select> 

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.edit-btn').click(function(){
            let name = this.name;
            let course_id = this.course_id;
            let id = $(this).attr('id');
            $('#course_id').val(course_id);
            $('#name').val(name);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('admin.semester.update','')}}' +'/'+id);
        });
    });
</script>
@endsection