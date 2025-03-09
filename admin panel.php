<?php
// Include database connection
include 'connection to database.php';

// Fetch appointments from the database
$sql = "SELECT * FROM appointments3"; // Corrected SQL query
$result = mysqli_query($conn, $sql);

// Check if appointments exist
if (!$result || mysqli_num_rows($result) === 0) {
    $appointments = []; // Initialize an empty array if no appointments found
} else {
    // Fetch appointments data
    $appointments = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Dr. Yadav Multispeciality & Advanced Dental Clinic & Dental care</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#dateFilter').change(function () {
                const selectedDate = $(this).val();
                window.location.href = `?date=${selectedDate}`;
            });
        });
    </script>
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #eef2f3, #8e9eab);
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

        .content header {
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

        td {
            color: #2c3e50;
        }

        select, button {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
        }

        button {
            background-color: #3498db;
            color: white;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #2980b9;
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
        <h2>Dr. Yadav </h2>
        <a href="#">Booked Appointments</a>
        <a href="userdata.php">Patient Registration Data</a>
        <a href="adminpayment.php">Patient Payment details</a>
        <a href="Feedback details.php">Feedback details</a>
    </div>

    <div class="content">
    <header>
    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
        <!-- Centered Content -->
        <div style="flex: 1; text-align: center;">
            <h1>Dr. Yadav Multispecialty & Advanced Dental Clinic</h1>
            <h2>Reports on Appointment Booking</h2>
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
                <th>Sr.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>City/Village</th>
                    <th>Selected Treatment</th>
                    <th>Preferred Date</th>
                    <th>Preferred Time</th>
                </tr>
            </thead>
            <tbody>
    <?php 
    $srNo = 1; // Initialize serial number
    foreach ($appointments as $appointment): ?>
    <tr>
        <td><?= $srNo++; ?></td> <!-- Increment serial number -->
        <td><?= htmlspecialchars($appointment['Name']); ?></td>
        <td><?= htmlspecialchars($appointment['Email']); ?></td>
        <td><?= htmlspecialchars($appointment['Phone']); ?></td>
        <td><?= htmlspecialchars($appointment['City/village']); ?></td>
        <td><?= htmlspecialchars($appointment['Select Treatment']); ?></td>
        <td><?= htmlspecialchars($appointment['Preferred date']); ?></td>
        <td><?= htmlspecialchars($appointment['Preferred time']); ?></td>
    </tr>
    <?php endforeach; ?>
    <?php if (empty($appointments)): ?>
    <tr><td colspan="8">No appointments found for the selected date.</td></tr>
    <?php endif; ?>
</tbody>

        </table>
        <footer>
            &copy; <?= date('Y'); ?> Dr. Yadav Dental Clinic | All rights reserved.
        </footer>
    </div>
</body>
</html>
