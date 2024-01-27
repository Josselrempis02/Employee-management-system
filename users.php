<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Employee Management</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
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
                    <span class="name">Employee Management</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="index.html">
                            <i class='bx bx-home-alt icon'></i>
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
                        <a href="#">
                            <i class='bx bx-user icon'></i>
                            <span class="nav-text">Users</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bottom-content">
                <ul>
                    <li>
                        <a href="#">
                            <i class='bx bx-log-out icon'></i>
                            <span class="nav-text">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- DASHBOARD -->
    <section class="home">
        <div class="main-content">
            <div class="header-wrapper">
                <div class="header-title">
                    <span></span>
                    <h2>Users</h2>
                </div>
                <div class="user-info">
                    <div class="search-box">
                        <i class='bx bx-search-alt icon'></i>
                        <input type="text" name="" id="" placeholder="Search">
                    </div>
                    <img src="assets/profile.jpg" alt="">
                </div>
            </div>

            <div class="table-data">
                <div class="dep">
                    <div class="head">
                        <h3>List of Users</h3>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="assets/profile.jpg" alt="">
                                    <p>Jossel</p>
                                </td>
                                <td>Josselrempis02@gmail.com</td>
                                <td>
                                  <i class='bx bx-show icons'></i>
                                </td>
                            </tr>

                            <tr>

                              <td>
                                  <img src="assets/profile.jpg" alt="">
                                  <p>Jossel</p>
                              </td>
                              <td>Josselrempis02@gmail.com</td>
                              <td>
                                <i class='bx bx-show icons'></i>
                              </td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</body>

</html>



      










      
       

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