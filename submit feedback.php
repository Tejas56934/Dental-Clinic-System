<?php
// Database configuration
$host = "localhost"; // Database host
$username = "root";  // Database username
$password = "";      // Database password
$dbname = "major2"; // Database name

// Connect to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $name = $conn->real_escape_string($_POST["name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $category = $conn->real_escape_string($_POST["category"]);
    $rating = intval($_POST["rating"]); // Ensure rating is an integer
    $message = $conn->real_escape_string($_POST["message"]);

    // SQL query to insert feedback into the database
    $sql = "INSERT INTO feedback3 (name, email, category, rating, message)
            VALUES ('$name', '$email', '$category', $rating, '$message')";

    // Execute the query and check for errors
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Thank you for feedback');</script>";
        header("Location:feedback successful.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>