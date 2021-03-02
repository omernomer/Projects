<?php
//define the receiver of the email
$to = 'info@bronzelogistic.com';
//define the subject of the email
$subject = 'Bronze Logistics Contact Form'; 
//define the message to be sent. Each line should be separated with \n
$message = 
"Full Name: ".$_POST['fname']."\n\n".
"Phone Number:".$_POST['phone']."\n\n".
"E-mail:".$_POST['email']."\n\n".
"Message:".$_POST['msg']."\n\n";

//define the headers we want passed. Note that they are separated with \r\n
$headers = "From: ".$_POST['email']."\r\nReply-To: ".$_POST['email'];
//send the email
$mail_sent = @mail( $to, $subject, $message, $headers );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
echo '<script>window.location="contactus.php"; </script>';
?>