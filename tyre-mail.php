<?php
// Specify your email here
$to = 'info@alrayantyres.com';

// Set error reporting and display errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function to sanitize input data
function sanitizeInput($data) {
    return htmlspecialchars(trim($data));
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assigning sanitized data from $_POST array to variables
    $phone = sanitizeInput($_POST['phone']);
    $email = sanitizeInput($_POST['email']);
    $tyrename = sanitizeInput($_POST['tyre-name']);
    $tyrewidth = sanitizeInput($_POST['tyre-width']);
    $aspectratio = sanitizeInput($_POST['aspect-ratio']);
    $rimdiameter = sanitizeInput($_POST['rim-diameter']);

    // Basic form validation
    if (empty($phone) || empty($email) || empty($tyrename) || empty($tyrewidth) || empty($aspectratio) || empty($rimdiameter)) {
        echo "Please fill in all the required fields.";
        exit;
    }

    // Construct subject of the email
    $subject = 'Contact Enquiry ' . $tyrename;

    // Construct email body
    $body_message = "Phone: $phone\r\n\n";
    $body_message .= "Email: $email\r\n\n";
    $body_message .= "Tyre Name: $tyrename\r\n\n";
    $body_message .= "Tyre Width: $tyrewidth\r\n\n";
    $body_message .= "Aspect Ratio: $aspectratio\r\n\n";
    $body_message .= "Rim Diameter: $rimdiameter\r\n\n";

    // Construct headers of the message
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Try to send the email
    try {
        $mail_sent = mail($to, $subject, $body_message, $headers);

        if ($mail_sent) {
            header("Location: index.html");
            exit;
        } else {
            throw new Exception("Mail sending failed.");
        }
    } catch (Exception $e) {
        echo "Something went wrong! " . $e->getMessage();
    }
} else {
    // Handle cases where the form is not submitted
    echo "Invalid request.";
}
?>

