<?php
require 'PHPMailer/PHPMailerAutoload.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Create a new PHPMailer instance
    $mail = new PHPMailer;

    // Set up SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'Padonis007@gmail.com';
    $mail->Password = 'ovtylyvwntethwbo';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Set the sender and recipient
    $mail->setFrom('Padonis007@gmail.com', 'SentFromSMTPApp');
    $mail->addAddress($email);

    // Set the subject and body
    $mail->Subject = $subject;
    $mail->Body    = $message;

    // Send the email
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}
?>
