<div class="row">
    <div class="col-md-12 text-right">
        <button data-toggle="modal" data-target="#addAcademicQualificationModal" 
        class="btn btn-primary">Add Academic Qualification</button>
    </div>
    <div class="col-md-12">
        <table class="table datatable-save-state">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name of Examination</th>
                    <th>Name of Board</th>
                    <th>School / College Last Attended</th>
                    <th>Year Of Passing</th>
                    <th>Total Marks</th>
                    <th>Marks</th>
                    <th>Percentage</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Auth::user()->studentAcademicQualifications  as $key => $qualification)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$qualification->name_of_exam}}</td>
                    <td>{{$qualification->name_of_board}}</td>
                    <td>{{$qualification->attended_school}}</td>
                    <td>{{$qualification->passing_year}}</td>
                    <td>{{$qualification->total_marks}}</td>
                    <td>{{$qualification->marks}}</td>
                    <td>{{$qualification->percentage .' %'}}</td>
                    <td>
                        <button data-toggle="modal" data-target="#editAcademicQualificationModal" 
                            name_of_exam="{{$qualification->name_of_exam}}" 
                            name_of_board="{{$qualification->name_of_board}}" 
                            attended_school="{{$qualification->attended_school}}" 
                            passing_year="{{$qualification->passing_year}}" 
                            total_marks="{{$qualification->total_marks}}" 
                            marks="{{$qualification->marks}}" 
                            percentage="{{$qualification->percentage}}" 
                            id="{{$qualification->id}}" class="edit-btn btn btn-primary">Edit</button>
                    </td>
                    <td>
                        <form action="{{route('prospect.academic_qualification.destroy',$qualification->id)}}" method="POST">
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
</div>