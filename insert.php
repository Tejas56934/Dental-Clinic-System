<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture and sanitize input
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $city_village = htmlspecialchars(trim($_POST['city_village'] ?? ''));
    $treatment = htmlspecialchars(trim($_POST['treatment'] ?? ''));
    $date = htmlspecialchars(trim($_POST['date'] ?? ''));
    $time = htmlspecialchars(trim($_POST['time'] ?? ''));

    // Validate required fields
    if (empty($name) || empty($email) || empty($phone) || empty($city_village) || empty($treatment) || empty($date) || empty($time)) {
        die("All fields are required.");
    }

    // Database connection
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "major2";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    // Insert data into database
    $stmt = $conn->prepare("INSERT INTO appointments3 (name, email, phone, `city/village`, `Select Treatment`, `Preferred date`, `Preferred time`) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $email, $phone, $city_village, $treatment, $date, $time);

    if ($stmt->execute()) {
        // Store appointment details in the session
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['city_village'] = $city_village;
        $_SESSION['treatment'] = $treatment;
        $_SESSION['date'] = $date;
        $_SESSION['time'] = $time;

        // Send confirmation email
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

            // Redirect to thank-you page
            header("Location: payment.html");
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error saving appointment details: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo 'Invalid request method.';
}
