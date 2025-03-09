<?php
// Start session
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "major2";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $platform = $conn->real_escape_string($_POST['platform']);
    $upiId = $conn->real_escape_string($_POST['upiId']);
    $email = $conn->real_escape_string($_POST['email']);
    $amount = $conn->real_escape_string($_POST['amount']);

    // Insert data into the Payments table
    $sql = "INSERT INTO payments3 (upi_id, platform, email, amount, payment_date) 
            VALUES ('$upiId', '$platform', '$email', '$amount', NOW())";

    if ($conn->query($sql) === TRUE) {
        // Store payment details in session
        $_SESSION['upiId'] = $upiId;
        $_SESSION['platform'] = $platform;
        $_SESSION['email'] = $email;
        $_SESSION['amount'] = $amount;

        // Redirect to email sending page
        header("Location: sms.php");
        exit();
    } else {
        echo "<script>alert('Error: " . $conn->error . "'); window.location.href='index.html';</script>";
    }
}

// Close the connection
$conn->close();
?>
