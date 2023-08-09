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
            <td>{{ $prospect->studentPaymentLastest()?$prospect->studentPaymentLastest()->status:'' }}</td>
            <td>{{ $prospect->studentPaymentLastest()?$prospect->studentPaymentLastest()->track_id:'' }}</td>
            <td>1</td>
        </tr>
    </tbody>
</table>