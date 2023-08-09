@extends('admin.layout.index')

@section('title')
Prospects
@endsection

@section('content')

<div class="card">
    <div class="table-responsive">
        <table class="table datatable-save-state">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Exam</th>
                    <th>Status</th>
                    <th>Track ID</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($prospects  as $key => $prospect)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$prospect->name}}</td>
                    <td>{{$prospect->email}}</td>
                    <td>{{ $prospect->entrance_fee?$prospect->entrance_fee->exam_name:'' }}</td>
                    <td>{{ $prospect->studentPaymentLastest()?$prospect->studentPaymentLastest()->status:'' }}</td>
                    <td>{{ $prospect->studentPaymentLastest()?$prospect->studentPaymentLastest()->track_id:'' }}</td>
           
                    <td>
                        
                        <button data-toggle="modal" data-target="#edit_modal"
                            id="{{$prospect->id}}" class="edit-btn btn btn-primary">Edit</button>
                        {{-- <a href="{{route('admin.prospect.edit',$prospect->id)}}" class="btn btn-primary btn-sm">Edit</a> --}}
                    </td>
                    <td>
                        <a href="{{route('admin.prospect.show',$prospect->id)}}" class="btn btn-info btn-sm">Show Application</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table> 

    </div>
</div>
<div id="edit_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="updateForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Student Approval</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="user_id" id="user_id" required>
                        <label for="name">Status</label>
                        <select  name="status"  class="form-control select-search" data-fouc required>
                            <option selected disabled>Select Status</option>
                            <option value="Admitted">Admitted</option>
                            <option value="Rejected">Rejected</option>
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
            let id = $(this).attr('id');
            $('#user_id').val(id);
            $('#updateForm').attr('action','{{route('admin.prospect.status_update','')}}');
        });
    });
</script>
@endsection
