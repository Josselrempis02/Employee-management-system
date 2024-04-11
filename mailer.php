<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . "/vendor/autoload.php";

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

// Set mailer to use SMTP
$mail->isSMTP();

// Enable SMTP authentication
$mail->SMTPAuth = true;

// SMTP host
$mail->Host = "smtp-relay.gmail.com";

// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

// TCP port to connect to; use 587 if you have set `SMTPSecure` to `PHPMailer::ENCRYPTION_STARTTLS`
$mail->Port = 25;

// SMTP username
$mail->Username = "your-user@example.com";

// SMTP password
$mail->Password = "your-password";

// Set email format to HTML
$mail->isHTML(true);

// Return the mailer object
return $mail;
