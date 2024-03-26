<?php
require '../lib/vendor/autoload.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$smtpConfig = array(
    'host' => 'panel.freehosting.com',
    'username' => 'info@gettogetherexporters.com',
    'password' => 'info@gte',
    'port' => 587,
    'encryption' => PHPMailer::ENCRYPTION_STARTTLS,
);

?>
