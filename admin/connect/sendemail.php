<?php
   require_once 'PHPMailer/src/Exception.php';
   require_once 'PHPMailer/src/OAuth.php';
   require_once 'PHPMailer/src/PHPMailer.php';
   require_once 'PHPMailer/src/POP3.php';
   require_once 'PHPMailer/src/SMTP.php';

   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;

   class SendEMail{
       public function send($username,$email,$title,$content){
        $account = "bduc230920@gmail.com";
        $password="Buiminhduc2k";
        $mail = new PHPMailer(true);
        try{
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host="smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = $account;
            $mail->Password =$password;
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;
            $mail->CharSet = "UTF-8";
            $mail->setFrom($account); 
            $mail->addAddress($email,$title);
            $mail->isHTML(true);
            $mail->Subject= $title;
            $mail->Body = "Chào ".$username."! $content";
            // $mail->AltBody = "rat ngoan";
            $mail->send();
        }
        catch (Exception $e){
            echo "message could not be sent. Mailer Error: ", $mail->ErrorInfo; 
        }
       }
   }
