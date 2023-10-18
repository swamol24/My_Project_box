<?php
include("connection.php");
error_reporting(0);
?>

<?php
//define variables and set to empty
$fullname=$department=$classdate=$jointime=$logouttime='';
$fullnameerror=$sdepartmenterror=$classdateerror=$jointimeerror=$logouttimeerror='';

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
	$department = $_POST['department'];
	$classdate = $_POST['classdate'];
	$jointime = $_POST['jointime'];
	$logouttime = $_POST['logouttime'];
	

//validate each input field

if(empty($fullname)){
	$fullnameerror = "fullname is required !<br>";
}
else{
$fullname = validation($fullname);
}

if(empty($department)){
	$departmenterror = "department is required !<br>";
}
else{
$department = validation($department);
}

if(empty($classdate)){
	$classdateerror = "class date is required !<br>";
}
else{
$classdate = validation($classdate);
}

if(empty($jointime)){
	$jointimeerror = "jointime is required !<br>";
}
else{
$jointime = validation($jointime);
}

if(empty($logouttime)){
	$logouttimeerror = "logouttime is required !<br>";
}
else{
$logouttime = validation($logouttime);
}

//edit/upadtestaff attendence record

$updateQuery="UPDATE student SET fullname='$fullname',department='$department',classdate='classdate',jointime='$jointime',logouttime='$logouttime' WHERE id=".$_GET['id'];
$result = mysqli_query($connect,$updateQuery);
if($result){
	echo "record updated successfully !";
	header('location:student_records.php');
 }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mark Staff Attendence</title>
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

	$sql = "SELECT * FROM staff_attendence WHERE id=".$_GET['id'];
$fetchData = mysqli_query($connect,$sql);
$row = mysqli_fetch_array($fetchData);
	?>

	<center><form id="form" action="" method="POST" enctype="multipart/form-data">
		<h2>Mark Attendence</h2>
	<div><label for="fullname">Write Fullname :</label>
		<input type="text" name="fullname" value="<?php echo $row['fullname']; ?>" placeholder="Write Fullname.." />
		<span class="error">* <?php echo $fullnameerror;?></span></div>

		<div><label for="department">Select Department : </label>
		<select name="department" id="department" value="<?php echo $row['department']; ?>" >
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
	<input type="date" name="classdate" value="<?php echo $row['classdate']; ?>"/>
	<span class="error">*<?php echo $classdateerror; ?></span>
	</div>

	<div><label for="jointime">select join time :</label>
	<input type="time" name="jointime"  value="<?php echo $row['jointime']; ?>" />
	<span class="error">*<?php echo $jointimeerror; ?></span>
	</div>

	<div><label for="logouttime">select Logout time :</label>
	<input type="time" name="logouttime" value="<?php echo $row['logouttime']; ?>" />
	<span class="error">*<?php echo $logouttimeerror; ?></span>
	</div>
	
	<div><input type="submit" name="submit" value="Add To Record" />
		<a href="staff_attendence_record.php">Check Staff Attendence Record Table</a></div>
	</form></center>

</body>
</html>