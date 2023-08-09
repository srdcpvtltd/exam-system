<table cellpadding="0" cellspacing="0" style="margin-top:-10px">
    <tr>
        <td class="title" width="90px" style="vertical-align: top;">
            <img src="{{ asset('user_asset/mlu-logo76764667.jpeg') }}" style="width: 100%; max-width: 88px" />
        </td>
        <td style="vertical-align: top;">
            <br/>
            <b>Application No #: {{ Auth::user()->id }}<br />
            Submitted Date: {{ date("d-m-Y", strtotime(Auth::user()->studentProfile->updated_at)) }}</b>
        </td>
    </tr>
</table>
<table width="100%" style="margin-top:-45px;">
    <tr>
        <th width="20%">Candidate Name</th>
        <td>{{ Auth::user()->studentProfile->first_name.' '.Auth::user()->studentProfile->middle_name.' '.Auth::user()->studentProfile->last_name }}</td>
        <td rowspan="4"><img src="{{asset(Auth::user()->studentDocuments->where('document_category_id',1)->first()?Auth::user()->studentDocuments->where('document_category_id',1)->first()->document:'')}}" style="width: 100%; max-width: 120px"></td>
        <td rowspan="4"><img src="{{asset(Auth::user()->studentDocuments->where('document_category_id',2)->first()?Auth::user()->studentDocuments->where('document_category_id',2)->first()->document:'')}}" style="max-height: 50px"></td>
    </tr>
    <tr>
        <th width="20%">Mother Name</th>
        <td>{{ Auth::user()->studentProfile->mother_first_name.' '.Auth::user()->studentProfile->mother_middle_name.' '.Auth::user()->studentProfile->mother_last_name }}</td>
    </tr>
    <tr>
        <th width="20%">Father Name</th>
        <td>{{ Auth::user()->studentProfile->father_first_name.' '.Auth::user()->studentProfile->father_middle_name.' '.Auth::user()->studentProfile->father_last_name }}</td>
    </tr>
    <tr>
        <th width="20%">Guardian Name</th>
        <td>{{ Auth::user()->studentProfile->guardian_first_name.' '.Auth::user()->studentProfile->guardian_middle_name.' '.Auth::user()->studentProfile->guardian_last_name }}</td>
    </tr>
    <tr>
        <th width="20%">Date of Birth <small>(dd-mm-yyyy)</small></th>
        <td>{{Auth::user()->studentProfile->day .'-'. Auth::user()->studentProfile->month .'-'. Auth::user()->studentProfile->year  }}</td>
        <th width="20%">Gender</th>
        <td>{{ Auth::user()->studentProfile->gender }}</td>
    </tr>
    <tr>
        <th width="20%">Mobile No</th>
        <td>{{Auth::user()->phone}}</td>
        <th width="20%">Email</th>
        <td>{{ Auth::user()->email }}</td>
    </tr>
    <tr>
        <th width="20%">Alt. Mobile No</th>
        <td>{{Auth::user()->studentProfile->alternative_phone}}</td>
        <th width="20%">AADHAR No</th>
        <td>{{ Auth::user()->studentProfile->aadhar_no }}</td>
    </tr>
    <tr>
        <th width="20%">Caste</th>
        <td>{{Auth::user()->studentProfile->caste}}</td>
        <th width="20%">Religion</th>
        <td>{{ Auth::user()->studentProfile->religion }}</td>
    </tr>
    <tr>
        <th width="20%">Personn with Disability</th>
        <td>{{Auth::user()->studentProfile->persons_with_disability?'Yes':'No'}}</td>
        <th width="20%">Ex-Service Man</th>
        <td>{{ Auth::user()->studentProfile->ex_service_man?'Yes':'No' }}</td>
    </tr>
    <tr>
        <th width="20%">Nationality</th>
        <td>{{ Auth::user()->studentProfile->nationality == 'Indian' ? 'Indian' : Auth::user()->studentProfile->other_nationality_1 }}</td>
        <th width="20%">Mother Tongue</th>
        <td>{{ Auth::user()->studentProfile->mother_tongue }}</td>
    </tr>
