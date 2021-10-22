<?php

namespace Source\Models;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Email
{

    // CREDENCIAIS DE ACESSO AO SMTP

    const HOST = "smtp.gmail.com";
    const USER = "suporteblock890@gmail.com";
    const PASS = "Lawridania890";
    const SECURE = "TLS";
    const PORT = 587;
    const CHARSET = "UTF-8";

    // CREDENCIAIS DO REMETENTE

    const FROM_EMAIL = "suporteblock890@gmail.com";
    const FROM_NAME = "Suporte Block";

    // Mensagem de erro

    private $error;

    public function getError()
    {
        return $this->error;
    }

    public function sendEmail($adresses, $subject, $body, $attachents = [])
    {

        $this->error = "";

        $mail = new PHPMailer(true);

        try {
            //Server settings
            //Enable verbose debug output
            $mail->isSMTP(); //Send using SMTP
            $mail->setLanguage("pt");
            $mail->CharSet = self::CHARSET;
            $mail->Host = self::HOST; //Set the SMTP server to send through
            $mail->SMTPAuth = true; //Enable SMTP authentication
            $mail->Username = self::USER; //SMTP username
            $mail->Password = self::PASS;

            $mail->SMTPDebug = 0;
//SMTP password
            $mail->SMTPSecure = self::SECURE; //Enable implicit TLS encryption
            $mail->Port = self::PORT;

            $mail->Charset = self::CHARSET;

            //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Remetente
            $mail->setFrom(self::FROM_EMAIL, self::FROM_NAME);

            // Endereços a enviar

            $adresses = is_array($adresses) ? $adresses : [$adresses];

            foreach($adresses as $adress) {

                $mail->addAddress($adress);

            } 

          



            //Add a recipient
            //Name is optional
            $mail->addReplyTo('info@example.com', 'Information');

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;

            return $mail->send();
          
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }

    }

}
