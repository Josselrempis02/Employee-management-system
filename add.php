
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
            <h2>Employee Data</h2>
          </div>
          <div class="user-info">
            <div class="search-box">
            <p>Jossel Rempis</p>
            
          </div>
          <img src="assets/profile.jpg" alt="">
          </div>
        </div>

       


          <div class="table-data">
            <div class="dep">
              <div class="head">
                <h3>Add New Employee</h3>                
                <i class='bx bx-filter'></i>
              </div>
            

              <div class="container">
                <form action="add.php" method="post">
                    <div class="form first">
                        <div class="details personal">
                            <span class="title">Employee Details</span>
                            <div class="fields">
                                <div class="input-field">
                                    <label>Full Name</label>
                                    <input type="text" placeholder="Enter your name" name="fname" required>
                                </div>
                                <div class="input-field">
                                    <label>Date of Birth</label>
                                    <input type="date" placeholder="Enter birth date" name="dob" required>
                                </div>
                                <div class="input-field">
                                    <label>Email</label>
                                    <input type="text" placeholder="Enter your email" required>
                                </div>
                                <div class="input-field">
                                  <label>Address</label>
                                  <input type="text" placeholder="Enter your address" name="address" required>
                                </div>
                                <div class="input-field">
                                    <label>Mobile Number</label>
                                    <input type="number" placeholder="Enter mobile number" name="number" required>
                                </div>
                                <div class="input-field">
                                  <label> Department</label>
                                  <option class="dep" value="dep" disabled selected hidden>Choose Department</option>
                                  <option value="HR">HR Department</option>
                                  <option value="IT">IT Department</option>
                                  <option value="Finance">Finance Department</option>
                                  <option value="Marketing">Marketing Department</option>
                                  <option value="Operations">Operations Department</option>
                                  <option value="Sales">Sales Department</option>
                                  <option value="CustomerService">Customer Service Department</option>
                                  <option value="Legal">Legal Department</option>
                                  <option value="Production">Production Department</option>
                                  <option value="QualityAssurance">Quality Assurance Department</option>
                                  <option value="SupplyChain">Supply Chain Department</option>
                                  <option value="SoftwareDevelopment">Software Development Team</option>
                                  <option value="Testing">Testing and QA Department</option>
                                  <option value="DevOps">DevOps Department</option>
                                  <option value="TechSupport">Technical Support Department</option>
                                  <option value="UIUX">UI/UX Design Department</option>
                                  <option value="Cybersecurity">Cybersecurity Department</option>
                                </div>
                                <div class="input-field">
                                    <label>Gender</label>
                                    <select name="gender" id="gender" required>
                                        <option disabled selected>Select gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Others</option>
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                        <div class="details ID">
                            <button class="sumbit">
                              <span class="btnText" name="submit">Submit</span>
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