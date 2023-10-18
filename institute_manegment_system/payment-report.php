<?php
include("admin_dashboard.php");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ajax select table</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
	span{font-size: 18px;
	    color: black;}
	</style>
</head>
<body>
	<button><a href="fee_history_record.php">Go Back</a></button>
<table id="main" border="0" cellpadding="" cellspacing="">
	<tr>
		<td id="header">
			<h1>Load Records Of Student fee Payment</h1>
		</td>
	</tr>
	<tr>
		<td id="table-form">
			<form>
				<span>Select Payment Status : </span><select id="payment">
					<option  value="">Select here</option>
				</select>
			</form>
		</td>
	</tr>
	<tr>
	<td id="table-data"></td>
</tr>
</table>

<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			url:"load-payment.php",
			type:"POST",
			dataType:"JSON",
			success:function(data){
				$.each(data,function(key,value){
					$("#payment").append("<option value='" + value.payment + "'>" + value.payment + "</option>");
				});
			}
		});

		//load table data
		$("#payment").change(function(){
			var payment = $(this).val();
			if(payment == ""){
				$("#table-data").html("");
			}else{
				$.ajax({
					url:"load-table.php",
					type:"POST",
					data:{payment:payment},
					success:function(data){
						$("#table-data").html(data);
					}
				});
			}
		});
	});
</script>
</body>
</html>