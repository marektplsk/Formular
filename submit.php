<?php
    require "vendor/autoload.php"; 

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

   

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $priority = $_POST["priority"];
    $subject = "Form submission"; 


    $mysqli = new mysqli("127.0.0.1", "root", "root", "hybridLabPulc");

    $sql = "INSERT INTO form_data (first_name, last_name, email, message, priority) VALUES ('$first_name', '$last_name', '$email', '$message', '$prioority')";
    if ($mysqli->query($sql) === TRUE) 
    {

    } 

    $mysqli->close();
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->SMTPAuth = true;  
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
        $mail->Host = 'smtp.m1.websupport.sk'; 
        $mail->Port = 465; 
        $mail->Username = 't6@ideadivisions.dev';
        $mail->Password = 'Wh4SN:zXC<';

        $mail->setFrom('t6@ideadivisions.dev', 'Web Form'); 
        $mail->addAddress('ad1demian@gmail.com', 'Marek', 'Pulc');
        $mail->Subject = $subject;
        $mail->Body = $message; 

        $mail->send(); 
        echo 'Email sent'; 

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>









