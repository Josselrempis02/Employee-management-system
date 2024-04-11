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
            <form class="my-form" action="send-password-reset.php" method="post">
                <div class="login-welcome-row">
                    <h1>Forgot Password? </h1>
                </div>
                <div class="text-field">
                    <label for="email">Email:
                        <input type="email" id="email" name="email" placeholder="Your Email" required>
                    </label>
                </div>
              
                <button class="my-form__button" type="submit" name="login">Send</button>
               
                <div class="my-form__actions">
                    
                  
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