<?php


// specify your email here

$to = 'info@alrayantyres.com';



  // Assigning data from $_POST array to variables
    if (isset($_POST['name'])) { $name = $_POST['name']; }
    if (isset($_POST['email'])) { $email = $_POST['email']; }
    if (isset($_POST['phone'])) { $phone = $_POST['phone']; }
    if (isset($_POST['message'])) { $message = $_POST['message']; }
  
  // Construct subject of the email
  $subject = 'Contact Enquiry ' . $name;

  // Construct email body
  $body_message .= 'Name: ' . $name . "\r\n\n";
  $body_message .= 'Email: ' . $email . "\r\n\n";
  $body_message .= 'Phone: ' . $phone . "\r\n\n";
  $body_message .= 'Message: ' . $message . "\r\n\n";

  // Construct headers of the message
  $headers = 'From: ' . $email . "\r\n";
  $headers .= 'Reply-To: ' . $email . "\r\n";

  $mail_sent = mail($to, $subject, $body_message, $headers);

  if ($mail_sent == true){
    header("Location:index.html");
  }
  else{
    echo "Something went wrong! Mail senting failed........";
  }
?>
