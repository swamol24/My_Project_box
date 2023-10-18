<?php
include("connection.php");
error_reporting(0);
?>

<?php
//define variables and set to empty
$fullname=$course=$payment='';
$fullnameerror=$courseerror=$paymenterror='';

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
	$course = $_POST['course'];
	$payment = $_POST['payment'];
	
//validate each input field

if(empty($fullname)){
	$fullnameerror = "fullname is required !<br>";
}
else{
$fullname = validation($fullname);
}

if(empty($course)){
	$courseerror = "course is required !<br>";
}
else{
$course = validation($course);
}


if(empty($payment)){
	$paymenterror = "payment is required !<br>";
}
else{
$payment = validation($payment);
}


 //student payment record update/edit through query

$updateQuery="UPDATE student SET fullname='$fullname',course='$course',payment='$payment' WHERE id=".$_GET['id'];
$result = mysqli_query($connect,$updateQuery);
if($result){
	echo "record updated successfully !";
	header('location:fee_history_record.php');

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
	<?php include("admin_dashboard.php");

	$sql = "SELECT * FROM fee_history WHERE id=".$_GET['id'];
$fetchData = mysqli_query($connect,$sql);
$row = mysqli_fetch_array($fetchData);

	?>

	<center><form id="form" action="" method="POST" >
		<h2>Students Fee Payment Form</h2>
	<div><label for="fullname">Write Fullname :</label>
		<input type="text" name="fullname" placeholder="Write Fullname.." />
		<span class="error">* <?php echo $fullnameerror;?></span></div>

	<div><label for="courses">Select course : </label>
		<select name="course" id="course" >
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
    <label for="payment">Select Payment Status : </label>
		<select name="payment" id="payment" >
			<option value="Paid">Paid</option>
			<option value="Pending">Pending</option>
		</select>
			<span class="error">*<?php echo $paymenterror; ?></span>
    </div>

	<div><input type="submit" name="submit" value="Add To Record" />
		<a href="fee_history_record.php">Check Fee History Record Table</a></div>
	</form></center>

</body>
</html>