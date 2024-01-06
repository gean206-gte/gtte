<?php
require '../lib/vendor/autoload.php'; // Adjust the path if needed

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'mail.gettogetherexporters.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'gettoge1@gettogetherexporters.com';  // Replace with your email address
        $mail->Password   = 'Zd8a{gKv@Cez6v+';  // Replace with your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Use PHPMailer::ENCRYPTION_SMTPS if required
        $mail->Port       = 587;  // Adjust the port if needed

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('gettoge1@gettogetherexporters.com', 'Recipient Name');

    
        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        echo "Email sent successfully!";
    } catch (Exception $e) {
        echo "Error: " . $mail->ErrorInfo;
    }
}
