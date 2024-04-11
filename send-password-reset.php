<?php

// Check if "email" key exists in $_POST array
if (isset($_POST["email"])) {
    $email = $_POST["email"];

    $token = bin2hex(random_bytes(16));

    $token_hash = hash("sha256", $token);

    $expiry = date("Y-m-d H:i:s", time() + 60 * 30);

    include_once("connections/connection.php");
    $con = connection();

    $sql = "UPDATE employee_users
            SET reset_token_hash = ?,
                reset_token_expires_at = ?
            WHERE email = ?";

    $stmt = $con->prepare($sql);

    $stmt->bind_param("sss", $token_hash, $expiry, $email);

    $stmt->execute();

    if ($stmt->affected_rows) {

        $mail = require __DIR__ . "/mailer.php";

        $mail->setFrom("noreply@example.com");
        $mail->addAddress($email);
        $mail->Subject = "Password Reset";
        $mail->Body = <<<END

        Click <a href="http://example.com/reset-password.php?token=$token">here</a> 
        to reset your password.

        END;

        try {

            $mail->send();

        } catch (Exception $e) {

            echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";

        }

    }

    echo "Message sent, please check your inbox.";
} else {
    // If "email" key is not found in $_POST array
    echo "Email address not provided.";
}
