<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="styles.css">
    <style>
      body {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-image: url('https://static.vecteezy.com/system/resources/thumbnails/036/595/008/small_2x/ai-generated-dental-clinic-advertisment-background-with-copy-space-free-photo.jpg'); /* Replace with your image URL */
        background-size: cover;
        background-position: center;
    }

        .container {
            max-width: 600px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #007bff; /* Header color */
        }

        .message p {
            font-size: 18px;
            line-height: 1.5;
            margin-bottom: 10px;
        }

        .message p:first-child {
            margin-top: 0;
        }

        .message p:last-child {
            margin-bottom: 0;
        }

        .back-button {
            margin-top: 20px;
        }

        .back-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-button a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Thank You!</h2>
        <h2>FOR REGISTER</h2>
        <div class="message">
            <?php
            // Check if form data was submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Retrieve form data
                $name = isset($_POST['name']) ? $_POST['name'] : "";
                $email = isset($_POST['email']) ? $_POST['email'] : "";

                // Display a thank you message with the submitted data
                echo "<p>Thank you, $name, for booking an appointment with us!</p>";
                echo "<p>An email confirmation has been sent to: $email</p>";
            } 
            ?>
        </div>
        <div class="back-button">
            <a href="user panel.php">Go to Homepage</a>
        </div>
    </div>
</body>
</html>
