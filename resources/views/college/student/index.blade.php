@extends('college.layout.index')

@section('title')
    Students
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
                    <th>Phone No</th>
                    <th>College</th>
                    <th>Father Name</th>
                    <th>Verified</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($students  as $key => $student)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$student->student->name}}</td>
                    <td>{{$student->student->email}}</td>
                    <td>{{@$student->phone}}</td>
                    <td>{{@$student->college->name}}</td>
                    <td>{{@$student->fathers_name}}</td>
                    <td>
                        @if($student->is_verified)
                            <span class="badge badge-success">Verified</span>
                        @else
                            <span class="badge badge-danger">Not Verified</span>
                        @endif
                    </td>
                    <td>
                        @if($student->is_active)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Pending</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('college.student_profile.show',$student->id)}}" class="btn btn-primary btn-sm">Show</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table> 

    </div>
</div>
@endsection
@section('scripts')
@endsection
