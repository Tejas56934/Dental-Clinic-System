<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://www.sphp.com/sites/default/files/hg_features/mercury_image/7f63af84fc402de52270e1987aa1ac94.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #333;
        }

        /* Centered Content Container */
        .main-content {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        /* Appointment Section */
        .appointment-section {
            max-width: 800px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        /* Appointment Header */
        .appointment-header {
            background: linear-gradient(to right, #007bff, #0056b3);
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            border-radius: 15px 15px 0 0;
        }

        /* Information Section */
        .appointment-info {
            padding: 15px 20px;
            background-color: #f9f9f9;
            border-bottom: 1px solid #ddd;
            font-size: 16px;
            line-height: 1.6;
            text-align: center;
            color: #555;
        }

        /* Form Styling */
        form {
            padding: 20px 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"],
        input[type="time"],
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input:focus,
        select:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
            outline: none;
        }

        .optional-note {
            font-style: italic;
            font-size: 14px;
            color: #777;
        }

        /* Button Styling */
        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(to right, #007bff, #0056b3);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        button:hover {
            background: linear-gradient(to right, #0056b3, #003f7f);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .appointment-section {
                padding: 15px;
            }

            form {
                padding: 15px 20px;
            }

            .appointment-header {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>

    <div class="main-content">
        <div class="appointment-section">
            <!-- Header -->
            <div class="appointment-header">Book Your Appointment</div>
            
          

            <!-- Form -->
            <form action="insert.php" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">
                    <p class="optional-note">*Email is optional</p>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="city_village">City/Village:</label>
                    <input type="text" id="city_village" name="city_village" required>
                </div>
                <div class="form-group">
                    <label for="treatmentSelect">Select Treatment:</label>
                    <select id="treatmentSelect" name="treatment" required>
                        <option value="">Select...</option>
                        <option value="Root canal treatment">Root canal treatment</option>
                        <option value="Tooth Extraction">Tooth Extraction</option>
                        <option value="Fillings">Fillings</option>
                        <option value="Dental implants">Dental implants</option>
                        <option value="Orthodontics Treatment">Orthodontics Treatment</option>
                        <option value="Teeth whitening">Teeth whitening</option>
                        <option value="Complete dentures(CD)">Complete dentures(CD)</option>
                        <option value="Crowns & Bridges">Crowns & Bridges</option>
                        <option value="Dental Restoration">Dental Restoration</option>
                        <option value="Scaling">Scaling</option>
                        <option value="Wisdom Teeth">Wisdom Teeth</option>
                        <option value="Dental braces">Dental braces</option>
                        <option value="Daily checkup">Daily checkup</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Preferred Date:</label>
                    <input type="date" id="date" name="date" required>
                </div>
                <div class="form-group">
                    <label for="time">Preferred Time:</label>
                    <input type="time" id="time" name="time" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

</body>
</html>
