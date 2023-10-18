<?php
include("connection.php");
error_reporting(0);
?>

<?php
//define variables and set to empty
$fullname=$department=$phone=$age=$gender=$salary='';
$fullnameerror=$departmenterror=$phoneerror=$ageerror=$gendererror=$salaryerror='';

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
	$phone = $_POST['phone'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$salary = $_POST['salary'];

//validate each input field

if(empty($fullname)){
	$fullnameerror = "fullname is required !<br>";
}
else{
$fullname = validation($fullname);
}

if(empty($department)){	
$departmenterror = "<p>you didn't select any department !</p>\n" ;
}else{
// $selectCourse = count($course);
// for($i = 0;$i < $selectCourse ; $i++){
// 	echo($course[$i]. " ");
}
// if(empty($image)){
//         $imageerror="profile_image is requried";
//     }
//     else{
//         $image=validation($image);
//         echo "<br>";
//     }


if(empty($phone)){
	$phoneerror = "phone numbers is required !<br>";
}elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
	echo "Please enter valid phone number.<br>";
}
else{
$phone = validation($phone);
}

if(empty($age)){
	$ageerror = "age is required !<br>";
}
else{
$birthdate = validation($birthdate);
}

if(empty($gender)){
	$gendererror = "gender is required !<br>";
}
else{
$gender = validation($gender);
}




if(empty($salary)){
	$salaryerror = "salary is required !<br>";
}
else{
$address = validation($address);
}

//image file upload

// $target_dir ="img/";
// $target_file = $target_dir . basename($_FILES["image"]["name"]);
//  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
//     echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
//     $image = $_FILES["image"]["name"]; 
//   } else {
//     echo "Sorry, there was an error uploading your file.";
//   }

$filename = $_FILES["photo"]["name"];
$tempname = $_FILES["photo"]["tmp_name"];
$photo = "photos/".$filename;
//echo $folder;
move_uploaded_file($tempname, $photo);


 //data inserted through query

 $query = "INSERT INTO staff (fullname,photo,department,phone,age,gender,salary) VALUES ('$fullname','$photo','$department','$phone','$age','$gender','$salary')";
 $result = mysqli_query($connect,$query);
 if($result){
 	echo "staff record added successfully !!<br>";
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
		<h2>Staff Members Entry Form</h2>
	<div><label for="fullname">Write Fullname :</label>
		<input type="text" name="fullname" placeholder="Write Fullname.." />
		<span class="error">* <?php echo $fullnameerror;?></span></div>

	<div><label for="photo">Upload image :</label>
		<input type="file" name="photo" id="fileToUpload" /></div>

	<div><label for="department">Select Department : </label>
		<select name="department" id="department" >
			<option value="FrontEnd Developer "> FrontEnd Developer</option>
			<option value="BackEnd Developer"> BackEnd Developer</option>
			<option value="Digital Marketing"> Digital Marketing</option>
			<option value="Data Analyst">Data Analyst</option>
			<option value="Data Scientist">Data Scientist</option>
			
	</select>
	<span class="error">*<?php echo $departmenterror; ?></span>
	</div>
			<div><label for="phone">Enter Valid Phone Number : </label>
		<input type="phone" name="phone" placeholder="Enter Phone No.." />
	<span class="error">*<?php echo $phoneerror; ?></span>
	</div>

		<div>
		<label>Enter Your Age :</label>
	<input type="text" name="age"/>
	<span class="error">*<?php echo $ageerror; ?></span>
	</div>

	<div><label for="gender">Select Gender :</label>
	Male
	<input type="radio" name="gender" value="Male" />
	Female
	<input type="radio" name="gender" value="Female" />
	<span class="error">*<?php echo $gendererror; ?></span>
	</div>

	<div>
	<label for="salary">Enter Your Salary :</label>
	<input type="text" name="salary" placeholder="Enter Salary.." />
	<span class="error">*<?php echo $salaryerror; ?></span>
	</div>

	<div><input type="submit" name="submit" value="Add To Record" />
		<a href="staff_record.php">Check Staff Record Table</a></div>
	</form></center>

</body>
</html>