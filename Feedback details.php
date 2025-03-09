<?php
// Include database configuration
$host = "localhost"; // Database host
$username = "root";  // Database username
$password = "";      // Database password
$dbname = "major2";   // Database name

// Connect to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete feedback if the delete action is triggered
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']); // Get the feedback ID to delete
    $delete_sql = "DELETE FROM feedback WHERE id = $delete_id";
    $conn->query($delete_sql); // Execute the delete query
    header("Location: feedback.php"); // Refresh the page after deletion
    exit();
}

// Fetch feedback data
$sql_feedback = "SELECT * FROM feedback3"; // Replace with your actual table name
$result_feedback = $conn->query($sql_feedback);

// Check if feedback exists
if (!$result_feedback || $result_feedback->num_rows === 0) {
    $feedback = [];
} else {
    $feedback = $result_feedback->fetch_all(MYSQLI_ASSOC);
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Dashboard</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #f8f9fa, #d6e4ec);
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #34495e;
            color: #ecf0f1;
            padding: 20px 10px;
            box-shadow: 3px 0 5px rgba(0, 0, 0, 0.2);
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.8rem;
            font-weight: bold;
            color: #f39c12;
        }

        .sidebar a {
            text-decoration: none;
            color: #ecf0f1;
            display: block;
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 5px;
            text-align: center;
            font-size: 1.1rem;
        }

        .sidebar a:hover {
            background-color: #f39c12;
            color: #ffffff;
            transition: background-color 0.3s;
        }

        .content {
            margin-left: 270px;
            padding: 20px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            background-color: #ffffff;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-size: 2rem;
            color: #2c3e50;
        }

        header p {
            font-size: 1rem;
            color: #7f8c8d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
            font-size: 1rem;
        }

        th {
            background-color: #2c3e50;
            color: #ffffff;
            font-weight: bold;
            font-size: 1.1rem;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        tbody tr:hover {
            background-color: #f2f2f2;
            transition: background-color 0.3s;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn-delete {
            padding: 8px 12px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .btn-delete:hover {
            background-color: #c0392b;
            transition: background-color 0.3s;
        }

        footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9rem;
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Dr. Yadav Dental Clinic</h2>
    
    </div>

    <div class="content">
    <header>
    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
        <!-- Centered Content -->
        <div style="flex: 1; text-align: center;">
            <h1>Dr. Yadav Multispecialty & Advanced Dental Clinic</h1>
            <h2>Reports on Feedback</h2>
        </div>
        
        <!-- Right-Aligned Date & Time -->
        <div style="text-align: right;">
            <p>Date: 16/01/2025</p>
            <p>Time: 03:25:05 pm</p>
        </div>
    </div>
</header>

        <table>
    <thead>
        <tr>
            <th>Sr. No.</th>
            <th>Name</th>
            
            <th>Category</th>
            <th>Rating</th>
            <th>Message</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($feedback)): ?>
            <?php $sr_no = 1; // Initialize serial number ?>
            <?php foreach ($feedback as $fb): ?>
                <tr>
                    <td style="text-align: center;"><?= $sr_no++; ?></td> <!-- Sr. No. Column -->
                    <td><?= htmlspecialchars($fb['Name']); ?></td>
                    
                    <td><?= htmlspecialchars($fb['Category']); ?></td>
                    <td><?= htmlspecialchars($fb['Rating']); ?> ⭐</td>
                    <td><?= htmlspecialchars($fb['Message']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" style="text-align: center;">No feedback available</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>


        <footer>
            &copy; <?= date('Y'); ?> Dr. Yadav Dental Clinic | All rights reserved.
        </footer>
    </div>
</body>
</html>
