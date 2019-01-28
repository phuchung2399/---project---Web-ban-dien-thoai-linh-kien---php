<?php
 require 'PHPMailer/PHPMailerAutoload.php';
function sendMail($mailTo, $bodyContent, $mailSubject) {
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
 // $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "phuchung996@gmail.com";
$mail->Password = "01670978939558";
$mail->SetFrom("phuchung996@gmail.com");
$mail->Subject =$mailSubject ;
$mail->Body =  $bodyContent;
$mail->AddAddress($mailTo);
 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
 }
}
?>



