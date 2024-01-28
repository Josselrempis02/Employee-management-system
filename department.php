<?php
session_start();

 // Connect to the database
 include_once("connections/connection.php");
 $con = connection();
 
 // Fetch Department data
 $sql = "SELECT * FROM department_list ORDER BY id DESC";
 $department = $con->query($sql) or die ($con->error);
 $row = $department->fetch_assoc();
 

 
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
            <span></span>
            <h2>Department</h2>
          </div>
          <div class="user-info">
            <div class="search-box">
            <i class='bx bx-search-alt icon'></i>
            <input type="text" name="" id="" placeholder="Search">

          </div>
          <img src="<?php echo $imagePath; ?>" alt="User Photo">
          </div>
        </div>

      
        </div> 


          <div class="table-data">
            <div class="dep">
              <div class="head">
                <h3>Department Table</h3>
                <i class='bx bx-search-alt'></i>
                <i class='bx bx-filter'></i>
              </div>
              <table>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Dept Code</th>
                    <th>Department Name</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                      $counter = 1;

                      while ($row = $department->fetch_assoc()): ?>
                          <tr>
                              <td><?php echo $counter; ?></td>
                              <td><?php echo $row['dept_code']; ?></td>
                              <td><?php echo $row['dept_name']; ?></td>
                              <td><span class="status">Active</span></td>
                          </tr>
                          <?php $counter++; ?>
                      <?php endwhile; ?>
              </tbody>
              </table>
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