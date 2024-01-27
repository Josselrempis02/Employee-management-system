
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
                <a href="index.html">
                  <i class='bx bx-home-alt icon' ></i>
                  <span class="nav-text">Dashboard</span>
                </a>
              </li>
              <li class="nav-link">
                <a href="department.html">
                  <i class='bx bx-buildings icon'></i>
                  <span class="nav-text">Department</span>
                </a>
              </li>
              <li class="nav-link">
                <a href="employee.html">
                  <i class='bx bxs-user-badge icon'></i>
                  <span class="nav-text">Employee</span>
                </a>
              </li>
              <li class="nav-link">
                <a href="users.html">
                  <i class='bx bx-user icon'></i>
                  <span class="nav-text">Users</span>
                </a>
              </li>
            </ul>
          </div>
          <div class="bottom-content">
            <li class="">
              <a href="#">
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
            <h2>Employee</h2>
          </div>
          <div class="user-info">
            <div class="search-box">
            <i class='bx bx-search-alt icon'></i>
            <input type="text" name="" id="" placeholder="Search">
          </div>
          <img src="assets/profile.jpg" alt="">
          </div>
        </div>

        <!-- <div class="card-container">
          <h1 class="main-title"></h1>
          <div class="card-wrapper">
            <div class="employee-card">
              <div class="card-header">
                <div class="employee">
                <span class="title">
                  Departments
                </span>
                <span class="employe-value">59</span>
              </div>
              <i class='bx bx-building icons' ></i>
            </div>
          </div>

          <div class="employee-card">
            <div class="card-header">
              <div class="employee">
              <span class="title">
                Employees
              </span>
              <span class="employe-value">59</span>
            </div>
            <i class='bx bxs-user-rectangle icons'></i>
          </div>
        </div>

        <div class="employee-card">
          <div class="card-header">
            <div class="employee">
            <span class="title">
              Users
            </span>
            <span class="employe-value">59</span>
          </div>
          <i class='bx bx-user icons'></i>
        </div>
      </div>
          </div>

          
        </div> -->


          <div class="table-data">
            <div class="dep">
              <div class="head">
                <h3>Employee List</h3>
                  <button class="button">
                        <i class='bx bx-plus'></i>
                        <a href="add.html" class="add">
                          <span class="bxs-text">Add Employee</span></a>
                </button>
                <i class='bx bx-filter'></i>
              </div>
              <table>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Employee Name</th>
                    <th>Depart</th>
                    <th>Date</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <td>1</td>
                      <td>Jossel Alfred</td>
                      <td>IT DEPARTMENT</td>
                      <td>09-23-23</td>
                      <td>091667790871</td>
                      <td>Manila City</td>
                      <td>
                         <i class='bx bx-edit '></i>
                         <i class='bx bxs-trash '></i>
                      </td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Jossel Alfred</td>
                    <td>IT DEPARTMENT</td>
                    <td>09-23-23</td>
                    <td>091667790871</td>
                    <td>Manila City</td>
                    <td>
                       <i class='bx bx-edit '></i>
                       <i class='bx bxs-trash '></i>
                    </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Jossel Alfred</td>
                  <td>IT DEPARTMENT</td>
                  <td>09-23-23</td>
                  <td>091667790871</td>
                  <td>Manila City</td>
                  <td>
                     <i class='bx bx-edit '></i>
                     <i class='bx bxs-trash '></i>
                  </td>
              </tr>
              <tr>
                <td>1</td>
                <td>Jossel Alfred</td>
                <td>IT DEPARTMENT</td>
                <td>09-23-23</td>
                <td>091667790871</td>
                <td>Manila City</td>
                <td>
                   <i class='bx bx-edit '></i>
                   <i class='bx bxs-trash '></i>
                </td>
            </tr>
            <tr>
              <td>1</td>
              <td>Jossel Alfred</td>
              <td>IT DEPARTMENT</td>
              <td>09-23-23</td>
              <td>091667790871</td>
              <td>Manila City</td>
              <td>
                 <i class='bx bx-edit '></i>
                 <i class='bx bxs-trash '></i>
              </td>
          </tr>
          <tr>
            <td>1</td>
            <td>Jossel Alfred</td>
            <td>IT DEPARTMENT</td>
            <td>09-23-23</td>
            <td>091667790871</td>
            <td>Manila City</td>
            <td>
               <i class='bx bx-edit '></i>
               <i class='bx bxs-trash '></i>
            </td>
        </tr>
        <tr>
          <td>1</td>
          <td>Jossel Alfred</td>
          <td>IT DEPARTMENT</td>
          <td>09-23-23</td>
          <td>091667790871</td>
          <td>Manila City</td>
          <td>
             <i class='bx bx-edit '></i>
             <i class='bx bxs-trash '></i>
          </td>
      </tr>
      <tr>
        <td>1</td>
        <td>Jossel Alfred</td>
        <td>IT DEPARTMENT</td>
        <td>09-23-23</td>
        <td>091667790871</td>
        <td>Manila City</td>
        <td>
           <i class='bx bx-edit '></i>
           <i class='bx bxs-trash '></i>
        </td>
    </tr>
    <tr>
      <td>1</td>
      <td>Jossel Alfred</td>
      <td>IT DEPARTMENT</td>
      <td>09-23-23</td>
      <td>091667790871</td>
      <td>Manila City</td>
      <td>
         <i class='bx bx-edit '></i>
         <i class='bx bxs-trash '></i>
      </td>
  </tr>
                  
            
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