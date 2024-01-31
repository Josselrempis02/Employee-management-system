<?php
include_once("connections/connection.php");

  // Always start session
  session_start();



  // Connect to database
  $con = connection();

 // Fetch employee data
 $sql = "SELECT * FROM department_list ORDER BY id DESC";
 $employee = $con->query($sql) or die ($con->error);
   ?>



<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <title>Employee Management</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
      <link rel="stylesheet" href="css/style1.css">
      
    </head>
    <body>
       
      <nav class="sidebar close">
        <header>
          <div class="image-text">
            <span class="image">
              <img src="assets/employee.png" alt="logo">
            </span>
            <div class="text header-text">
              <span class="name">Employee Mangement</span>
            </div>
          </div>

          <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
          <div class="menu">
            <!-- <li class="search-box">
              <a href="#">
                <i class='bx bx-search-alt icon'></i>
                <input type="search" placeholder="Search...">
              </a>
            </li> -->
            <ul class="menu-links">
              <li class="nav-link">
                <a href="index.php">
                  <i class='bx bx-home-alt icon' ></i>
                  <span class="nav-text">Dashboard</span>
                </a>
              </li>
              <li class="nav-link">
                <a href="department.php">
                  <i class='bx bx-buildings icon'></i>
                  <span class="nav-text">Department</span>
                </a>
              </li>
              <li class="nav-link">
                <a href="employee.php">
                  <i class='bx bxs-user-badge icon'></i>
                  <span class="nav-text">Employee</span>
                </a>
              </li>
              <li class="nav-link">
                <a href="users.php">
                  <i class='bx bx-user icon'></i>
                  <span class="nav-text">Users</span>
                </a>
              </li>
            </ul>
          </div>
          <div class="bottom-content">
            <li class="">
              <a href="logout.php">
                <i class='bx bx-log-out icon'></i>
                <span class="nav-text">Logout</span>
              </a>
            </li>
          </div>
        </div>
      </nav>


      <!-- DASHBOARD -->
      <section class="home">
       <div class="main-content">
        <div class="header-wrapper">
          <div class="header-title">
            <span>Management</span>
            <h2>Dashboard</h2>
          </div>
          <div class="user-info">
            <div class="search-box">
            <i class='bx bx-search-alt icon'></i>
            <input type="text" name="" id="" placeholder="Search">
          </div>
          <img src="assets/profile.png" alt="">
          </div>
        </div>

     

        <ul class="box-info">
          <li>
            <i class='bx bx-building' ></i>
           <span class="text">
           <?php
            $count = "SELECT * from department_list";
            $count_run = mysqli_query($con, $count);

            if($count_total = mysqli_num_rows($count_run)){
              echo '<h3> '.$count_total .'</h3>';
            } else{
              echo '<h3> no data </h3>';
            }
            
            
            ?>
            <p>Departments</p>
          </span>
          <li>
            <i class='bx bxs-user-badge'></i>
           <span class="text">
            <?php
            $count = "SELECT * from employee_list";
            $count_run = mysqli_query($con, $count);

            if($count_total = mysqli_num_rows($count_run)){
              echo '<h3> '.$count_total .'</h3>';
            } else{
              echo '<h3> no data </h3>';
            }
            
            
            ?>

            <p>Employee</p>
          </span>
          <li>
            <i class='bx bx-user' ></i>
           <span class="text">
           <?php
            $count = "SELECT * from employee_users";
            $count_run = mysqli_query($con, $count);

            if($count_total = mysqli_num_rows($count_run)){
              echo '<h3> '.$count_total .'</h3>';
            } else{
              echo '<h3> no data </h3>';
            }
            
            
            ?>
            <p>Users</p>
          </span>
          </li>
        </ul>

          <div class="table-data">
            <div class="dep">
              <div class="head">
                <h3>Departments Employee</h3>
                <i class='bx bx-search-alt'></i>
                <i class='bx bx-filter'></i>
              </div>
              <table>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Department</th>
                    <th>Employees</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <td>wawa</td>
                  </tr>
              </tbody>
              </table>
            </div>
            <div class="todo">
              <div class="dep">
              <div class="head">
                <h3>Users</h3>
                <i class='bx bx-search-alt'></i>
                <i class='bx bx-filter'></i>
              </div>
              <table>
              <?php
                  $sql = "SELECT * FROM `employee_users` ORDER BY id DESC";
                  $employee_result = $con->query($sql) or die($con->error);
                  ?>

                  <thead>
                      <tr>
                          <th>Name</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      // Loop through the result set
                      while ($row = $employee_result->fetch_assoc()) {
                      ?>
                          <tr>
                              <td>
                                  <img src="assets/profile.png" alt="">
                                  <p><?php echo $row['fullname']; ?></p>
                              </td>
                          </tr>
                      <?php
                      }
                      ?>
                  </tbody>
              </table>
              </div>
            </div>
          </div>

        
       </div>
      </section>


      










      
       

          <script>
            const body = document.querySelector("body"),
            sidebar = document.querySelector(".sidebar"),
            toggle = document.querySelector(".toggle");

            toggle.addEventListener("click", () =>{
              sidebar.classList.toggle("close");
 });
          </script>
    </body>
</html>