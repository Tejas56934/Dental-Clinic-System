<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treatment Table</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://www.easterndental.com/wp-content/uploads/2019/10/Oral-Trauma.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            font-size: 28px;
            color: #4CAF50;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .treatment-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 16px;
            color: #333;
        }

        .treatment-table th,
        .treatment-table td {
            padding: 12px 20px;
            text-align: left;
        }

        .treatment-table th {
            background-color: #4CAF50;
            color: white;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .treatment-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .treatment-table tr:nth-child(odd) {
            background-color: #fff;
        }

        .treatment-table tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        .treatment-table td {
            border-bottom: 1px solid #ddd;
        }

        .price-cell {
            font-weight: bold;
            color: #4CAF50;
        }

        .note {
            margin-top: 20px;
            font-size: 14px;
            color: #666;
            text-align: center;
        }

        .note strong {
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Treatment Options & Prices</h2>
        <table class="treatment-table">
            <thead>
                <tr>
                    <th>Treatment ID</th>
                    <th>Treatment Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Root Canal Treatment</td>
                    <td class="price-cell">₹4,300</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Tooth Extraction</td>
                    <td class="price-cell">Doctor's Consultation Required</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Fillings</td>
                    <td class="price-cell">Doctor's Consultation Required</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Dental Implants</td>
                    <td class="price-cell">Doctor's Consultation Required</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Daily Checkup</td>
                    <td class="price-cell">₹150</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Teeth Whitening</td>
                    <td class="price-cell">Doctor's Consultation Required</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Complete Dentures (CD)</td>
                    <td class="price-cell">Doctor's Consultation Required</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Crowns & Bridges</td>
                    <td class="price-cell">Doctor's Consultation Required</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Dental Restoration</td>
                    <td class="price-cell">Doctor's Consultation Required</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Scaling</td>
                    <td class="price-cell">Doctor's Consultation Required</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>Wisdom Teeth</td>
                    <td class="price-cell">Doctor's Consultation Required</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>Dental Braces</td>
                    <td class="price-cell">Doctor's Consultation Required</td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>Orthodontics Treatment</td>
                    <td class="price-cell">Doctor's Consultation Required</td>
                </tr>
            </tbody>
        </table>
        <p class="note">
            <strong>Note:</strong> Prices listed as "Doctor's Consultation Required" will be determined during the checkup.
        </p>
    </div>
</body>
</html>
