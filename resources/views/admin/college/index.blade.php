@extends('admin.layout.index')

@section('title')
    Colleges
@endsection

@section('content')

<div class="card">
    <div class="table-responsive">
        <table class="table datatable-save-state">
            <thead>
                <tr>
                    <th>#</th>
                    <th>College Name</th>
                    <th>Email</th>
                    <th>Phone No.</th>
                    <th>Principal Name</th>
                    <th>Year of Establishment</th>
                    <th>Verified</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colleges  as $key => $college)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{@$college->collegeProfile->college_name}}</td>
                    <td>{{$college->email}}</td>
                    <td>{{@$college->collegeProfile->phone}}</td>
                    <td>{{@$college->collegeProfile->principal_name}}</td>
                    <td>{{@$college->collegeProfile->year_of_establishment}}</td>
                    <td>
                        @if($college->is_verified)
                            <span class="badge badge-success">Verified</span>
                        @else
                            <span class="badge badge-danger">Not Verified</span>
                        @endif
                    </td>
                    <td>
                        @if($college->is_active)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Pending</span>
                        @endif
                    </td>
                    
                    {{-- <td> --}}
                        {{-- @if($college->is_verified)
                            <a href="{{route('admin.user.revert_verification',$college->id)}}" class="btn btn-danger btn-sm">Revert Verification</a>
                        @else 
                            <a href="{{route('admin.user.verified',$college->id)}}" class="btn btn-info btn-sm">Verify</a>
                        @endif --}}
                    {{-- </td> --}}
                    <td>
                        <a href="{{route('admin.college.show',$college->id)}}" class="btn btn-primary btn-sm">Show</a>
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
