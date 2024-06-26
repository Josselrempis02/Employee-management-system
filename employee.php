<?php 
    include_once("connections/connection.php");

      // Check if the user is not logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  // Redirect to login page
  header("Location: login.php");
  exit(); // Ensure script execution stops after redirection
}

    // Always start session
    session_start();

    // Connect to database
    $con = connection();

    // Fetch employee data
    $sql = "SELECT * FROM employee_list ORDER BY id DESC";
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
                        <h3>Employee List</h3>
                        <button class="button">
                            <i class='bx bx-plus'></i>
                            <a href="add.php" class="add">
                                <span class="bxs-text">Add Employee</span>
                            </a>
                        </button>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Employee Name</th>
                                <th>Depart</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                // Fetch data inside the do-while loop
                                while ($row = $employee->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['f_name']; ?></td>
                                    <td><?php echo $row['Departments']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['Contact_no']; ?></td>
                                    <td><?php echo $row['add']; ?></td>
                                    <td class="button_form">
                                        <a href="edit.php?ID=<?php echo $row['id']; ?>"><i class='bx bx-edit'></i></a>
                                        <!-- Add the delete form here -->
                                        <form  action="delete.php" method="get" >
                                            <input type="hidden" name="ID" value="<?php echo $row['id']; ?>">
                                            <button class= "button2" type="submit" onclick="return confirm('Are you sure you want to delete this record?')">
                                                <i class='bx bxs-trash'></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
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
