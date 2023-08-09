@include('prospect.dashboard.partials.registration')
@include('prospect.dashboard.partials.basic_information')
@include('prospect.dashboard.partials.academic_qualification_update')
@include('prospect.dashboard.partials.documents_uploaded_update')
<table class="table table-sm table-bordered">
    <thead>
        <tr>
            <th>Payment Status</th>
            <th>Reference ID</th>
            <th>Fees</th>
        </tr>
    </thead>
    <tbody >
   
        <tr>
            <td>{{ Auth::user()->studentPaymentLastest()?Auth::user()->studentPaymentLastest()->status:'' }}</td>
            <td>{{ Auth::user()->studentPaymentLastest()?Auth::user()->studentPaymentLastest()->track_id:'' }}</td>
            <td>10</td>
        </tr>
    </tbody>
</table>