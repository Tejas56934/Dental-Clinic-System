<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link your external CSS file -->
    <style>
        body{
           
           font-family: Arial, sans-serif;
           margin: 0;
           padding: 0;
           background-image: url('https://www.dovedaledentalcare.com/wp-content/uploads/2022/04/about-our-office-1024x684.jpg');
           background-size: cover;
           background-position: center;
           background-attachment: fixed;
       }

        /* Additional CSS styles specific to this page */
        .sidebar {
            background-color: #333;
            color: white;
            padding: 20px 10px;
        }

        .sidebar h2 {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar a {
            text-decoration: none;
            color: white;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #555;
        }

        .header-box {
            background-color: #007bff;
            color: white;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .header-box h2 {
            margin-top: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="checkbox"] {
            margin-top: 5px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
  

    <div class="container">
        <div class="header-box">
            <h2>Settings</h2>
            <p>Update your preferences below.</p>
        </div>
        
        <form action="update_settings.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="timezone">Timezone</label>
            <select id="timezone" name="timezone">
                <option value="GMT-12">GMT-12</option>
                <option value="GMT-11">GMT-11</option>
                <!-- Add more timezone options as needed -->
            </select>

            <label for="notification">Email Notification</label>
            <input type="checkbox" id="notification" name="notification" checked>

            <label for="language">Language</label>
            <select id="language" name="language">
                <option value="English">English</option>
                <option value="Spanish">Spanish</option>
                <!-- Add more language options as needed -->
            </select>

            <label for="theme">Theme</label>
            <select id="theme" name="theme">
                <option value="Light">Light</option>
                <option value="Dark">Dark</option>
                <!-- Add more theme options as needed -->
            </select>

            <label for="notificationsound">Notification Sound</label>
            <input type="checkbox" id="notificationsound" name="notificationsound" checked>

            <label for="privacy">Privacy Settings</label>
            <select id="privacy" name="privacy">
                <option value="Public">Public</option>
                <option value="Private">Private</option>
                <!-- Add more privacy options as needed -->
            </select>

            <input type="submit" value="Save Changes">
        </form>
    </div>
</body>
</html>