</table>
<table width="100%" style="margin-top:-45px;">
    <tr>
        <th width="50%">Present Address</th>
        <th width="50%">Permanent Address</th>
    </tr>
    <tr>
        <td>
            House No / Plot No: {{Auth::user()->studentTemparoryAddress() ? Auth::user()->studentTemparoryAddress()->premise_name : '' }}<br/>
            Premise Name: {{Auth::user()->studentTemparoryAddress() ? Auth::user()->studentTemparoryAddress()->plot_no : '' }}<br/>
            Locality: {{Auth::user()->studentTemparoryAddress() ? Auth::user()->studentTemparoryAddress()->locality : '' }}<br/>
            Sub Locality: {{Auth::user()->studentTemparoryAddress() ? Auth::user()->studentTemparoryAddress()->sub_locality : '' }}<br/>
            Landmark: {{Auth::user()->studentTemparoryAddress() ? Auth::user()->studentTemparoryAddress()->landmark : '' }}<br/>
            Village: {{Auth::user()->studentTemparoryAddress() ? Auth::user()->studentTemparoryAddress()->village : '' }}<br/>
            Post Office: {{Auth::user()->studentTemparoryAddress() ? Auth::user()->studentTemparoryAddress()->post_office : '' }}<br/>
            Police Station: {{Auth::user()->studentTemparoryAddress() ? Auth::user()->studentTemparoryAddress()->police_station : '' }}<br/>
            Country: {{Auth::user()->studentTemparoryAddress() ? Auth::user()->studentTemparoryAddress()->country->name : '' }}<br/>
            State: {{Auth::user()->studentTemparoryAddress() ? Auth::user()->studentTemparoryAddress()->state->name : '' }}<br/>
            Pin Code: {{Auth::user()->studentTemparoryAddress() ? Auth::user()->studentTemparoryAddress()->pin : '' }}<br/>
        </td>
        <td>
            House No / Plot No: {{Auth::user()->studentPermenantAddress() ? Auth::user()->studentPermenantAddress()->premise_name : '' }}<br/>
            Premise Name: {{Auth::user()->studentPermenantAddress() ? Auth::user()->studentPermenantAddress()->plot_no : '' }}<br/>
            Locality: {{Auth::user()->studentPermenantAddress() ? Auth::user()->studentPermenantAddress()->locality : '' }}<br/>
            Sub Locality: {{Auth::user()->studentPermenantAddress() ? Auth::user()->studentPermenantAddress()->sub_locality : '' }}<br/>
            Landmark: {{Auth::user()->studentPermenantAddress() ? Auth::user()->studentPermenantAddress()->landmark : '' }}<br/>
            Village: {{Auth::user()->studentPermenantAddress() ? Auth::user()->studentPermenantAddress()->village : '' }}<br/>
            Post Office: {{Auth::user()->studentPermenantAddress() ? Auth::user()->studentPermenantAddress()->post_office : '' }}<br/>
            Police Station: {{Auth::user()->studentPermenantAddress() ? Auth::user()->studentPermenantAddress()->police_station : '' }}<br/>
            Country: {{Auth::user()->studentPermenantAddress() ? Auth::user()->studentPermenantAddress()->country->name : '' }}<br/>
            State: {{Auth::user()->studentPermenantAddress() ? Auth::user()->studentPermenantAddress()->state->name : '' }}<br/>
            Pin Code: {{Auth::user()->studentPermenantAddress() ? Auth::user()->studentPermenantAddress()->pin : '' }}<br/>
        </td>
    </tr>
</table>
<table class="table table-sm table-bordered" id="myTable" style="margin-top:-45px;">
    <thead>
        <tr>
            <th colspan="8">Educational Details</th>
        </tr>
        <tr>
            <th style="width: 10px">#</th>
            <th>Exam Name</th>
            <th>Board Name</th>
            <th>School/College Name</th>
            <th>Year of passing</th>
            <th>Total Marks</th>
            <th>Marks secured</th>
            <th>% of Marks</th>
        </tr>
    </thead>
    <tbody id="qualifications">
   
        @foreach (Auth::user()->studentAcademicQualifications  as $key => $qualification)
        <tr>
            <td style="width: 10px">{{$key+1}}</td>
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
<table class="table table-sm table-bordered" id="myTable" style="margin-top:-45px;">
    <thead>
        <tr>
            <th colspan="8">Document Details</th>
        </tr>
        <tr>
            <th style="width: 10px">#</th>
            <th colspan="2">Name</th>
            <th  colspan="2">Document</th>
        </tr>
    </thead>
    <tbody id="documents">
   
        @foreach (App\Models\DocumentCategory::all()  as $key => $category)
        @if($category->document())
        <tr>
            <td style="width: 10px">{{$key+1}}</td>
            <td  colspan="2">{{$category->name}}</td>
            <td  colspan="2">                 
                <a href="{{route('prospect.dashboard.download_document',$category->document()->id)}}" target="_blank" class="nav-link">
                    <i class="icon-download"></i>
                    Download Document
                </a>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>
<table class="table table-sm table-bordered" id="myTable" style="margin-top:-45px;">
    <thead>
        <tr>
            <th>Payment Status</th>
            <th>Reference ID</th>
            <th>Fees</th>
        </tr>
    </thead>
    <tbody id="payments">
   
        <tr>
            <td>{{ Auth::user()->studentPaymentLastest()?Auth::user()->studentPaymentLastest()->status:'' }}</td>
            <td>{{ Auth::user()->studentPaymentLastest()?Auth::user()->studentPaymentLastest()->track_id:'' }}</td>
            <td>10</td>
        </tr>
    </tbody>
</table>