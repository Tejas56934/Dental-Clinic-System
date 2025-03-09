<?php
session_start();

// Database connection
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "major2";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// User Registration
if (isset($_POST['register'])) {
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirmpassword = htmlspecialchars($_POST['confirmpassword']);

    // Check if passwords match
    if ($password !== $confirmpassword) {
        echo "<script>alert('Password and Confirm Password do not match');</script>";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO registration3 (Firstname, Lastname, phone, Email, Password, confirm_password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $firstname, $lastname, $phone, $email, $hashed_password, $confirmpassword);

    // Execute and check
    if ($stmt->execute()) {
        echo "<script>alert('Registration successful');</script>";
        echo "<script>window.location.href='thank you reg.php';</script>";
        exit();
    } else {
        echo "<script>alert('Registration failed');</script>";
    }
    $stmt->close();
}

// User Login
if (isset($_POST['login'])) {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Check if the user is an admin
    $adminEmail = "admin123@gmail.com";
    $adminPassword = "admin123";

    if ($email === $adminEmail && $password === $adminPassword) {
        // Admin login successful
        $_SESSION['admin'] = $adminEmail;
        echo "<script>alert('Admin login successful');</script>";
        echo "<script>window.location.href='admin panel.php';</script>";
        exit();
    }

    // Fetch user details from the `registration1` table
    $stmt = $conn->prepare("SELECT * FROM registration3 WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['Password'])) {
            // Store the user session details
            $_SESSION['username'] = $user['Firstname'] . " " . $user['Lastname'];
            $_SESSION['email'] = $user['Email'];

            // Insert the email and hashed password into the `users` table
            $hashed_password = $user['Password'];
            $current_timestamp = date("Y-m-d H:i:s");
            $stmt = $conn->prepare("INSERT INTO users3 (email, password, login_time) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $email, $hashed_password, $current_timestamp);

            if ($stmt->execute()) {
                echo "<script>alert('Login successful');</script>";
                echo "<script>window.location.href='user panel.php';</script>";
                exit();
            } else {
                echo "<script>alert('Error storing login details');</script>";
            }
        } else {
            echo "<script>alert('Incorrect password');</script>";
        }
    } else {
        echo "<script>alert('No account found with that email');</script>";
    }
    $stmt->close();
}

$conn->close();
?>
