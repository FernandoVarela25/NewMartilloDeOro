<?php
    include_once 'connection.php';
    include_once 'src/Exception.php';
    include_once 'src/PHPMailer.php';
    include_once 'src/SMTP.php';

    if (isset($_POST['recovery_email'])) {
        $email = $_POST['recovery_email'];

        $dbname = new Database();
        $query = $dbname->connect()->prepare('SELECT * FROM users WHERE email = :email');
        $query->execute([':email' => $email]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            header('location: ../../Index.php?ruta=forgot_password&error=user_not_found');
            exit();
        }

        $token = bin2hex(random_bytes(32));
        $expiry_date = date('Y-m-d H:i:s', strtotime('+1 hour'));
        $query = $dbname->connect()->prepare('INSERT INTO password_reset (email, token, expiry_date) VALUES (:email, :token, :expiry_date)');
        $query->execute([':email' => $email, ':token' => $token, ':expiry_date' => $expiry_date]);
        
        $reset_link = "http://localhost/dev_MartillodeOro/Index.php?ruta=reset_password";
        $message = "Hola,\n\nHemos recibido una solicitud de restablecimiento de contraseña para tu cuenta. Haz clic en el siguiente enlace para restablecer tu contraseña:\n\n$reset_link\nToken: $token\nSi no solicitaste un restablecimiento de contraseña, ignora este mensaje";
        try {
            $subject = "Restablecimiento de contraseña";
            $headers = "From: ferelvalolopez@gmail.com";
    
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->setFrom('ferelvalolopez@gmail.com', 'Luis Fernando');
            $mail->addAddress($email);
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
                echo 'Error al enviar el correo electronico: ' . $mail->ErrorInfo;
            } else {
                header('location: ../../Index.php?ruta=forgot_password&error=success_email');
            }
        } catch (Exception $e){
            echo 'Error al enviar el correo: ' . $e->getMessage();
        }
    }

    if(isset($_POST['new_password']) && isset($_POST['confirm_password']) && isset($_POST['email']) && isset($_POST['token'])){
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        $email = $_POST['email'];
        $token = $_POST['token'];

        if($new_password == $confirm_password){
            $dbname = new Database();
            $query = $dbname->connect()->prepare('SELECT * FROM password_reset WHERE email = :email and token = :token AND expiry_date > NOW()');
            $query->execute([':email' => $email, ':token' => $token]);
            $row = $query->fetch(PDO::FETCH_ASSOC);

            if($row){
                $dbname = new Database();
                $query = $dbname->connect()->prepare('UPDATE users SET passwrd = :new_password WHERE email = :email');
                $query->execute([':new_password' => $new_password, ':email' => $email]);

                $dbname = new Database();
                $query = $dbname->connect()->prepare('DELETE FROM password_reset WHERE email = :email');
                $query->execute([':email' => $email]);

                header('location: ../../Index.php?ruta=reset_password&error=success_recovery_password');
            } else {
                header('location: ../../Index.php?ruta=reset_password&error=failure_recovery_password');
            }
        } else {
            header('location: ../../Index.php?ruta=reset_password&error=failure_data');
        }
    }
?>