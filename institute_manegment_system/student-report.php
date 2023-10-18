<?php
include("admin_dashboard.php");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> student Record</title>
	<!-- link jQuery ui css -->
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
	  <!--link own css file -->
	<link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
	<button><a href="student_records.php">Go Back</a></button>
<div id="main">
	<div id="header">
		<h1>Student's Record </h1>
	</div>
	<div id="date-wrap">
		<label for="from">Form</label>
		<input type="text" id="from" autocomplete="off" name="">
		<label for="to">To</label>
		<input type="text" id="to" autocomplete="off" name="">
	</div>
	<div id="content">
		<table id="table-data" border="" width="100%" cellpadding="0" cellspacing="0">
			<thead>
				<th width="50px">ID</th>
				<th>Fullname</th>
				<th>Photo</th>
				<th width="90px">Email ID</th>
				<th width="130px">Phone No</th>
				<th>Birthdate</th>
				<th>Gender</th>
				<th>Course</th>
				<th>Address</th>
      </thaed>
			<tbody></tbody>
		</table>
	</div>
</div>	

<!--jQuery-->
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<!--jQuery ui -->
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script type="text/javascript">
$( function() {
	var minD;
	var maxD;
    var dateFormat = "yyyy-mm-dd",
      from = $( "#from" )
        .datepicker({
         // defaultDate: "+1w",
          changeMonth: true,
          changeYear:true,
          numberOfMonths: 1,
          yearRange:"1990:2005"
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
          minD = $(this).val();
          if(minD !== '' && maxD !== ''){
          	loadTable(minD,maxD);
          }
        }),
      to = $( "#to" ).datepicker({
         changeMonth: true,
          changeYear:true,
          numberOfMonths: 1,
          yearRange:"1990:2005"
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
         maxD = $(this).val();
          if(minD !== '' && maxD !== ''){
          	loadTable(minD,maxD);
          }
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
    function loadTable(date1,date2){
    $.ajax({
    	url:"get-data.php",
    	type:"POST",
    	data: {date1:date1,date2:date2},
    	success:function(responce){
    		$("#table-data tbody").html(responce);
    	}
    });	
    }
    loadTable(minD,maxD);
  } );	
</script>

</body>
</html>