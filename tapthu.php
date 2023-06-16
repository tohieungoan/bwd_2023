<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'D:\BWD_2023_CenterGym\phpmailer/src/Exception.php';
require 'D:\BWD_2023_CenterGym\phpmailer/src/PHPMailer.php';
require 'D:\BWD_2023_CenterGym\phpmailer/src/SMTP.php';

if(isset($_POST['send'])){
    // Send email with code
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username ='ngoanth.22it@vku.udn.vn';
    $mail->Password ='zuvnxxkwzziodddf';
    $mail->SMTPSecure = 'ssl';
    $mail->Port =465;
    $mail->setFrom('ngoanth.22it@vku.udn.vn');
    $mail->addAddress($_POST["mail"]);
    $mail->isHTML(true);
    $mail->Subject = '=?UTF-8?B?' . base64_encode('THÔNG TIN TẬP THỬ') . '?=';
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
      
    $now = new DateTime();
    if ($now->format('H') >= 15) {
      $now->modify('+5 days');
    } else {
      $now->modify('+4 days');
    }

    $now->setTime(15, 0, 0);
    $result = $now->format('Y-m-d H:i:s');

    $mail->Body = "Họ và tên: " . $_POST["ten"] . "<br>Số Điện thoại: " . $_POST["sdt"] . "<br>Thời gian: " .$result;
    $mail->send();

    echo "<script>alert('send success');</script>";
    require_once 'D:\BWD_2023_CenterGym\dangkitapthu.html';
}
?>