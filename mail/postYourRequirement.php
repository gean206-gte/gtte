<?php
require '../lib/vendor/autoload.php'; // Adjust the path if needed

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productServices = htmlspecialchars($_POST['productServices']);
    $quantity = htmlspecialchars($_POST['quantity']);
    $measurement = htmlspecialchars($_POST['measurement']);
    $mobileNumber = htmlspecialchars($_POST['mobileNumber']);

    $mail = new PHPMailer(true);

    try {

     // Server settings
        $mail->isSMTP();
        $mail->Host       = 'panel.freehosting.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'info@gettogetherexporters.com';
        $mail->Password   = 'info@gte';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom("info@gettogetherexporters.com", $mobileNumber);
        $mail->addAddress('info@gettogetherexporters.com', 'Recipient Name');

        // Content
        $mail->isHTML(true);
        $mail->Subject = $mobileNumber . ' posted a new requirement';
        $mail->Body    = 'Requested Product or Service: ' . $productServices . ', <br>Quantity: ' . $quantity . ', <br>Measurement: ' . $measurement . ', <br>Customer mobile number: ' . $mobileNumber;


        $mail->send();
        echo "Email sent successfully!";
    } catch (Exception $e) {
        // Log the error message (you can customize the log file path and format)
        error_log("Email sending failed: " . $mail->ErrorInfo, 0);

        // Display a user-friendly error message
        echo "Oops! Something went wrong. Please try again later.";
    }
}
