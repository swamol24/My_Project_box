<?php

include("connection.php");

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>
<?php
 //  include 'connection.php';
 //  error_reporting(0);
 //  session_start();
 
 // if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
 //        header('index.php');
 //        exit();
 //    }
 //    $query=mysqli_query($connect,"select * from admin_login where user_id='".$_SESSION['id']."'");
 //    $row=mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>School Management System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>
    <?php include("header.php"); ?>
  <?php include("user_sidebar.php"); ?>
    
               
</body>
</html>