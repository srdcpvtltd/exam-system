@extends('student.layout.index')

@section('title')
    Exams
@endsection

@section('content')

<div class="card">
    
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Exams</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <table class="table datatable-save-state">
        <thead>
            <tr>
                <th>#</th>
                <th>Exam Name</th>
                <th>Course</th>
                <th>Semester</th>
                <th>Exam Date</th>
                <th>Exam Term</th>
                <th>Exam Type</th>
                <th>Form Start Date</th>
                <th>Form Last Date</th>
                <th>Form Fee</th>
                <th>Form Late Fee</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allExams  as $key => $exam)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$exam->name}}</td>
                <td>{{@$exam->course->name}}</td>
                <td>{{@$exam->semester->name}}</td>
                <td>{{@$exam->date->format('d M, Y')}}</td>
                <td>{{@$exam->term}}</td>
                <td>{{@$exam->type}}</td>
                <td>{{@$exam->form_start_date->format('d M, Y')}}</td>
                <td>{{@$exam->form_last_date->format('d M, Y')}}</td>
                <td>{{@$exam->form_fee}}</td>
                <td>{{@$exam->late_fee}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('scripts')
@endsection
