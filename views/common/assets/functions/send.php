<?php
    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';

    try {
        $to = $_POST['to'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->setFrom('ferelvalolopez@gmail.com', 'Luis Fernando');
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = strip_tags($message); // mensaje alternativo sin formato HTML
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // servidor SMTP de Gmail
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ferelvalolopez@gmail.com'; // correo electrónico del remitente
        $mail->Password   = 'cdjiehhhzmvxrrmj'; // contraseña del correo electrónico
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS; // cifrado TLS
        $mail->Port       = 587; // puerto de conexión SMTP

        if(!$mail->send()) {
            echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
        } else {
            echo "Correo enviado exitosamente";
        }
    } catch (Exception $e){
        echo 'Error al enviar el correo: ' . $e->getMessage();
    }
?>