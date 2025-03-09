<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $city_village = htmlspecialchars(trim($_POST['city_village'] ?? ''));
    $treatment = htmlspecialchars(trim($_POST['treatment'] ?? ''));
    $date = htmlspecialchars(trim($_POST['date'] ?? ''));
    $time = htmlspecialchars(trim($_POST['time'] ?? ''));

    // Validate inputs
    if (empty($name) || empty($email) || empty($phone) || empty($city_village) || empty($treatment) || empty($date) || empty($time)) {
        die("All fields are required.");
    }

    try {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'tejaspandit623@gmail.com'; // Replace with your email
        $mail->Password   = 'anvp fxqf ydnu txhr'; // Replace with your App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('tejaspandit623@gmail.com', 'Dr. Yadav Dental Clinic');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Booking Confirmation';
        $mail->Body    = "Dear User,<br><br>Your appointment has been booked!<br><br>
                          <strong>Name:</strong> $name<br>
                          <strong>Email:</strong> $email<br>
                          <strong>Phone Number:</strong> $phone<br>
                          <strong>Selected Treatment:</strong> $treatment<br>
                          <strong>Address:</strong> $city_village<br>
                          <strong>Date:</strong> $date<br>
                          <strong>Time:</strong> $time<br>
                          Your appointment has been booked!";

        $mail->send();
        header("Location: payment.html");
        exit();
    } catch (Exception $e) {
        die("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    }
} else {
    echo 'Appointment details are missing or session has expired.';
}
