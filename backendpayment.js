const express = require("express");
const bodyParser = require("body-parser");
const admin = require("firebase-admin");
const app = express();

// Initialize Firebase Admin SDK
const serviceAccount = require("./path-to-firebase-service-account.json");
admin.initializeApp({
  credential: admin.credential.cert(serviceAccount),
});

app.use(bodyParser.json());

// Endpoint to track payment
app.post("/track-payment", async (req, res) => {
  const { upiId, amount, platform } = req.body;

  // Simulate transaction monitoring (Replace with real implementation)
  setTimeout(() => {
    // Notify user
    const message = {
      notification: {
        title: "Payment Confirmation",
        body: `Your payment of ₹${amount} via ${platform} is being processed.`,
      },
      token: "<user-device-token>", // Use device token from your database
    };

    admin
      .messaging()
      .send(message)
      .then((response) => console.log("Notification sent:", response))
      .catch((error) => console.error("Error sending notification:", error));
  }, 5000); // Simulate delay

  res.send({ status: "Payment tracking initiated." });
});

// Start server
app.listen(3000, () => console.log("Server running on port 3000"));
