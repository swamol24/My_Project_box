<?php
include("connection.php");
error_reporting(0);
?>

<?php
//define variables and set to empty
$fullname=$subject=$classdate=$mode='';
$fullnameerror=$subjecterror=$classdateerror=$modeerror='';

//set validation

function validation($value){
	$value = htmlspecialchars($value);
	$value = trim($value);
	$value = stripcslashes($value);
	return($value);
}
?>

<?php
if(isset($_POST['submit'])){
	$fullname = $_POST['fullname'];
	$subject = $_POST['subject'];
	$classdate = $_POST['classdate'];
	$mode = $_POST['mode'];
	

//validate each input field

if(empty($fullname)){
	$fullnameerror = "fullname is required !<br>";
}
else{
$fullname = validation($fullname);
}

if(empty($subject)){
	$subjecterror = "subject is required !<br>";
}
else{
$subject = validation($subject);
}

if(empty($classdate)){
	$classdateerror = "class date is required !<br>";
}
else{
$classdate = validation($classdate);
}

if(empty($mode)){
	$modeerror = "mode is required !<br>";
}
else{
$mode = validation($mode);
}


 //data inserted through query

 $query = "INSERT INTO student_attendence (fullname,subject,classdate,mode) VALUES ('$fullname','$subject','$classdate','$mode')";
 $result = mysqli_query($connect,$query);
 if($result){
 	echo "student attendence marked successfully !!<br>";
 }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add new student</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">

	<style type="text/css">
		#form{
			background: lightgray;
			width: 100%;
		}
		 form h2{
			background : darkgray;
			border-radius: 10px;
			width: 300px;
		}
		form label{
				font-size: 15px;
				font-weight: bold;
			}
			form input{
			font-size: 15px;
			font-family: 'Flamenco', cursive;
			 border-radius: 5px;
			 padding: 6px;
			}
			form div{
				margin: 15px;
			}
			form .error{
				color:#FF0000;
			}
	</style>
</head>
<body>
	<?php include("admin_dashboard.php"); ?>

	<center><form id="form" action="" method="POST" enctype="multipart/form-data">
		<h2>Mark Attendence</h2>
	<div><label for="fullname">Write Fullname :</label>
		<input type="text" name="fullname" placeholder="Write Fullname.." />
		<span class="error">* <?php echo $fullnameerror;?></span></div>

		<div><label for="subject">Select Subject : </label>
		<select name="subject" id="subject" >
		<optgroup label="Front End :">
			<option value="HTML 5"> HTML 5</option>
			<option value="CSS 3"> CSS 3</option>
			<option value="Bootstrap 5"> Bootstrap 5</option>
			<option value="Javascript">Javascript</option>
			<option value="Jquery">Jquery</option>
			<option value="Anguler"> Anguler</option>
			<option value="React"> React</option>
		</optgroup>
		<optgroup label="Back End :">
			<option value="PHP"> PHP</option>
			<option value="Python"> Python</option>
			<option value="Mysql"> Mysql</option>
			<option value="Laravel">Laravel</option>
			<option value=" WordPress"> WordPress</option>
		</optgroup>
	</select>
	<span class="error">*<?php echo $courseerror; ?></span>
</div>
		<div>
		<label>Select Date Of Class :</label>
	<input type="date" name="classdate"/>
	<span class="error">*<?php echo $classdateerror; ?></span>
	</div>

	<div><label for="mode">Select Mode :</label>
	ONLINE
	<input type="radio" name="mode" value="ONLINE" />
	OFFLINE
	<input type="radio" name="mode" value="OFFLINE" />
	<span class="error">*<?php echo $modeerror; ?></span>
	</div>
	
	<div><input type="submit" name="submit" value="Add To Record" />
		<a href="student_attendence_records.php">Check Student Attendence Record Table</a></div>
	</form></center>

</body>
</html>