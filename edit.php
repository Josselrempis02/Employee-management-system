<?php

include_once("connections/connection.php");

// Always start session
session_start();

// Connect to database
$con = connection();

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];

    // Display the employee data
    $sql = "SELECT * FROM employee_list WHERE id = '$id'";
    $employee = $con->query($sql) or die($con->error);
    $row = $employee->fetch_assoc();                                   

    // Update button function
    if (isset($_POST['update'])) {
        // Sanitize and validate input data
        $fname = mysqli_real_escape_string($con, $_POST['fname']);
        $number = mysqli_real_escape_string($con, $_POST['number']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $departments = mysqli_real_escape_string($con, $_POST['departments']);
        $dob = mysqli_real_escape_string($con, $_POST['dob']);
        $gender = mysqli_real_escape_string($con, $_POST['gender']);

        // Update query
        $updateSql = "UPDATE employee_list SET f_name='$fname', Contact_no='$number', email='$email', Departments='$departments', `add`='$address', date='$dob', Gender='$gender' WHERE id='$id'";

        if ($con->query($updateSql) === TRUE) {
            // Successful submission
            $_SESSION['success_message'] = "Changes have been successfully updated.";
            echo '<script>alert("Changes have been successfully updated!"); window.location.href = "employee.php?ID=' . $id . '";</script>';
            exit; // Exit to prevent further execution
        } else {
            // Error handling
            $_SESSION['error_message'] = "Error updating record: " . $con->error;
            echo '<script>alert("Error updating record: ' . $con->error . '"); window.location.href = "edit.php";</script>';
            exit; // Exit to prevent further execution
        }
    }

  // Cancel button function
        if (isset($_POST['cancel'])) {
          // Redirect to employee.php using JavaScript
          echo '<script>window.location.href = "employee.php?ID=' . $id . '";</script>';
          exit;
        }


}


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
            <h2>Employee Data</h2>
          </div>
          <div class="user-info">
            <div class="search-box">
            
            
          </div>
          <img src="assets/profile.png" alt="">
          </div>
        </div>

       


          <div class="table-data">
            <div class="dep">
              <div class="head">
                <h3>Edit Employee</h3>                
                <i class='bx bx-filter'></i>
              </div>
            

              <div class="container">
                <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="form first">
                        <div class="details personal">
                            <span class="title">Employee Details</span>
                            <div class="fields">
                                <div class="input-field">
                                    <label>Full Name</label>
                                    <input type="text" placeholder="Enter your name" name="fname" value="<?php echo $row['f_name']; ?>" required>
                                </div>
                                <div class="input-field">
                                    <label>Date of Birth</label>
                                    <input type="date" placeholder="Enter birth date" name="dob" value="<?php echo $row['date']; ?>" required>
                                </div>
                                <div class="input-field">
                                    <label>Email</label>
                                    <input type="text" placeholder="Enter your email" name = "email" value="<?php echo $row['email']; ?>" required>
                                </div>
                                <div class="input-field">
                                  <label>Address</label>
                                  <input type="text" placeholder="Enter your address" name="address"  value="<?php echo $row['add']; ?>"required>
                                </div>
                                <div class="input-field">
                                    <label>Mobile Number</label>
                                    <input type="number" placeholder="Enter mobile number" name="number"  value="<?php echo $row['Contact_no']; ?>" required>
                                </div>
                                <div class="input-field">
                                    <label for="department">Department</label>
                                    <select id="department"  name="departments" required>
                                      <option value="" <?php echo ($row['Departments'] == 'dep') ? 'selected' : ''; ?> disabled selected hidden>Choose Department</option>
                                      <option value="HR" <?php echo ($row['Departments'] == 'HR') ? 'selected' : ''; ?>>HR Department</option>
                                      <option value="IT" <?php echo ($row['Departments'] == 'IT') ? 'selected' : ''; ?>>IT Department</option>
                                      <option value="Finance" <?php echo ($row['Departments'] == 'Finance') ? 'selected' : ''; ?>>Finance Department</option>
                                      <option value="Marketing" <?php echo ($row['Departments'] == 'Marketing') ? 'selected' : ''; ?>>Marketing Department</option>
                                      <option value="Operations" <?php echo ($row['Departments'] == 'Operations') ? 'selected' : ''; ?>>Operations Department</option>
                                      <option value="Sales" <?php echo ($row['Departments'] == 'Sales') ? 'selected' : ''; ?>>Sales Department</option>
                                      <option value="CustomerService" <?php echo ($row['Departments'] == 'CustomerService') ? 'selected' : ''; ?>>Customer Service Department</option>
                                      <option value="Legal" <?php echo ($row['Departments'] == 'Legal') ? 'selected' : ''; ?>>Legal Department</option>
                                      <option value="Production" <?php echo ($row['Departments'] == 'Production') ? 'selected' : ''; ?>>Production Department</option>
                                      <option value="QualityAssurance" <?php echo ($row['Departments'] == 'QualityAssurance') ? 'selected' : ''; ?>>Quality Assurance Department</option>
                                      <option value="SupplyChain" <?php echo ($row['Departments'] == 'SupplyChain') ? 'selected' : ''; ?>>Supply Chain Department</option>
                                      <option value="SoftwareDevelopment" <?php echo ($row['Departments'] == 'SoftwareDevelopment') ? 'selected' : ''; ?>>Software Development Team</option>
                                      <option value="Testing" <?php echo ($row['Departments'] == 'Testing') ? 'selected' : ''; ?>>Testing and QA Department</option>
                                      <option value="DevOps" <?php echo ($row['Departments'] == 'DevOps') ? 'selected' : ''; ?>>DevOps Department</option>
                                      <option value="TechSupport" <?php echo ($row['Departments'] == 'TechSupport') ? 'selected' : ''; ?>>Technical Support Department</option>
                                      <option value="UIUX" <?php echo ($row['Departments'] == 'UIUX') ? 'selected' : ''; ?>>UI/UX Design Department</option>
                                      <option value="Cybersecurity" <?php echo ($row['Departments'] == 'Cybersecurity') ? 'selected' : ''; ?>>Cybersecurity Department</option>
                                    </select>
                                  </div>

                                <div class="input-field">
                                    <label>Gender</label>
                                    <select name="gender" id="gender" required>
                                        <option disabled selected>Select gender</option>
                                        <option value="Male" <?php if($row['Gender'] == 'Male') echo 'selected';?>>Male</option>
                                        <option value="Female" <?php if($row['Gender'] == 'Female') echo 'selected';?>>Female</option>
                                        <option>Others</option>
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                        <div class="details ID">
                            <button class="submit" name="cancel">
                            <input class="btnText" type="submit" name="cancel"  value="Cancel">
                              <i class="uil uil-navigator"></i>
                          </button>

                          <button class="submit" name="update">
                            <input class="btnText" type="submit" name="update"  value="Update">
                              <i class="uil uil-navigator"></i>
                          </button>
                        </div> 
                    </div>
                    
                             
                            </div>
                        </div> 
                    </div>
                </form>
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