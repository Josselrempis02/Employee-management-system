<?php
session_start();

// Connect to the database
include_once("connections/connection.php");
$con = connection();

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM employee_users WHERE email = ?";
    $stmt = mysqli_stmt_init($con);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            // Verify password
            if (password_verify($password, $user["password"])) {
                // Successful login
                $_SESSION["logged_in"] = true; // Set login status
                $_SESSION["email"] = $user["email"]; // Store email in session, if needed
                $_SESSION["user_id"] = $user["id"]; // Assuming user id is stored in 'id' column
                
                // Redirect to homepage
                header("Location: index.php");
                exit();
            } else {
                $error = "Password does not match";
            }
        } else {
            $error = "Email does not match";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employee Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="form-wrapper">
        <div class="form-side">
            <a href="#" title="Logo">
                <img class="logo" src="assets/employee.png" alt="Logo">
            </a>
            <form class="my-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="login-welcome-row">
                    <h1>Hi! Welcome &#x1F44F;</h1>
                </div>
                <div class="text-field">
                    <label for="email">Email:
                        <input type="email" id="email" name="email" placeholder="Your Email" required>
                    </label>
                </div>
                <div class="text-field">
                    <label for="password">Password:
                        <input id="password" type="password" name="password" placeholder="Your Password" required>
                    </label>
                </div>
                <button class="my-form__button" type="submit" name="login">Login</button>
                <?php if(isset($error)) { ?>
                <p class="alert alert-danger"><?php echo $error; ?></p>
                <?php } ?>
                <div class="my-form__actions">
                    <div class="my-form__row">
                        <span>Did you forget your password?</span>
                        <a href="forgot-password.php" title="Reset Password">Reset Password</a>
                    </div>
                    <div class="my-form__signup">
                        <a href="register.php" title="Login">Don't have an account?</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="info-side">
            <img src="assets/employee.png" alt="Mock" class="mockup" />
            <div class="welcome-message">
                <h2>Employee Management 👋</h2>
                <p>Effortlessly oversee employee-related records and maintain organization with our Employee Management System.</p>
            </div>
        </div>
    </div>
</body>

</html>




   




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employee Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="form-wrapper">
        <div class="form-side">
            <a href="#" title="Logo">
                <img class="logo" src="assets/employee.png" alt="Logo">
            </a>
            <form class="my-form" action="login.php" method="post">
           
   


                <div class="login-welcome-row">
                    <h1>Hi! Welcome &#x1F44F;</h1>
                </div>
              
                <div class="text-field">
                    <label for="email">Email:
                        <input type="email" id="email" name="email"  placeholder="Your Email"
                            required>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                            <path d="M16 12v1.5a2.5 2.5 0 0 0 5 0v-1.5a9 9 0 1 0 -5.5 8.28"></path>
                        </svg>
                    </label>
                </div>
                <div class="text-field">
                    <label for="password">Password:
                        <input id="password" type="password" name="password" placeholder="Your Password" 
                             >
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z">
                            </path>
                            <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
                            <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
                        </svg>
                    </label>
                </div>
                <button class="my-form__button" name="login" type="submit">
                <input class="button1" type="submit" name="login"  onclick="showAlert()" value="Login">
                </button>
                    
                <div class="my-form__actions">
                    <div class="my-form__row">
                        <span>Did you forget your password?</span>
                        <a href="#" title="Reset Password">
                            Reset Password
                        </a>
                    </div>
                    <div class="my-form__signup">
                        <a href="register.php" title="Login">
                            Don't have an account?
                        </a>
                    </div>
                </div>
            </form>
        </div>
        <div class="info-side">
            <img src="assets/employee.png" alt="Mock" class="mockup" />
            <div class="welcome-message">
                <h2>Employee Management 👋</h2>
                <p>
                   
                        Effortlessly oversee employee-related records and maintain organization with our Employee Management System.
                </p>
            </div>
        </div>
    </div>
    <script>
    
    
</script>
    <!-- <script src="js/script.js"></script> -->
</body>

</html>