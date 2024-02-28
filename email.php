<?php
// Function to generate random OTP
function generateOTP($length = 6) {
    $characters = '0123456789';
    $otp = '';
    for ($i = 0; $i < $length; $i++) {
        $otp .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $otp;
}

// Generate OTP
$otp = generateOTP();

// Recipient email address
$to = $_SESSION['email'];

// Sender email address
$from = "findtanmay10@gmail.com";

// Email subject
$subject = "Your OTP";

// Email message
$message = "Your One-Time Password (OTP) is: $otp";

// Additional headers
$headers = "From: $from";

// Send email
if (mail($to, $subject, $message, $headers)) {
    echo "OTP sent successfully!";
} else {
    echo "Failed to send OTP.";
}
?>
