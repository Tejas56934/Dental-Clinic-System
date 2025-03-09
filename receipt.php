<?php
session_start();

// Retrieve payment details from session
$upiId = isset($_SESSION['upiId']) ? htmlspecialchars($_SESSION['upiId']) : 'N/A';
$email = isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : 'N/A';
$platform = isset($_SESSION['plateform']) ? htmlspecialchars($_SESSION['plateform']) : 'N/A';
$amount = isset($_SESSION['amount']) ? htmlspecialchars($_SESSION['amount']) : '0.00';

// Retrieve appointment details from session
$name = isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : 'N/A';
$phone = isset($_SESSION['phone']) ? htmlspecialchars($_SESSION['phone']) : 'N/A';
$city_village = isset($_SESSION['city_village']) ? htmlspecialchars($_SESSION['city_village']) : 'N/A';
$treatment = isset($_SESSION['treatment']) ? htmlspecialchars($_SESSION['treatment']) : 'N/A';
$date = isset($_SESSION['date']) ? htmlspecialchars($_SESSION['date']) : 'N/A';
$time = isset($_SESSION['time']) ? htmlspecialchars($_SESSION['time']) : 'N/A';

// Clear session data
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Receipt</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background: #f8f9fa;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .receipt-container {
      background: #fff;
      padding: 30px;
      width: 450px;
      border-radius: 10px;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      border-bottom: 2px solid #ddd;
      padding-bottom: 10px;
    }

    .section-title {
      font-size: 18px;
      font-weight: bold;
      color: #333;
      margin-bottom: 10px;
    }

    .details-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    .details-table td {
      padding: 8px;
      border-bottom: 1px solid #ddd;
    }

    .btn {
      display: block;
      width: 100%;
      padding: 12px;
      text-align: center;
      background: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      margin-top: 10px;
    }

    .btn:hover {
      background: #0056b3;
    }
  </style>
</head>
<body>
  <div class="receipt-container" id="receipt">
    <div class="header">
      <div>
        <h2>Dr.Yadav Appointment and Payment</h2>
        <h2>Receipt</h2>

        <p>Date: 16/01/2025</p>
        <p>Time: 03:27:40 pm</p>
      </div>
      <div>
        <h2>Receipt ID: 2</h2>
      </div>
    </div>

    <div class="section-title">Appointment Details</div>
    <table class="details-table">
      <tr><td><strong>Name:</strong></td><td><?= $name; ?></td></tr>
      <tr><td><strong>Phone:</strong></td><td><?= $phone; ?></td></tr>
      <tr><td><strong>City/Village:</strong></td><td><?= $city_village; ?></td></tr>
      <tr><td><strong>Treatment:</strong></td><td><?= $treatment; ?></td></tr>
      <tr><td><strong>Preferred Date:</strong></td><td><?= $date; ?></td></tr>
      <tr><td><strong>Preferred Time:</strong></td><td><?= $time; ?></td></tr>
    </table>

    <div class="section-title">Payment Details</div>
    <table class="details-table">
      <tr><td><strong>UPI ID:</strong></td><td><?= $upiId; ?></td></tr>
      <tr><td><strong>Email:</strong></td><td><?= $email; ?></td></tr>
      <tr><td><strong>Platform:</strong></td><td><?= $platform; ?></td></tr>
      <tr><td><strong>Amount:</strong></td><td>₹<?= number_format((float)$amount, 2, '.', ''); ?></td></tr>
      <tr><td><strong>Status:</strong></td><td>Successful</td></tr>
    </table>

    <button class="btn" id="downloadReceipt">Download Receipt</button>
  </div>

  <script>
    document.getElementById('downloadReceipt').addEventListener('click', () => {
      const { jsPDF } = window.jspdf;
      const pdf = new jsPDF();
      
      pdf.setFontSize(18);
      pdf.text("Receipt", 20, 20);
      pdf.setFontSize(14);
      pdf.text("Receipt ID: 1", 20, 30);
      pdf.text("Date: <?= $date; ?>", 20, 40);
      pdf.text("Time: <?= $time; ?>", 20, 50);
      
      pdf.setFontSize(16);
      pdf.text("Appointment Details", 20, 70);
      pdf.setFontSize(12);
      pdf.text("Name: <?= $name; ?>", 20, 80);
      pdf.text("Phone: <?= $phone; ?>", 20, 90);
      pdf.text("City/Village: <?= $city_village; ?>", 20, 100);
      pdf.text("Treatment: <?= $treatment; ?>", 20, 110);
      
      pdf.setFontSize(16);
      pdf.text("Payment Details", 20, 130);
      pdf.setFontSize(12);
      pdf.text("UPI ID: <?= $upiId; ?>", 20, 140);
      pdf.text("Email: <?= $email; ?>", 20, 150);
      pdf.text("Platform: <?= $platform; ?>", 20, 160);
      pdf.text("Amount: ₹<?= number_format((float)$amount, 2, '.', ''); ?>", 20, 170);
      pdf.text("Status: Successful", 20, 180);
      
      pdf.save("Receipt.pdf");
    });
  </script>
</body>
</html>
