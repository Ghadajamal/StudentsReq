<?php

  // includes required phpmailer files
  require 'includes/PHPMailer.php';
  require 'includes/SMTP.php';
  require 'includes/Exception.php';

//  define name spaces

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//create instance of phpmailer
$mail = new PHPMailer();

//set mailer to use stmp
$mail->isSMTP();
//define smtp host
$mail->Host = "smtp.gmail.com";
//enable stmp authentification
 $mail->SMTPAuth = "true";
 //set type of encryption(ssl/tls)
 $mail->SMTPSecure = "tls";
 // set port to connect stmp
 $mail->Port = "587";

 //set gmail username
 $mail->Username = "kholoudbenlhadj@gmail.com";

 //set gmail password
 $mail->Password = "Minatohazuka2";
 //set email subject
 $mail->Subject = "Test mail using php mailer";
 //set sender email
 $mail->setFrom("kholoudbelhadj@gmail.com");

 //Email body
 $email->Body = "this is plain text email body";
 //add recipient
 $mail->addAddress("kholoud.ouladbenlhadj@etu.uae.ac.ma");
//finally send email

if($mail->send()){
  echo "email send!";
}else{
    echo "error";
}

//closinh stmp connection
$mail->smtpClose();
 









?>