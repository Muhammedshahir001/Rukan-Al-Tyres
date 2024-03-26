<?php


// specify your email here

$to = 'adarshsizcom@gmail.com';



	// Assigning data from $_POST array to variables
    if (isset($_POST['phone'])) { $phone = $_POST['phone']; }
    if (isset($_POST['email'])) { $email = $_POST['email']; }
    if (isset($_POST['tyre-name'])) { $tyrename = $_POST['tyre-name']; }
    if (isset($_POST['tyre-width'])) { $tyrewidth = $_POST['tyre-width']; }
    if (isset($_POST['aspect-ratio'])) { $aspectratio = $_POST['aspect-ratio']; }
    if (isset($_POST['rim-diameter'])) { $rimdiameter = $_POST['rim-diameter']; }
	
	// Construct subject of the email
	$subject = 'Contact Enquiry ' . $tyrename;

	// Construct email body
	$body_message .= 'Phone: ' . $phone . "\r\n\n";
	$body_message .= 'Email: ' . $email . "\r\n\n";
	$body_message .= 'Tyre Name: ' . $tyrename . "\r\n\n";
	$body_message .= 'Tyre Width: ' . $tyrewidth . "\r\n\n";
  $body_message .= 'Aspect Ratio: ' . $aspectratio . "\r\n\n";
  $body_message .= 'Rim Diameter: ' . $rimdiameter . "\r\n\n";

	// Construct headers of the message
	$headers = 'From: ' . $email . "\r\n";
	$headers .= 'Reply-To: ' . $email . "\r\n";

	$mail_sent = mail($to, $subject, $body_message, $headers);

	if ($mail_sent == true)
  {
  header("Location:index.html");
 } 
 else
 {
   echo "Something went wrong! Mail senting failed........";
 }
  //Email response
 //echo json_encode($_POST);
 ?>
    
?>
