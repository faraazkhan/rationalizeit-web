<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'support@rationalizeit.us';                 // SMTP username
$mail->Password = 'rationalizeit';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = strip_tags($_POST["contact_name"]);
$mail->FromName = strip_tags($_POST["contact_name"]);
$mail->addAddress('support@rationalizeit.us', 'Rationalize IT Contact Us');     // Add a recipient
$mail->isHTML(true);                                  // Set email format to HTML
$mail->From = "faraaz@rationalizeit.us";
$mail->FromName = "faraaz@rationalizeit.us";

$mail->Subject = "Message from Rationalize IT Website Contact Form. Call Back at: " . strip_tags($_POST["contact_number"]);
$mail->Body    =  strip_tags($_POST["contact_message"]);
$mail->AltBody =  strip_tags($_POST["contact_message"]);

if(!$mail->send()) {
   	echo '<i class="glyphicon glyphicon-remove"></i> Sorry ' .$nam. '. Your Email was not sent. Resubmit form again Please..';
} else {
  	echo '<i class="glyphicon glyphicon-ok"></i> Thank you ' .$nam. '. Your Email was successfully sent!';
}
die();
