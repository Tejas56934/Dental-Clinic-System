 

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <title>For your precious feedback</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <style>
         body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-image: url('https://www.beautifulyoudental.com/blog/wp-content/uploads/2020/06/rsz_adobestock_265971360.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4; /* Add background color */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
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
</style>
     
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <title>Your Appointment Has Been Booked!</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <style>
         body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-image: url('https://www.leica-microsystems.com/fileadmin/_processed_/d/3/csm_dental-applications_8c3fb35730.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4; /* Add background color */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
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
</style>
    <div class="container">
        <h2>Thank You!</h2>
        <h2>For your precious feedback</h2>
        <div class="message">
            <?php
            // Check if form data was submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Retrieve form data
                $name = isset($_POST['name']) ? $_POST['name'] : "";
                $email = isset($_POST['email']) ? $_POST['email'] : "";

                // Display a thank you message with the submitted data
                echo "<p>Thank you, $name, For your precious feedback</p>";
                echo "<p>An email confirmation has been sent to: $email</p>";
            } 
            ?>
        </div>
    </div>
</body>
</html>

</body>
</html>
