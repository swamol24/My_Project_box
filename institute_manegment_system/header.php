
 <div class="main-content">
        
        <header>
            <div class="header-content">
                <label for="menu-toggle">
                    <span class="las la-bars"></span>
                </label>
                
                <div class="header-menu">
                    <label for="">
                        <span class="las la-search"></span>
                    </label>
                    
                    <div class="notify-icon">
                        <span class="las la-envelope"></span>
                        <span class="notify">4</span>
                    </div>
                    
                    <div class="notify-icon">
                        <span class="las la-bell"></span>
                        <span class="notify">3</span>
                    </div>
                    
                    <div class="user">
                        <div class="bg-img" style="background-image: url(img/1.jpeg)"></div>
                        
                        <span class="las la-power-off"></span>
                        <span><a href="index.php">Logout</a></span>

                    </div>
                </div>
            </div>
        </header>
        
        
        <main>
            
            <div class="page-header">
                <h1>Institute Management System</h1>
                <small>Home / Dashboard</small>
            </div>
            
            <div class="page-content">
            
                <div class="analytics">

                    <div class="card">

                        <div class="card-head">
                            <?php
                            include("connection.php"); 
                            $query = "SELECT id FROM student ORDER BY id";
                            $query_run = mysqli_query($connect,$query);
                            $row = mysqli_num_rows($query_run);
                            echo '<h2>'.$row.'</h2>';
                            ?>
                            <span class="las la-user-friends">
                               </span>
                        </div>

                        <div class="card-progress">
                            <small>Number of Student Register</small>
                            <div class="card-indicator">
                                <div class="indicator one" style="width: 60%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                             <?php
                            include("connection.php"); 
                            $query = "SELECT id FROM staff ORDER BY id";
                            $query_run = mysqli_query($connect,$query);
                            $row = mysqli_num_rows($query_run);
                            echo '<h2>'.$row.'</h2>';
                            ?>
                            <span class="las la-eye"></span>
                        </div>
                        <div class="card-progress">
                            <small>Number Of Staff Member</small>
                            <div class="card-indicator">
                                <div class="indicator two" style="width: 80%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                             <?php
                            include("connection.php"); 
                            $query = "SELECT id FROM student_attendence ORDER BY id";
                            $query_run = mysqli_query($connect,$query);
                            $row = mysqli_num_rows($query_run);
                            echo '<h2>'.$row.'</h2>';
                            ?>
                            <span class="las la-shopping-cart"></span>
                        </div>
                        <div class="card-progress">
                            <small>Student Attendence </small>
                            <div class="card-indicator">
                                <div class="indicator three" style="width: 65%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                             <?php
                            include("connection.php"); 
                            $query = "SELECT id FROM fee_history ORDER BY id";
                            $query_run = mysqli_query($connect,$query);
                            $row = mysqli_num_rows($query_run);
                            echo '<h2>'.$row.'</h2>';
                            ?>
                            <span class="las la-envelope"></span>
                        </div>
                        <div class="card-progress">
                            <small>Student's Fee Count </small>
                            <div class="card-indicator">
                                <div class="indicator four" style="width: 90%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                             <?php
                            include("connection.php"); 
                            $query = "SELECT id FROM score_card ORDER BY id";
                            $query_run = mysqli_query($connect,$query);
                            $row = mysqli_num_rows($query_run);
                            echo '<h2>'.$row.'</h2>';
                            ?>
                            <span class="las la-envelope"></span>
                        </div>
                        <div class="card-progress">
                            <small>Student's Exam Record </small>
                            <div class="card-indicator">
                                <div class="indicator four" style="width: 90%"></div>
                            </div>
                        </div>
                    </div>

                </div>