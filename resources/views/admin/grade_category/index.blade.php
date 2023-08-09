@extends('admin.layout.index')

@section('title')
Manage Grade Category
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Add New Grade Category</h5>
                <div class="header-elements">
                </div>
            </div>

            <div class="card-body">
                <form action="{{route('admin.grade_category.store')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Grade Category Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter Grade Category Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Grade Category Mark</label>
                            <input name="mark" type="text" class="form-control" placeholder="Enter Grade Category Mark" required>
                        </div>
                        <div class="text-right" style="margin-top:28px;">
                        <button type="submit" class="btn btn-primary">Add Grade Category <i class="icon-paperplane ml-2"></i></button>
                    </div>
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
                <th>Grade Category Name</th>
                <th>Grade Category Mark</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach (App\Models\GradeCategory::all()  as $key => $grade_category)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$grade_category->name}}</td>
                <td>{{$grade_category->mark}}</td>
                
                <td>
                    <button data-toggle="modal" data-target="#edit_modal" name="{{$grade_category->name}}" 
                    mark="{{$grade_category->mark}}" id="{{$grade_category->id}}" class="edit-btn btn btn-primary">Edit</button>
                </td>
                <td>
                    <form action="{{route('admin.grade_category.destroy',$grade_category->id)}}" method="POST">
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
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Grade Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Grade Category Name</label>
                        <input class="form-control" type="text" id="name" name="name" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Grade Category Mark</label>
                        <input class="form-control" type="text" id="mark" name="mark" placeholder="Enter mark" required>
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
            let mark = $(this).attr('mark');
            let id = $(this).attr('id');
            $('#mark').val(mark);
            $('#name').val(name);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('admin.grade_category.update','')}}' +'/'+id);
        });
    });
</script>
@endsection