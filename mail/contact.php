<?php
require '../lib/vendor/autoload.php'; // Adjust the path if needed

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'cloud3.googiehost.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'gettoge1@gettogetherexporters.com';  // Replace with your email address
        $mail->Password   = 'Zd8a{gKv@Cez6v+';  // Replace with your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Use PHPMailer::ENCRYPTION_SMTPS if required
        $mail->Port       = 587;  // Adjust the port if needed

        // Recipients
        $mail->setFrom("info@gettogetherexporters.com", $name);
        $mail->addAddress('info@gettogetherexporters.com', 'Recipient Name');

    
        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        echo "Email sent successfully!";
    } catch (Exception $e) {
        // Log the error message (you can customize the log file path and format)
        error_log("Email sending failed: " . $mail->ErrorInfo, 0);
    
        // Display a user-friendly error message
        echo "Oops! Something went wrong. Please try again later.";
    }
}
