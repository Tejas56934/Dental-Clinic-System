<?php
// Start the session to access session variables
session_start();

// Include Composer autoload
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Check if session variables are set
if (isset($_SESSION['email'], $_SESSION['platform'], $_SESSION['upiId'], $_SESSION['amount'])) {
    // Email and payment details
    $email = $_SESSION['email'];
    $platform = $_SESSION['platform'];
    $upiId = $_SESSION['upiId'];
    $amount = $_SESSION['amount'];

    // Create instance of PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'tejaspandit623@gmail.com';
        $mail->Password   = 'anvp fxqf ydnu txhr';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('tejaspandit623@gmail.com', 'Dr. Yadav Dental Clinic');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Payment Confirmation';
        $mail->Body    = "Dear User,<br><br>Your payment was successful!<br><br>
                          <strong>Platform:</strong> $platform<br>
                          <strong>UPI ID:</strong> $upiId<br>
                          <strong>Amount:</strong> ₹$amount<br><br>
                          Thank you for your payment!";

        // Send the email
        $mail->send();
        header("Location: receipt.php");
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo 'Payment details are missing or session has expired.';
}
?>
