<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'mailer/autoload.php';
    if($_POST){
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                          //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                 //Enable SMTP authentication
            $mail->Username   = 'user';                               //SMTP username
            $mail->Password   = 'password';                              //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 465;                                  //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
            //Recipients
            $mail->setFrom($_POST["email"]);
            $mail->addAddress('persianasbrasil@persianasbrasil.com.br'); 
            $mail->addReplyTo($_POST["email"]);
            
            if (($_FILES["arquivo"]["name"] != "") && $_FILES['arquivo']['error'] == UPLOAD_ERR_OK) {
                $mail->addAttachment($_FILES['arquivo']['tmp_name'], $_FILES['arquivo']['name']);
            }
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';                         
            $corpo = "Nome: ".$_POST["nome"]."<br>";
            $corpo .= "Email: ".$_POST["email"]."<br>";
            $corpo .= "Telefone: ".$_POST["fone"]."<br> <br>";
            $corpo .= $_POST["corpo"];
            $mail->Body    = $corpo;
        
            $mail->send();
            $mensagem = 'Mensagem Enviada';
        } catch (Exception $e) {
            $mensagem = "Erro ao enviar a mensagem: {$mail->ErrorInfo}";
        }
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: redireciona.php?r=" . urlencode($mensagem) . "&rt=" . urldecode($_POST["retorno"]));
    }                    
?>