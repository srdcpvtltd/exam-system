@extends('admin.layout.index')

@section('title')
    Add Entrance Fee
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Add New Entrance Fee</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{route('admin.entrance_fee.store')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Exam Name</label>
                            <input name="exam_name" type="text" class="form-control" placeholder="Enter Exam Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Exam Fee</label>
                            <input name="exam_fee" type="text" class="form-control" placeholder="Enter Exam Fee" required>
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
                <th>Exam Name</th>
                <th>Exam Fee</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach (App\Models\EntranceFee::all()  as $key => $entrance_fee)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$entrance_fee->exam_name}}</td>
                <td>{{$entrance_fee->exam_fee}}</td>
                
                <td>
                    <button data-toggle="modal" data-target="#edit_modal" exam_name="{{$entrance_fee->exam_name}}" 
                        exam_fee="{{$entrance_fee->exam_fee}}" id="{{$entrance_fee->id}}" class="edit-btn btn btn-primary">Edit</button>
                </td>
                <td>
                    <form action="{{route('admin.entrance_fee.destroy',$entrance_fee->id)}}" method="POST">
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
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Entrance Fee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Exam Name</label>
                        <input name="exam_name" id="exam_name" type="text" class="form-control" placeholder="Enter Exam Name" required>
                    </div>
                    <div class="form-group">
                        <label>Exam Fee</label>
                        <input name="exam_fee" id="exam_fee" type="text" class="form-control" placeholder="Enter Exam Fee" required>
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
            let exam_name = $(this).attr('exam_name');
            let exam_fee = $(this).attr('exam_fee');
            let id = $(this).attr('id');
            $('#exam_name').val(exam_name);
            $('#exam_fee').val(exam_fee);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('admin.entrance_fee.update','')}}' +'/'+id);
        });
    });
</script>
@endsection