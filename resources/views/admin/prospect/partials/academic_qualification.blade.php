<div class="row">
    {{-- <div class="col-md-12 text-right">
        <button data-toggle="modal" data-target="#addAcademicQualificationModal" 
        class="btn btn-primary">Add Academic Qualification</button>
    </div> --}}
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
                </tr>
            </thead>
            <tbody>
                @foreach ($prospect->studentAcademicQualifications  as $key => $qualification)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$qualification->name_of_exam}}</td>
                    <td>{{$qualification->name_of_board}}</td>
                    <td>{{$qualification->attended_school}}</td>
                    <td>{{$qualification->passing_year}}</td>
                    <td>{{$qualification->total_marks}}</td>
                    <td>{{$qualification->marks}}</td>
                    <td>{{$qualification->percentage .' %'}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>