<?php
    // session_start();
     
    // if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
    //     header('index.php');
    //     exit();
    // }
    // include('connection.php');
    // $query=mysqli_query($connect,"select * from admin_login where user_id='".$_SESSION['id']."'");
    // $row=mysqli_fetch_assoc($query);
?>
<?php

// include("connection.php");

// session_start();

// if(!isset($_SESSION['admin_name'])){
//    header('location:login_form.php');
// }

?>

 <input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
            <h3><span>Admin</span></h3>
        </div>
        
        <div class="side-content">
            <div class="profile">
                <div class="profile-img bg-img" style="background-image: url(img/3.jpeg)"></div>
            <!-- <h2 style="color:white";><?php  echo $row['user_name']; ?></h2> -->
                  <h2 style="color:white";>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h2>
                <small>School Director</small>
            </div>

            <div class="side-menu">
                <ul>
                    <li>
                       <a href="admin_dashboard.php" class="active">
                            <span class="las la-home"></span>
                            <small>Dashboard</small>
                        </a>
                    </li>
                    <li>
                       <a href="student_records.php">
                            <span class="las la-user-alt"></span>
                            <small>Student Record</small>
                        </a>
                    </li>
                    <li>
                       <a href="student_attendence_records.php">
                            <span class="las la-envelope"></span>
                            <small>Attendence List</small>
                        </a>
                    </li>
                    <li>
                       <a href="score_record.php">
                            <span class="las la-clipboard-list"></span>
                            <small>Markes</small>
                        </a>
                    </li>
                    <li>
                       <a href="fee_history_record.php">
                            <span class="las la-shopping-cart"></span>
                            <small>Fee History</small>
                        </a>
                    </li>
                    <li>
                       <a href="staff_record.php">
                            <span class="las la-tasks"></span>
                            <small>Staff Record</small>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>