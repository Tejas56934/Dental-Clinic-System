<?php
// Include database connection
include 'connection to database.php';

// Fetch payment details from the database
$sql = "SELECT * FROM payments3";
$result = mysqli_query($conn, $sql);

// Check if payment records exist
if (!$result || mysqli_num_rows($result) === 0) {
    $payments = [];
    $totalAmount = 0;
} else {
    // Fetch payment records
    $payments = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Calculate total amount
    $totalAmount = 0;
    foreach ($payments as $payment) {
        $totalAmount += (float)$payment['Amount'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details - Admin Panel</title>
    <link rel="stylesheet" href="styles.css">
    <style>
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

        td {
            color: #2c3e50;
        }

        button {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            background-color: #3498db;
            color: white;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #2980b9;
        }

        .total-row {
            font-weight: bold;
            background-color: #f39c12;
            color: white;
            text-align: right;
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
            <h2>Reports on Payments</h2>
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
                    <th>Payment ID</th>
                    <th>Patient UPI_ID</th>
                    <th>Platform Used</th>
                    <th>Email</th>
                    <th>Amount</th>
                    <th>Payment Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $payment): ?>
                <tr>
                    <td><?= htmlspecialchars($payment['ID']); ?></td>
                    <td><?= htmlspecialchars($payment['Upi_id']); ?></td>
                    <td><?= htmlspecialchars($payment['Platform']); ?></td>
                    <td><?= htmlspecialchars($payment['Email']); ?></td>
                    <td>₹<?= htmlspecialchars($payment['Amount']); ?></td>
                    <td><?= htmlspecialchars($payment['Payment_date']); ?></td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($payments)): ?>
                <tr><td colspan="6">No payment records found.</td></tr>
                <?php endif; ?>
                <!-- Total Row -->
                <tr class="total-row">
                    <td colspan="4">Total Amount:</td>
                    <td colspan="2">₹<?= number_format($totalAmount, 2); ?></td>
                </tr>
            </tbody>
        </table>

        <footer>
            &copy; <?= date('Y'); ?> Dr. Yadav Dental Clinic | All rights reserved.
        </footer>
    </div>
</body>
</html>
