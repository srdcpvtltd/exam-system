@extends('admin.layout.index')

@section('title')
Manage Grade
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Add New Grade</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{route('admin.grade.store')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Grade Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter Grade Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Select Grade Category</label>
                            <select name="category_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach (App\Models\GradeCategory::all() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select> 
                        </div>   
                        <div class="form-group col-md-4">
                            <label>Grade Point</label>
                            <input name="point" type="text" class="form-control" placeholder="Enter Grade Point" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Grade Mark From</label>
                            <input name="mark_from" type="text" class="form-control" placeholder="Enter Grade Mark From" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Grade Mark Upto</label>
                            <input name="mark_upto" type="text" class="form-control" placeholder="Enter Grade Mark Upto" required>
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
                <th>Name</th>
                <th>Category</th>
                <th>Point</th>
                <th>Mark From</th>
                <th>Mark Upto</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach (App\Models\Grade::all()  as $key => $grade)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$grade->name}}</td>
                <td>{{@$grade->category->name}}</td>
                <td>{{$grade->point}}</td>
                <td>{{$grade->mark_from}}</td>
                <td>{{$grade->mark_upto}}</td>
                <td>
                    <button data-toggle="modal" data-target="#edit_modal" name="{{$grade->name}}" 
                        mark_from="{{$grade->mark_from}}" mark_upto="{{$grade->mark_upto}}" 
                        point="{{$grade->point}}" category_id="{{$grade->category_id}}" 
                        id="{{$grade->id}}" class="edit-btn btn btn-primary">Edit</button>
                </td>
                <td>
                    <form action="{{route('admin.grade.destroy',$grade->id)}}" method="POST">
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
                        <label for="name">Grade Name</label>
                        <input class="form-control" type="text" id="name" name="name" placeholder="Enter name" required>
                    </div>
                    <div class="form-group"> 
                        <label>Select Category</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">Select</option>
                            @foreach (App\Models\GradeCategory::all() as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select> 
                    </div>
                    <div class="form-group">
                        <label>Grade Point</label>
                        <input name="point" id="point" type="text" class="form-control" placeholder="Enter Grade Point" required>
                    </div>
                    <div class="form-group">
                        <label>Grade Mark From</label>
                        <input name="mark_from" id="mark_from" type="text" class="form-control" placeholder="Enter Grade Mark From" required>
                    </div>
                    <div class="form-group">
                        <label>Grade Mark Upto</label>
                        <input name="mark_upto" id="mark_upto" type="text" class="form-control" placeholder="Enter Grade Mark Upto" required>
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
            let name = $(this).attr('name');
            let category_id = $(this).attr('category_id');
            let point = $(this).attr('point');
            let mark_from = $(this).attr('mark_from');
            let mark_upto = $(this).attr('mark_upto');
            let id = $(this).attr('id');
            $('#point').val(point);
            $('#mark_from').val(mark_from);
            $('#mark_upto').val(mark_upto);
            $('#category_id').val(category_id);
            $('#name').val(name);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('admin.grade.update','')}}' +'/'+id);
        });
    });
</script>
@endsection