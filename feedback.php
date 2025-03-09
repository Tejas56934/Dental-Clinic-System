<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Clinic Feedback Form</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 700px;
            margin: 30px auto;
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 15px;
        }

        textarea {
            height: 120px;
        }

        .rating {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .rating input {
            display: none;
        }

        .rating label {
            font-size: 24px;
            cursor: pointer;
        }

        .rating input:checked ~ label,
        .rating input:hover ~ label {
            color: #f1c40f;
        }

        .btn-submit {
            display: block;
            width: 100%;
            padding: 12px 0;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }

        .info {
            font-size: 13px;
            color: #777;
            margin-top: -10px;
            margin-bottom: 20px;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #f1f1f1;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <header>
        <h1>We Value Your Feedback</h1>
    </header>

    <div class="container">
        <h2>Your Experience Matters</h2>
        <p>Please fill out the form below to share your feedback and help us improve our services.</p>

        <form action="submit feedback.php" method="post">

            <!-- Name -->
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>

            <!-- Email -->
            <label for="email">Your Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            
            <!-- Feedback Category -->
            <label for="category">Feedback Category</label>
            <select id="category" name="category" required>
                <option value="service">Service Quality</option>
                <option value="staff">Staff Friendliness</option>
                <option value="cleanliness">Clinic Cleanliness</option>
                <option value="overall">Overall Experience</option>
                <option value="other">Other</option>
            </select>

            <!-- Rating -->
            <label>Rate Your Experience</label>
            <div class="rating">
                <input type="radio" id="star5" name="rating" value="5" required>
                <label for="star5" title="5 stars">★</label>
                <input type="radio" id="star4" name="rating" value="4">
                <label for="star4" title="4 stars">★</label>
                <input type="radio" id="star3" name="rating" value="3">
                <label for="star3" title="3 stars">★</label>
                <input type="radio" id="star2" name="rating" value="2">
                <label for="star2" title="2 stars">★</label>
                <input type="radio" id="star1" name="rating" value="1">
                <label for="star1" title="1 star">★</label>
            </div>

            <!-- Feedback Message -->
            <label for="message">Your Feedback</label>
            <textarea id="message" name="message" placeholder="Write your feedback here" required></textarea>
       
            

            <!-- Submit Button -->
            <form action="feedback successful.php" method="post">
    <button class="btn-submit" type="submit">Submit Feedback</button>
</form>





        </form>
    </div>

    <footer>
        <p>Thank you for helping us improve!</p>
    </footer>
</body>
</html>
