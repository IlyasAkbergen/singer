<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['subject'])   ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$sub = $_POST['subject'];
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'info@singer.kz'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_title = "Запись на пробный урок:  $name";
$email_body = "Новая заявка на пробный урок.\n\n"."Детали:\n\nИмя: $name\n\nПредмет Обучения: $sub\n\nEmail: $email_address\n\nТел: $phone\n\nСообщение:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_title,$email_body,$headers);
return true;         
?>