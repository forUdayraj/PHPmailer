<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["subject"]) && isset($_POST["message"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host ='smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'for.udayraj@gmail.com';
    $mail->Password = 'hjktzjghgpzvbvtc';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->CharSet = 'utf-8';
    $mail->setFrom("for.udayraj@gmail.com");
    $mail->addAddress($email);
    $mail->addReplyTo('reply@example.com', 'Reply Name');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');
    // Add attachments or customize as needed
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = "<p>Name: $name</p><p>Email: $email</p><p>Message: $message</p>";

    if($mail->send()) {
        echo "<script>alert('Send successfully');document.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Failed to send email. Error: " . $mail->ErrorInfo . "');document.location.href='index.php';</script>";
    }
} else {
    echo "<script>alert('All fields are required');document.location.href='index.php';</script>";
}
?>
