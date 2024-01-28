<?php
session_start();

 // Connect to the database
 include_once("connections/connection.php");
 $conn = connection();

 if (isset($_POST["submit"])) {
    $fname = $_POST["fname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Hash the password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Uploading image
    $file = $_FILES['pic'];

    $fileName = $_FILES['pic']['name'];
    $fileTmpName = $_FILES['pic']['tmp_name'];
    $fileSize = $_FILES['pic']['size'];
    $fileError = $_FILES['pic']['error'];
    $fileType = $_FILES['pic']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 500000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'assets/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                // Insert image file name into database
                $sql = "INSERT INTO employee_users (fullname, email, password, image) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, "ssss", $fname, $email, $passwordHash, $fileNameNew);
                    mysqli_stmt_execute($stmt);

                    // Registration successful
                    echo '<script>alert("You are registered successfully.");</script>';
                } else {
                    die("Database error");
                }
            } else {
                echo "Your file is too big";
            }
        } else {
            echo "There was an error uploading your file";
        }
    } else {
        echo "You cannot upload files of this type!";
    }

    $errors = array();

    if (empty($fname) || empty($email) || empty($password)) {
        array_push($errors, "All fields are required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
    }
    if (strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 characters long");
    }

    // Check if email already exists
   // ... your previous code ...

$sql = "SELECT * FROM employee_users WHERE email = ?";
$stmt = mysqli_stmt_init($conn);

if (mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $rowCount = mysqli_num_rows($result);

    if ($rowCount > 0) {
        array_push($errors, "Email already exists!");
    }

    mysqli_stmt_close($stmt);  // Close the statement
} else {
    die("Database error: " . mysqli_error($conn));
}

// ... rest of your code ...

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    }
}


?>















<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="form-wrapper">
        <div class="form-side">
            <a href="#" title="Logo">
                <img class="logo" src="assets/employee.png" alt="Logo">
            </a>
            <form class="my-form" method="post" action="register.php" enctype="multipart/form-data">
                <div class="login-welcome-row">
                    <h1>Create your account &#x1F44F;</h1>
                </div>
              
                <div class="text-field">
                    <label for="fullname">Full name:
                        <input id="text" type="text" name="fname" placeholder="Enter Fullname"
                         required>
                    </label>
                </div>

                <div class="text-field">
                    <label for="email">Email:
                        <input type="email" id="email" name="email" autocomplete="off" placeholder="Your Email"
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
                        <input id="password" type="password" name="password" placeholder="Your Password" title="Minimum 6 characters at 
                                                        least 1 Alphabet and 1 Number"
                            pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" required>
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
            
                <div class="text-field1">
                <label for="file" class="input-pp">Profile Picture:</label>
                <input id="file" type="file" name="pic" class="file"
                required>
                <button class="my-form__button" type="submit" name="submit">
                    Sign up
                </button>
                </div>
                    

                
               
                <div class="my-form__actions">
                    <div class="my-form__row">
                        <span>Did you forget your password?</span>
                        <a href="#" title="Reset Password">
                            Reset Password
                        </a>
                    </div>
                    <div class="my-form__signup">
                        <a href="login.php" title="Login">
                           
                            Already have an account?
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
            </div>
        </div>
    </div>
    <!-- <script src="js/script.js"></script> -->
</body>

</html>