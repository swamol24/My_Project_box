<?php
include("connection.php");
include("admin_dashboard.php");
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
        button{margin-bottom: 15px;
                 padding: 10px;
                 font-weight: bold;
                 font-size: 15px;
                 color: white;
                 background-color: black;
             } 
         button:hover{background: navy;} 
         button a {color: white;}
         button a:hover{color: white;}  
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
      </style>
</head>
<body>
<button><a href="add_score.php">Add Student Marks record</a></button>
 <table border="1px" width=100%>
        <tr>
        <th>Id</th>
        <th >Fullname</th>
        <th >Subject</th>
        <th>Marks</th>
        <th >Edit/Update</th>
        <th >Delete</th>
        </tr>
 
 <?php
  //fetch data from database

 $sql = "SELECT * FROM score_card";
 // $sql = "SELECT fullname,image FROM student";
 // $sql = "SELECT * FROM student LIMIT 3 offset 2";
$result = mysqli_query($connect,$sql);
if(mysqli_num_rows($result) > 0){
       $i =1;
while ($row = mysqli_fetch_assoc($result)) {?>
<tr>
    <!-- <td ><//?php echo $i; ?></td>   -->
    <td><?php echo $row["id"]; ?></td>
    <td ><?php echo $row["fullname"]; ?></td>
    <td ><?php echo $row["subject"]; ?></td>
    <td><?php echo $row["marks"]; ?></td>
    <td id="edit_tab"><a href="update_record.php ? id=<?php echo $row["id"]; ?>">Edit/Update</a></td> 
    <td id="delete_tab" ><a href="delete_record.php ? id=<?php echo $row["id"]; ?>">Delete</a></td>      
 </tr>
 <?php 
  $i++; 
 } 
}
 else{
       echo "results 0";
 }
mysqli_close($connect);

 ?>
 </table>
</body>
</html>