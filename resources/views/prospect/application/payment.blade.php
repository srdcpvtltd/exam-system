<html>
<script type="text/javascript">  
function autoformsubmit()
{
	if(document.all.reqjson.value.trim().length>0)
	{
		 document.getElementById("msg").innerHTML ="Processing your transaction. Please Wait.....";
		 document.getElementById("form1").submit();
	}
	else
	{
		 document.getElementById("msg").innerHTML ="Server Error. Please contact your website administrator !";
	}
}
</script>
<body onload="autoformsubmit()">

<form action="{{ config('services.razor_pay.txn_initiation_url') }}" method="post" id="form1">
	<p id="msg">
	
	</p>
    <input type="hidden" name="reqjson" value="{{Auth::user()->studentPaymentLastest()?Auth::user()->studentPaymentLastest()->txn_init_final:''}}">
</form>

</body>
</html>