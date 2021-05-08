<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail{

    private static $mail;

    public function __construct(){
        self::$mail = new PHPMailer(true);
        try {
            //Server settings
            self::$mail->isSMTP(true);    
            self::$mail->Host       = SMTP_HOST;  
            self::$mail->SMTPAuth   = SMTP_AUTH;  
            self::$mail->Username   = SMTP_EMAIL; 
            self::$mail->Password   = SMTP_PASSWORD;  
            self::$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
            self::$mail->Port       = SMTP_PORT;  
        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: { ".self::$mail->ErrorInfo."}";
        }
    }
    
    public static function send(array $data){
        try {
            //Recipients
            self::$mail->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
            self::$mail->addAddress($data['to'], $data['name']);   
            //Content
            self::$mail->isHTML(true);
            self::$mail->Subject = $data['subject'];
            extract($data['data']);
                ob_start();
                include "./mails/".$data['template'].".mail.php";
                $content = ob_get_clean();
            self::$mail->Body  = $content;
            // self::$mail->AltBody = $altBody;
            
            self::$mail->send();
            return true;
        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {".self::$mail->ErrorInfo."}";
            return false;
        }
    }
}
new mail();