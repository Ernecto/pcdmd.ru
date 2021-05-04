<?php
// Check for empty fields
if(empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['message'])) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = "contact@pcdmd.ru"; // Add your email address inbetween the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
$subject = "Website Contact Form:  $name";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\\n\nPhone: $phone\n\nMessage:\n$message";
$header = "From: noreply@pcdmd.ru\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
