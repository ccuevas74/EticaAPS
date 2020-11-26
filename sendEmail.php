<?php
    use PHPMailer\PHPMailer\PHPMailer;

    function sendEmail($email,$user_hash)
    {
        /* 4. Sending a verification email */

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer(); // Objeto clase PHPMailer

        $correoAPS = "proyectoiitvaps@gmail.com";
        $asuntoCorreo = "Proyecto APS FLORA";
        $url_activacion = "https://localhost/APS/validation.php?hash=".$user_hash."&flag=true";

        // SMTP
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = $correoAPS;
        $mail->Password = "mihijafatima123";
        $mail->Port = 465; //SMTP ports: 25,587,465
        $mail->SMTPSecure = "ssl";

        // EMAIL
        $mail->isHTML(true);
        $mail->CharSet = "UTF-8"; // Activacion caracteres utf8 
        $mail->setFrom($correoAPS,"DavidAPS"); // From: y FromName:
        $mail->addAddress($email); // Correo de destino
        $mail->Subject = ("$email ($asuntoCorreo)"); // Asunto del correo
        $mail->Body = "¡Hola, has sido registrado en la BBDD del Proyecto Flora APS!
                       Presione sobre el siguiente enlace para activar su cuenta: " . $url_activacion;

        if(!$mail->send())
        {
            echo "Error en el envío del mensaje: ". $mail->ErrorInfo;
            return false;
        }
        else
            return true;
    }
?>