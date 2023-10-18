<?php
include("connection.php");
include("admin_dashboard.php");

if(isset($_GET["page"])){
    $page=$_GET["page"];
}else{
$page=1;    
}
//display per page 

$num_per_page=02;
$start_from = ($page-1)*02;

$sql="SELECT * FROM student LIMIT $start_from,$num_per_page";
$result=mysqli_query($connect,$sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>database table</title>
      <style type="text/css">
        table{
            border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
        }
        th{
            background: darkcyan;
            padding: 12px;
        }
        tr:hover{border: 3px solid crimson;
            }
        tr:nth-child(even){
            background-color:lightpink; }
        td{border: 1px solid lightgray;
           color: black;
         font-weight: bold;
         } 
        #btn{margin-bottom: 15px;
                 padding: 10px;
                 font-weight: bold;
                 font-size: 15px;
                 color: white;
                 background-color: black;
             } 
         #btn:hover{background: navy;} 
         #btn a {color: white;}
         #btn a:hover{color: white;} 
         #btn1{margin-bottom: 15px;
                 padding: 10px;
                 font-weight: bold;
                 font-size: 15px;
                 color: white;
                 background-color: forestgreen;
             }
        #btn1:hover{background:navy; } 
        #btn1 a{color:white;}
        #btn1 a:hover{color:white;}
         #edit_tab a{padding: 10px;
                    margin-left: 12px;
                    background: forestgreen;
                    font-weight: 600;
                    text-align: center;}
         #delete_tab a{padding: 10px;
                    background: crimson;
                    font-weight: 600;
                    text-align: center;
                    margin-left: 12px}
        button{margin-top: 10px;
                background-color: gray;
                padding: 8px;   
             margin-right: 5px;}
        button:hover{
            background-color: lightcyan;
        }
      </style>
</head>
<body>
<button id="btn"><a href="add_new.php">Add New Student</a></button>
<button id="btn1"><a href="student-report.php">Student's Report</a></button>
 <table border="1px" width=100%>
        <tr>
        <th>Id</th>
        <th >Fullname</th>
        <th >Photo</th>
        <th>Email ID</th>
        <th >Phone No</th>
        <th>Date Of Birth</th>
        <th >Gender</th>
        <th >Course</th>
        <th >Address</th>
        <th >Edit/Update</th>
        <th >Delete</th>
        </tr>
 
 <?php
  //fetch data from database

 //$sql = "SELECT * FROM student";
 // $sql = "SELECT fullname,image FROM student";
 // $sql = "SELECT * FROM student LIMIT 3 offset 2";
//$result = mysqli_query($connect,$sql);

if(mysqli_num_rows($result) > 0){
       $i =1;
while ($row = mysqli_fetch_assoc($result)) {?>
<tr>
    <!-- <td ><//?php echo $i; ?></td>   -->
    <td><?php echo $row["id"]; ?></td>
    <td ><?php echo $row["fullname"]; ?></td>
    <td><img src= "<?php echo $row["image"] ; ?>" height="100px" width="100px" ></td>
    <td ><?php echo $row["email"]; ?></td>
    <td ><?php echo $row["phone"]; ?></td>
    <td ><?php echo $row["birthdate"]; ?></td>
    <td><?php echo $row["gender"]; ?></td>
    <td ><?php echo $row["course"]; ?></td>
    <td><?php echo $row["address"]; ?></td>
    <td id="edit_tab"><a href="update_record.php?id=<?php echo $row["id"]; ?>">Edit/Update</a></td> 
    <td id="delete_tab" ><a href="delete_record.php?id=<?php echo $row["id"]; ?>">Delete</a></td>      
 </tr>
 <?php 
  $i++; 
 } 
}
 else{
       echo "results 0";
 }

 ?>
 </table>

 <?php
    $sql="SELECT * FROM student";
    $result=mysqli_query($connect,$sql);
    $total_records=mysqli_num_rows($result);
    //echo $total;
    $total_pages=ceil($total_records/$num_per_page);
    //echo $total_pages;
    for($i=1;$i<=$total_pages;$i++){
        echo "<button><a href='student_records.php?page=".$i."'>".$i."</a></button>"
;   }
mysqli_close($connect);

    ?>
 

</body>
</html>