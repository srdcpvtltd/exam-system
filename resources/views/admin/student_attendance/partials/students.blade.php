
@foreach($studentAttendances as $key => $studentAttendance)
<tr>
    <th>{{App\Helpers\Helpers::getUserName($key)}}</th>
    <th>{{$studentAttendance->sum('total_days')}}</th>
    <th>{{$studentAttendance->sum('attended_days')}}</th>
    <th>{{round($studentAttendance->sum('attended_days') / $studentAttendance->sum('total_days') * 100, 2) }} %</th>
    <th>
        @if($studentAttendance->first()->forced_allow_exam == true)
            <button class="btn btn-sm btn-success">Force Allowed</button>
        @else 
            <button id="allowed_student_{{$key}}" onclick="forcedAllowed('{{ @$key }}')" class="btn btn-sm btn-info">Allowed Student</button>
            <button id="force_allowed_{{$key}}" hidden class="btn btn-sm btn-success">Force Allowed</button>
        @endif
    </th>
</tr>
@endforeach