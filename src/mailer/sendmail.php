<?php
// Recipient email address
$to = "d34calvo@gmail.com";

// Email subject
$subject = "Test Email";

// Email message
$message = "Hello, this is a test email sent using PHP's mail() function.";

// Email headers
$headers = "From:t313jalikoa@gmail.com";

// Send email
if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully!";
} else {
    echo "Failed to send email.";
}
?>
