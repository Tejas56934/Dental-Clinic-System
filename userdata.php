<?php
// Include database connection
include 'connection to database.php';

// Fetch patient registration data
$sql_registration1 = "SELECT * FROM registration3"; // Replace with your actual table name
$result_registration1 = mysqli_query($conn, $sql_registration1);

if (!$result_registration1 || mysqli_num_rows($result_registration1) === 0) {
    $registration1 = [];
    $totalUsers = 0;
} else {
    $registration1 = mysqli_fetch_all($result_registration1, MYSQLI_ASSOC);
    $totalUsers = count($registration1);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration Data - Admin Panel</title>
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
            text-align: center;
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

        .total-row {
            font-weight: bold;
            background-color: #34495e;
            color: #ffffff;
            text-align: center;
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
            <h2>Reports on Registration</h2>
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Password</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($registration1)): ?>
                    <?php $sr_no = 1; ?>
                    <?php foreach ($registration1 as $patient): ?>
                        <tr>
                            <td style="text-align: center;"><?= $sr_no++; ?></td>
                            <td><?= htmlspecialchars($patient['Firstname']); ?></td>
                            <td><?= htmlspecialchars($patient['Lastname']); ?></td>
                            <td><?= htmlspecialchars($patient['Email']); ?></td>
                            <td><?= htmlspecialchars($patient['Password']); ?></td>
                          
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align: center;">No patient data found</td>
                    </tr>
                <?php endif; ?>
                <tr class="total-row">
                    <td colspan="6">Total Registered Users: <?= $totalUsers; ?></td>
                </tr>
            </tbody>
        </table>

        <footer>
            &copy; <?= date('Y'); ?> Dr. Yadav Dental Clinic | All rights reserved.
        </footer>
    </div>
</body>
</html>
